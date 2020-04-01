<?php
header('Content-Type: application/json');

if (isset($_GET['filename']) === false) {
    echo json_encode([
        'ok' => false,
        'message' => '\'filename\' parameter does not exists.'
    ]);
    die();
}

$filename = $_GET['filename'];
$path = __DIR__ . '/../data/' . $filename;
if (file_exists($path) === false) {
    echo json_encode([
        'ok' => false,
        'message' => 'file not found.',
        'filename' => $filename,
        'path' => $path
    ]);
    die();
}


$data = file_get_contents(__DIR__ . '/../data/' . $_GET['filename']);

echo json_encode([
    'ok' => true,
    'message' => 'File received.',
    'filename' => $filename,
    'path' => $path,
    'data' => json_decode($data)
]);
die();
