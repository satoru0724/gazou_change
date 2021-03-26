<?php
    $fullPath="python C:\MAMP\htdocs\gazou.py";
    $str = mb_convert_encoding($fullPath, "utf-8", "sjis");
    exec($fullPath, $output);
    print "$output[0]";
?>