
<?php
include "db.php";

$sql = "SELECT id, name, email, course, image_name
        FROM enquiries
        WHERE image_data IS NOT NULL
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquiries Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 25px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #ddd;
        }

        .card img {
            width: 100%;
            height: 190px;
            object-fit: contain;
            background: #eee;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="gallery">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
            <img
                src="view_image.php?id=<?php echo (int)$row['id']; ?>"
                alt="Uploaded image"
            >

            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['email']); ?></p>
            <p><?php echo htmlspecialchars($row['course']); ?></p>
            <small><?php echo htmlspecialchars($row['image_name']); ?></small>
        </div>
    <?php } ?>
</div>

</body>
</html>
