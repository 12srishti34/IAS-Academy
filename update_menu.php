
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_menu.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$menuName = trim($_POST['menu_name'] ?? '');
$menuLink = trim($_POST['menu_link'] ?? '');
$sortOrder = filter_input(INPUT_POST, 'sort_order', FILTER_VALIDATE_INT);

if (
    !$id || $id < 1 ||
    $menuName === '' ||
    $menuLink === '' ||
    $sortOrder === false ||
    $sortOrder === null ||
    $sortOrder < 1
) {
    die('Please enter valid menu details.');
}

$sql = "UPDATE menus
        SET menu_name = ?, menu_link = ?, sort_order = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssii",
    $menuName,
    $menuLink,
    $sortOrder,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    header('Location: admin_menu.php?updated=1');
    exit;
} else {
    echo "Menu could not be updated.";
}

mysqli_stmt_close($stmt);
?>
