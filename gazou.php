<?php
    $command="python --";
    $str = mb_convert_encoding($fullPath, "utf-8", "sjis");
    exec($command, $output);
    print "$output[0]";
?>