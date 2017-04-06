<?php
include "collections_getter_controller.php";
include "bits_getter_controller.php";

$itemIds = getCollectionitemIds('6');
foreach ($itemIds as $itemId) {
    $imgIds = getBitstreamIdOrig($itemId);
    foreach ($imgIds as $imgId) {
        $imgName = "../images/rockImages/".$imgId.".jpg";
        $url = "http://mydspaceis.dis.eafit.edu.co/rest/bitstreams/".$imgId."/retrieve";
        echo 'Image '.$imgId." downloaded\n";
        file_put_contents($imgName, file_get_contents($url));
    }
}
