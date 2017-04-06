<?php

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'list':
          echo getIndexList();
        break;
    }
}

function removeSpecialCharacters($words)
{
    $words = explode(' ', $words);
    $unwanted_array = array(/*'À'=>'A',
    'Á'=>'A','È'=>'E', 'É'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Ñ'=>'N', 'Ò'=>'O',
    'Ó'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'à'=>'a', 'á'=>'a', 'è'=>'e', 'é'=>'e',
  'ì'=>'i','í'=>'i', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ù'=>'u', 'ú'=>'u' */);

    foreach ($words as $word) {
        $noSpecCharWords[] = strtr($word, $unwanted_array);
    }
    return $noSpecCharWords;
}

function removeCommonWords($words)
{
    $commonWords = array('con', 'la', 'los', 'el', 'y', 'de', 'o', 'se', 'en', 'Con', 'a');
    $noCommonWords = preg_replace('/\b('.implode('|', $commonWords).')\b/', '', $words);
    return $noCommonWords;
}
function getIndexList()
{
    require "predis/autoload.php";
    Predis\Autoloader::register();
    $redis   = new Predis\Client();
    return json_encode($redis->Zrange('itemIndexedNames', 0, -1));
}
