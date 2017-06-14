<?php
/*
Codigo de la libreria de PHP Image Workshop.
*/
use PHPImageWorkshop\ImageWorkshop;
require_once('imageWorkshop/src/PHPImageWorkshop/ImageWorkshop.php');
require_once('imageWorkshop/src/PHPImageWorkshop/Core/ImageWorkshopLayer.php');
require_once('imageWorkshop/src/PHPImageWorkshop/Core/ImageWorkshopLib.php');
require_once('imageWorkshop/src/PHPImageWorkshop/Exception/ImageWorkshopBaseException.php');
require_once('imageWorkshop/src/PHPImageWorkshop/Exception/ImageWorkshopException.php');


$files = new DirectoryIterator('../images/rockImages/');
foreach ($files as $file) {
    if (!($file->isDot())) {
        resizeImage($file);
        echo $file." Resized\n";
    }
}

function resizeImage($imageName)
{
    $imgLayer = ImageWorkshop::initFromPath('../images/rockImages/'.$imageName);
    $imgLayer->resizeInPixel(400, null, true);

    $dirPath         = "../images/resizedImages/";
    $filename        = $imageName;
    $createFolders   = true;
    $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
    $imageQuality    = 92; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

    $imgLayer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
}
