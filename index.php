<?php

$sourceDir = 'files/';
$resultDir = 'results/';

mkdir($resultFolder);
$files = glob($sourceDir . '*.txt');

foreach ($files as $filePath) {
    //extract the language from the file name
    $fileName = basename($filePath);
    $matches = [];
    preg_match('/^([a-z]+)-\d+\.txt$/', $fileName, $matches);

    //check if a valid language match is found in the file name
    if (count($matches) >= 1) {
        $language = $matches[1];

        //create folder for the language if it does not exist
        $languageDir = $resultDir . $language . '/';
        if (!is_dir($languageDir)) {
            mkdir($languageDir);
        }

        //copy the file to its related folder
        $newFilePath = $languageDir . $fileName;
        rename($filePath, $newFilePath);
    }

    echo "done!";
}

?>