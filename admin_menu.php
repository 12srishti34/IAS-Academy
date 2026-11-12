
<?php
include 'db.php';

$success = isset($_GET['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body p-4">

            <h2 class="mb-4">Add New Menu</h2>

           

<?php if ($success) { ?>
    <div id="successMessage" class="alert alert-success">
        Menu added successfully!
    </div>

    <script>
        setTimeout(function () {
            const message = document.getElementById('successMessage');

            if (message) {
                message.style.display = 'none';
            }

            window.history.replaceState(
                null,
                '',
                window.location.pathname
            );
        }, 3000);
    </script>
<?php } ?>



            <form action="save_menu.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Menu Name</label>
                    <input type="text" name="menu_name"
                           class="form-control"
                           placeholder="Example: About"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Menu Link</label>
                    <input type="text" name="menu_link"
                           class="form-control"
                           placeholder="Example: #about"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order"
                           class="form-control"
                           min="1" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Add Menu
                </button>

            </form>

<hr class="my-4">

<h3 class="mb-3">Existing Menus</h3>

<?php
$menuSql = "SELECT * FROM menus ORDER BY sort_order ASC";
$menuResult = mysqli_query($conn, $menuSql);
?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
    <th>ID</th>
    <th>Menu Name</th>
    <th>Menu Link</th>
    <th>Sort Order</th>
    <th>Action</th>
</tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_assoc($menuResult)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>

                    <td>
                        <?php echo htmlspecialchars($row['menu_name']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($row['menu_link']); ?>
                    </td>

                    <td><?php echo $row['sort_order']; ?></td>
                    <td>
    <a href="edit_menu.php?id=<?php echo $row['id']; ?>"
       class="btn btn-warning btn-sm">
        Edit
    </a>
</td>

<td>
    <form action="delete_menu.php" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this menu?');">

        <input type="hidden" name="id"
               value="<?php echo $row['id']; ?>">

        <button type="submit" class="btn btn-danger btn-sm">
            Delete
        </button>
    </form>
</td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

            <a href="index.php" class="btn btn-outline-secondary mt-3">
                View Website
            </a>

        </div>
    </div>
</div>

</body>
</html>
