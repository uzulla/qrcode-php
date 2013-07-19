<?php
/*
 * sample : save to file.
 */
require("autoload.php");

$filename = 'tmp.png';
$data = "01234567";

$qri = new \Uzulla\QrCode\Image();
$qri->qrcode_image_out($data, "png", $filename);
