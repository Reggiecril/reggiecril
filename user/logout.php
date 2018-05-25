<?php
session_destroy();
ob_clean();
header('Location: web_dev.php');

?>