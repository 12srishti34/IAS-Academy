
<?php
include 'db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Invalid menu ID.");
}

$sql = "SELECT * FROM menus WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$menu = mysqli_fetch_assoc($result);

if (!$menu) {
    die("Menu not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body p-4">

            <h2 class="mb-4">Edit Menu</h2>

            <form action="update_menu.php" method="POST">

                <input type="hidden" name="id"
                       value="<?php echo $menu['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Menu Name</label>
                    <input type="text" name="menu_name"
                           class="form-control"
                           value="<?php echo htmlspecialchars($menu['menu_name']); ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Menu Link</label>
                    <input type="text" name="menu_link"
                           class="form-control"
                           value="<?php echo htmlspecialchars($menu['menu_link']); ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order"
                           class="form-control" min="1"
                           value="<?php echo $menu['sort_order']; ?>"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Menu
                </button>

                <a href="admin_menu.php"
                   class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
