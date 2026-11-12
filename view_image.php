<?php
include "db.php";

$id = intval($_GET['id'] ?? 0);

$sql = "SELECT image_data, image_type FROM enquiries WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$image = mysqli_fetch_assoc($result);

if ($image && !empty($image['image_data'])) {
    header("Content-Type: " . $image['image_type']);
    header("Content-Type: " . $image['image_type']);
header("Content-Length: " . strlen($image['image_data']));
echo $image['image_data'];
} else {
    http_response_code(404);
    echo "Image not found.";
}

mysqli_stmt_close($stmt);
?>
