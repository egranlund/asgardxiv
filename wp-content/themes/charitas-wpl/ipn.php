<?php
/**
 * IPN Functionality
 *
 * @package WordPress
 * @subpackage Charitas
 * @since Charitas 1.0
 */
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php'); ?>
<?php
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

// post back to PayPal system to validate

$header="POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Host: www.paypal.com\r\n";
$header .= "Connection: close\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

if(!$fp) :
// HTTP ERROR
else :
	fputs ($fp, $header . $req);
	while(!feof($fp)) :
	
		$res = fgets ($fp, 1024);
		
		if (strcmp (trim($res), "VERIFIED") == 0) {
					
			// You should validate against these values.
			$donCause		= $_POST['item_number'];
			$txnID 			= $_POST['txn_id'];
			$firstName 		= $_POST['first_name'];
			$lastName 		= $_POST['last_name'];
			$addressCountry = $_POST['address_country'];
			$addressCity 	= $_POST['address_city'];
			$addressStreet 	= $_POST['address_street'];
			$addressZip 	= $_POST['address_zip'];
			$payerEmail 	= $_POST['payer_email'];
			$payment_gross	= $_POST['mc_gross'];
			$payment_status	= $_POST['payment_status'];

			if ($payment_status == 'Completed') {
				
				// Create post object
				$my_post = array(
					'post_title'    => $txnID,
					'post_status'   => 'publish',
					'post_author'   => 1,
					'comment_status' => 'closed',
					'ping_status' => 'closed',
					'post_type'      => 'post_pledges'
				);
				$post_id = wp_insert_post( $my_post );
				
				add_post_meta($post_id, "wpl_pledge_cause", $donCause);
				add_post_meta($post_id, "wpl_pledge_transaction_id", $txnID);
				add_post_meta($post_id, "wpl_pledge_first_name", $firstName);
				add_post_meta($post_id, "wpl_pledge_last_name", $lastName);
				add_post_meta($post_id, "wpl_pledge_country", $addressCountry);
				add_post_meta($post_id, "wpl_pledge_city", $addressCity);
				add_post_meta($post_id, "wpl_pledge_address", $addressStreet);
				add_post_meta($post_id, "wpl_pledge_postal_code", $addressZip);
				add_post_meta($post_id, "wpl_pledge_email", $payerEmail);
				add_post_meta($post_id, "wpl_pledge_donation_amount", $payment_gross);
				add_post_meta($post_id, "wpl_pledge_payment_source", 'paypal');
				add_post_meta($post_id, "wpl_pledge_payment_Status", $payment_status);
			}

			// Response is VERIFIED
			// Send an email announcing the IPN message is VERIFIED
			/* $mail_From = "victor@tihai.ca";
			$mail_To = "victor@tihai.md";
			$mail_Subject = "VERIFIED IPN";
			$mail_Body = $req;
			mail($mail_To, $mail_Subject, $mail_Body, $mail_From);*/

		}
		else if (strcmp (trim($res), "INVALID") == 0) {
			// Response is INVALID

			// Notification protocol is NOT complete, begin error handling

			// Send an email announcing the IPN message is INVALID
			/* $mail_From = "victor@tihai.ca";
			$mail_To = "victor@tihai.md";
			$mail_Subject = "INVALID IPN";
			$mail_Body = $req;
			mail($mail_To, $mail_Subject, $mail_Body, $mail_From);*/
		}
		
	endwhile;
fclose ($fp);
endif;