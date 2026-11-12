
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin_menu.php');
    exit;
}

$menuName = trim($_POST['menu_name'] ?? '');
$menuLink = trim($_POST['menu_link'] ?? '');
$sortOrder = filter_input(INPUT_POST, 'sort_order', FILTER_VALIDATE_INT);

if (
    $menuName === '' ||
    $menuLink === '' ||
    $sortOrder === false ||
    $sortOrder === null ||
    $sortOrder < 1
) {
    die('Please enter valid menu details.');
}

$sql = "INSERT INTO menus (menu_name, menu_link, sort_order)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssi",
    $menuName,
    $menuLink,
    $sortOrder
);

if (mysqli_stmt_execute($stmt)) {
    header('Location: admin_menu.php?success=1');
    exit;
} else {
    echo "Menu could not be saved.";
}

mysqli_stmt_close($stmt);
?>
