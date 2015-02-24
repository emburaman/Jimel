<?php
// Delete file

$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'img\profile';   //2

if (!empty($_GET) && $_GET['filename']) {
	$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	$targetFile =  $targetPath. $_GET['filename'];  //5

	unlink($targetFile); //6
}

?>