<?php
$id = (Int) $_GET['id'];
$filename = (String) $_GET['filename'];
header('Content-disposition: attachment; filename='.$filename);
header("Content-type: ".mime_content_type($filename)); 
header('Content-Transfer-Encoding: binary');
ob_clean();
flush(); 
readfile('upload/' . $id);
