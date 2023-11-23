<!-- delete.php -->
<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $type = $_GET['type'];
    $index = $_GET['index'];

    if (file_exists($dataFile)) {
        $data = json_decode(file_get_contents($dataFile), true);

        unset($data[$type][$index]);

        file_put_contents($dataFile, json_encode($data));
    }
}

header('Location: index.php');
exit;
