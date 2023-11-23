<!-- update.php -->
<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $index = $_POST['index'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    if (file_exists($dataFile)) {
        $data = json_decode(file_get_contents($dataFile), true);

        $data[$type][$index]['amount'] = $amount;
        $data[$type][$index]['description'] = $description;

        file_put_contents($dataFile, json_encode($data));
    }

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
