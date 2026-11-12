
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_menu.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die('Invalid menu ID.');
}

$sql = "DELETE FROM menus WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: admin_menu.php?deleted=1');
    exit;
} else {
    echo "Menu could not be deleted.";
}

mysqli_stmt_close($stmt);
?>
