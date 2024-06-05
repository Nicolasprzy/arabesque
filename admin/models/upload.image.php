<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $uploadDir = '../public/img/articles/';
    $uploadFile = $uploadDir . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        echo json_encode(['filePath' => $uploadFile]);
    } else {
        echo json_encode(['error' => 'Failed to upload image.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
