<?php
date_default_timezone_set("Asia/Kolkata");
global $monthArray;
global $globalDateTime;
$monthArray = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");

$globalDateTime=gmdate("Y-m-d H:i:s", time()+19800);

define('HTTP_SERVER', 'http://localhost/trust-portal_new/');
define('SITEURL', 'http://localhost/trust-portal_new/');

/*************EMAIL****************************/
define('Email_BCC', 'devendra.tiwari@vibescom.in');
define('Email_FROM', 'info@trustportal.com');
define('Email_SUPPORT', 'support@trustportal.com');
define('Email_FROMNAME', 'Trust-Portal');
define('DATE_TIME', $globalDateTime);
define('MONTH3', $month3);

/*********************************************/
define("FILESIZE","10485760");
define("FIFTEENMB","14679000");
define("TENMB","10485760");
define("IMGSIZE","512000");
define("EIGHTMB","8228608");
define("FOURMB","4194304");
?>