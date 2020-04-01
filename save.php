<?php
header('Content-Type: application/json');

if (isset($_POST['filename']) === false) {
    echo json_encode([
        'ok' => false,
        'message' => '\'filename\' parameter does not exists.'
    ]);
    die();
}

$filename = $_POST['filename'];
$path = __DIR__ . '/../data/' . $filename;
if (file_exists($path) === false) {
    echo json_encode([
        'ok' => false,
        'message' => 'File not found.',
        'filename' => $filename,
        'path' => $path
    ]);
    die();
} 

$filesize = file_put_contents(__DIR__ . '/../data/' . $_POST['filename'], $_POST['data']);

echo json_encode([
    'ok' => true,
    'message' => 'File updated',
    'filename' => $filename,
    'path' => $path,
    'size' => $filesize
]);


