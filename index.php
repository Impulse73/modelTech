<?php


includeFiles();

$file = fopen('Files/data.csv', 'r');

if ($file) {
    $import = new \Import\ImportCsv($file);
    $items = $import->getCreatedModels();

    echo '</br>';
    foreach ($items as $item) {
        echo '</br>';
        var_export($item);
        echo '</br>';
    }
}

//
// FUNCTIONS FOR WORK WITH FILES
//

function autoloadFilesFromDirectory(string $dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if (strrpos($file, '.php')) {
            include_once ($dir . '/' .  $file);
        }
    }
}

function includeFiles() {
    include_once ('Import/ImportCsv.php');
    autoloadFilesFromDirectory('Model');
    autoloadFilesFromDirectory('Model/Machine');
    autoloadFilesFromDirectory('Import/Handlers');
}

