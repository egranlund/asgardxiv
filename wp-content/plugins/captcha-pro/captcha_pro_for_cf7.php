<?php
/**
* This functions are used for adding captcha in Contact Form 7
**/
eval( base64_decode(
'aWYgKCAhIGZ1bmN0aW9uX2V4aXN0cyAoICd3cGNmN19hZGRfc2hvcnRjb2RlX2J3c19jYXB0Y2hhX3BybycgKSApIHsgZnVuY3Rpb24gd3BjZjdfYWRkX3Nob3J0Y29kZV9id3NfY2FwdGNoYV9wcm8oKSB7CiBpZiAoIGZ1bmN0aW9uX2V4aXN0cyggJ3dwY2Y3X2FkZF9zaG9ydGNvZGUnICkgKSB3cGNmN19hZGRfc2hvcnRjb2RlKCAnYndzY2FwdGNoYScsICd3cGNmN19id3NfY2FwdGNoYV9wcm9fc2hvcnRjb2RlX2hhbmRsZXInLCBUUlVFICk7Cn0gfSBpZiAoICEgZnVuY3Rpb25fZXhpc3RzICggJ3dwY2Y3X2J3c19jYXB0Y2hhX3Byb19zaG9ydGNvZGVfaGFuZGxlcicgKSApIHsgZnVuY3Rpb24gd3BjZjdfYndzX2NhcHRjaGFfcHJvX3Nob3J0Y29kZV9oYW5kbGVyKCAkdGFnICkgewogZ2xvYmFsICRjcHRjaHByX29wdGlvbnM7IGlmICggY2xhc3NfZXhpc3RzKCAnV1BDRjdfU2hvcnRjb2RlJyApICkgeyAkdGFnID0gbmV3IFdQQ0Y3X1Nob3J0Y29kZSggJHRhZyApOwppZiAoIGVtcHR5KCAkdGFnLT5uYW1lICkgKSByZXR1cm4gJyc7ICR2YWxpZGF0aW9uX2Vycm9yID0gd3BjZjdfZ2V0X3ZhbGlkYXRpb25fZXJyb3IoICR0YWctPm5hbWUgKTsKJGNsYXNzID0gd3BjZjdfZm9ybV9jb250cm9sc19jbGFzcyggJHRhZy0+dHlwZSApOyBpZiAoICR2YWxpZGF0aW9uX2Vycm9yICkgJGNsYXNzIC49ICcgd3BjZjctbm90LXZhbGlkJzsKJGF0dHMgPSBhcnJheSgpOyAkYXR0c1snY2xhc3MnXSA9ICR0YWctPmdldF9jbGFzc19vcHRpb24oICRjbGFzcywgJHRhZy0+bmFtZSApOyAkYXR0c1snaWQnXSA9ICR0YWctPmdldF9vcHRpb24oICdpZCcsICdpZCcsIHRydWUgKTsKJGF0dHNbJ3RhYmluZGV4J10gPSAkdGFnLT5nZXRfb3B0aW9uKCAndGFiaW5kZXgnLCAnaW50JywgdHJ1ZSApOyAkYXR0c1snYXJpYS1yZXF1aXJlZCddID0gJ3RydWUnOyAkYXR0c1sndHlwZSddID0gJ3RleHQnOwokYXR0c1snbmFtZSddID0gJHRhZy0+bmFtZTsgJGF0dHNbJ3ZhbHVlJ10gPSAnJzsgJGNwdGNocHIgPSBjcHRjaHByX2Rpc3BsYXlfY2FwdGNoYV9jdXN0b20oICRhdHRzWydjbGFzcyddLCAkdGFnLT5uYW1lICk7CiRhdHRzID0gd3BjZjdfZm9ybWF0X2F0dHMoICRhdHRzICk7IHJldHVybiBzcHJpbnRmKCAnPHNwYW4gY2xhc3M9IndwY2Y3LWZvcm0tY29udHJvbC13cmFwICUxJHMiPicgLiAkY3B0Y2hwciAuICclMyRzPC9zcGFuPicsICR0YWctPm5hbWUsICRhdHRzLCAkdmFsaWRhdGlvbl9lcnJvciApOwp9IH0gfSBpZiAoICEgZnVuY3Rpb25fZXhpc3RzICggJ3dwY2Y3X2FkZF90YWdfZ2VuZXJhdG9yX2J3c19jYXB0Y2hhX3BybycgKSApIHsgZnVuY3Rpb24gd3BjZjdfYWRkX3RhZ19nZW5lcmF0b3JfYndzX2NhcHRjaGFfcHJvKCkgewogaWYgKCAhIGZ1bmN0aW9uX2V4aXN0cyggJ3dwY2Y3X2FkZF90YWdfZ2VuZXJhdG9yJyApICkgcmV0dXJuOyB3cGNmN19hZGRfdGFnX2dlbmVyYXRvciggJ2J3c2NhcHRjaGEnLCBfXyggJ0JXUyBDQVBUQ0hBJywgJ2NhcHRjaGFfcHJvJyApLCAnd3BjZjctYndzY2FwdGNoYScsICd3cGNmN190Z19wYW5lX2J3c19jYXB0Y2hhX3BybycgKTsKfSB9IGlmICggISBmdW5jdGlvbl9leGlzdHMgKCAnd3BjZjdfdGdfcGFuZV9id3NfY2FwdGNoYV9wcm8nICkgKSB7IGZ1bmN0aW9uIHdwY2Y3X3RnX3BhbmVfYndzX2NhcHRjaGFfcHJvKCAmJGNvbnRhY3RfZm9ybSApIHsKIGVjaG8gJyA8ZGl2IGlkPSJ3cGNmNy1id3NjYXB0Y2hhIiBjbGFzcz0iaGlkZGVuIj4gPGZvcm0gYWN0aW9uPSIiPiA8dGFibGU+IDx0cj4gPHRkPiAnIC4gX18oICdOYW1lJywgJ2NhcHRjaGEgcHJvJyApIC4gJzxiciAvPgogPGlucHV0IHR5cGU9InRleHQiIG5hbWU9Im5hbWUiIGNsYXNzPSJ0Zy1uYW1lIG9uZWxpbmUiIC8+IDwvdGQ+IDwvdHI+IDwvdGFibGU+IDx0YWJsZSBjbGFzcz0ic2NvcGUgYndzY2FwdGNoYSI+CiA8Y2FwdGlvbj4nIC4gX18oICdJbnB1dCBmaWVsZCBzZXR0aW5ncycsICdjYXB0Y2hhX3BybycgKSAuICc8L2NhcHRpb24+IDx0cj4gPHRkPiA8Y29kZT5jbGFzczwvY29kZT4gKCcgLiBfXyggJ29wdGlvbmFsJywgJ2NhcHRjaGFfcHJvJyApIC4gJyk8YnIgLz4KIDxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJjbGFzcyIgY2xhc3M9ImNsYXNzdmFsdWUgb25lbGluZSBvcHRpb24iIC8+IDwvdGQ+IDwvdHI+IDwvdGFibGU+IDxkaXYgY2xhc3M9InRnLXRhZyI+CiAnIC4gX18oICdDb3B5IHRoaXMgY29kZSBhbmQgcGFzdGUgaXQgaW50byB0aGUgZm9ybSBsZWZ0LicsICdjYXB0Y2hhX3BybycgKSAuICc8YnIgLz4gPGlucHV0IHR5cGU9InRleHQiIG5hbWU9ImJ3c2NhcHRjaGEiIGNsYXNzPSJ0YWciIHJlYWRvbmx5PSJyZWFkb25seSIgb25mb2N1cz0idGhpcy5zZWxlY3QoKSIgLz4KIDwvZGl2PiA8L2Zvcm0+IDwvZGl2Pic7IH0gfSBpZiAoICEgZnVuY3Rpb25fZXhpc3RzICggJ3dwY2Y3X2J3c19jYXB0Y2hhX3Byb192YWxpZGF0aW9uX2ZpbHRlcicgKSApIHsKIGZ1bmN0aW9uIHdwY2Y3X2J3c19jYXB0Y2hhX3Byb192YWxpZGF0aW9uX2ZpbHRlciggJHJlc3VsdCwgJHRhZyApIHsgZ2xvYmFsICRjcHRjaHByX29wdGlvbnM7ICRzdHJfa2V5ID0gJGNwdGNocHJfb3B0aW9uc1snY3B0Y2hwcl9zdHJfa2V5J11bJ2tleSddOwppZiAoIGNsYXNzX2V4aXN0cyggJ1dQQ0Y3X1Nob3J0Y29kZScgKSApIHsgJHRhZyA9IG5ldyBXUENGN19TaG9ydGNvZGUoICR0YWcgKTsgJG5hbWUgPSAkdGFnLT5uYW1lOwppZiAoIGlzc2V0KCAkX1BPU1RbICRuYW1lIF0gKSApIHsgaWYgKCAkX1BPU1RbICRuYW1lIF0gIT0gJycgKSB7IGlmICggaXNzZXQoICRfUE9TVFsgJG5hbWUgLiAnLWNwdGNocHJfcmVzdWx0J10gKSAmJiBpc3NldCggJF9QT1NUWyAkbmFtZSAuICctY3B0Y2hwcl90aW1lJ10gKQogJiYgMCAhPSBzdHJjYXNlY21wKCB0cmltKCBkZWNvZGUoICRfUE9TVFsgJG5hbWUgLiAnLWNwdGNocHJfcmVzdWx0J10sICRzdHJfa2V5LCAkX1BPU1RbICRuYW1lIC4gJy1jcHRjaHByX3RpbWUnXSApICksICRfUE9TVFsgJG5hbWUgXSApICkgewogJHJlc3VsdFsndmFsaWQnXSA9IEZBTFNFOyAkcmVzdWx0WydyZWFzb24nXVsgJG5hbWUgXSA9IHdwY2Y3X2dldF9tZXNzYWdlKCAnd3JvbmdfYndzY2FwdGNoYScgKTsgfSB9IGVsc2UgewogJHJlc3VsdFsndmFsaWQnXSA9IEZBTFNFOyAkcmVzdWx0WydyZWFzb24nXVsgJG5hbWUgXSA9IHdwY2Y3X2dldF9tZXNzYWdlKCAnZmlsbF9id3NjYXB0Y2hhJyApOyB9IH0KcmV0dXJuICRyZXN1bHQ7IH0gfSB9IGlmICggISBmdW5jdGlvbl9leGlzdHMgKCAnd3BjZjdfYndzY2FwdGNoYV9tZXNzYWdlcycgKSApIHsgZnVuY3Rpb24gd3BjZjdfYndzY2FwdGNoYV9tZXNzYWdlcyggJG1lc3NhZ2VzICkgewogcmV0dXJuIGFycmF5X21lcmdlKCAkbWVzc2FnZXMsIGFycmF5KCAnd3JvbmdfYndzY2FwdGNoYScgPT4gYXJyYXkoICdkZXNjcmlwdGlvbicgPT4gX18oICdJbnZhbGlkIENBUFRDSEEgdmFsdWUuJywgJ2NhcHRjaGFfcHJvJyApLAogJ2RlZmF1bHQnID0+IF9fKCAnUGxlYXNlIGVudGVyIGEgdmFsaWQgQ0FQVENIQSB2YWx1ZS4nLCAnY2FwdGNoYV9wcm8nICkgKSwgJ2ZpbGxfYndzY2FwdGNoYScgPT4gYXJyYXkoCiAnZGVzY3JpcHRpb24nID0+IF9fKCAnUGxlYXNlIGVudGVyIENBUFRDSEEgdmFsdWUuJywgJ2NhcHRjaGFfcHJvJyApLCAnZGVmYXVsdCcgPT4gX18oICdQbGVhc2UgZmlsbCB0aGUgZm9ybScsICdjYXB0Y2hhX3BybycgKQogKSApICk7IH0gfSBpZiAoICEgZnVuY3Rpb25fZXhpc3RzICggJ3dwY2Y3X2J3c2NhcHRjaGFfZGlzcGxheV93YXJuaW5nX21lc3NhZ2UnICkgKSB7IGZ1bmN0aW9uIHdwY2Y3X2J3c2NhcHRjaGFfZGlzcGxheV93YXJuaW5nX21lc3NhZ2UoKSB7CiBpZiAoIGVtcHR5KCAkX0dFVFsncG9zdCddICkgfHwgISAoICRjb250YWN0X2Zvcm0gPSB3cGNmN19jb250YWN0X2Zvcm0oICRfR0VUWydwb3N0J10gKSApICkgcmV0dXJuOwokaGFzX3RhZ3MgPSAoYm9vbCkkY29udGFjdF9mb3JtLT5mb3JtX3NjYW5fc2hvcnRjb2RlKCBhcnJheSggJ3R5cGUnID0+IGFycmF5KCAnYndzY2FwdGNoYScgKSApICk7IGlmICggISAkaGFzX3RhZ3MgKQogcmV0dXJuOyB9IH0='
));
?>