<?php
session_start();
session_destroy();
// Make sure this points to index.php
header("Location: index.php"); 
exit();
?>