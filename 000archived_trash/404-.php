<?php
$domainf = $_SERVER["REQUEST_URI"];
$domainf = explode('/', $domainf);
$page = $domainf[count($domainf)-2];

if($page=="focus") {
	require_once("t-focar.php");
}

