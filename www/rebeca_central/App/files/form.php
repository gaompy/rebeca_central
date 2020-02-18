<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-default-skyblue.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:20px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:980px;min-width:150px" method="post"><div class="title"><h2>Login de Usuario</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title">Usuario<span class="required">*</span></label><input class="medium" type="text" name="input" required="required"/></div>
	<div class="element-password<?php frmd_add_class("password"); ?>"><label class="title">Password<span class="required">*</span></label><input class="medium" type="password" name="password" value="" required="required"/></div>
<div class="submit"><input type="submit" value="Ingresar"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-default-skyblue.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>