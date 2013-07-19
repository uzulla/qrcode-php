<?php
/*
 * sample : qrcode image on the fly.
 * ex: http://localhost/qrimg.php?data=super
 */

require("autoload.php");

if( !isset($_GET['data']) || mb_strlen($_GET['data'])==0 || mb_strlen($_GET['data'])>2048){
    echo "request data error";
}

$z=new \Uzulla\QrCode\Image();

$data = $_GET['data'];
$version       = isset($_GET['version'])       ? 0+$_GET['version'] : 1; // todo calc auto version
$error_correct = isset($_GET['error_correct']) ? mb_strcut(0,1,$_GET['error_correct']) : "M";
$module_size   = isset($_GET['module_size'])   ? 0+$_GET['module_size'] : 3;
$quietzone     = isset($_GET['quietzone'])     ? 0+$_GET['quietzone'] : 5;

$z->set_qrcode_version($version);
$z->set_qrcode_error_correct($error_correct);
$z->set_module_size($module_size);
$z->set_quietzone($quietzone);

Header("Content-type: image/png");
$z->qrcode_image_out($data,"png");

