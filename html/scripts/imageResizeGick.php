<?php
$files = glob('../images/rockImages/*.jpg');
foreach ($files as $file) {
    $imagick = new Imagick();
    $imagick->readImage(realpath($file));
    $imagick->thumbnailImage(400, 0);

    $nameIndex = strrpos($file, '/');
    $imagick->writeImage('../images/resizedImages/' . substr($file, $nameIndex));

    echo substr($file, $nameIndex)." Resized\n";
    $imagick->clear();
    $imagick->destroy();
}
