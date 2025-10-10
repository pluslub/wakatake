<?php
/**
 *load.php 2010/12/24 ver1.0.0
 *XMLファイルを読み込みます。
 */
if(isset($_GET["url"])){
	header("Content-type: application/xml;");
	readfile($_GET["url"]);
}
?>