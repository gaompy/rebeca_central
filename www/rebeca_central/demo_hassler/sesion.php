<?php
@session_start();
//session_unregister();
session_unset();
session_destroy();
header ("Location:index.php");
?>