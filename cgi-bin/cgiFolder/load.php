<?php
/**
 *load.php 2010/12/24 ver1.0.0
 *XML�t�@�C����ǂݍ��݂܂��B
 */
if(isset($_GET["url"])){
	header("Content-type: application/xml;");
	readfile($_GET["url"]);
}
?>