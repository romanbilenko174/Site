<?php
    session_start();
    $rand = mt_rand(1000, 9999);
    $_SESSION["rand"] = $rand;
    $im = imageCreateTrueColor(90,50);
    $c = imageColorAllocate($im, 255, 255, 255);
    imageTtfText($im, 20, -10, 10, 30, $c,"verdana.ttf", $rand);
    imagePng($im);
?>