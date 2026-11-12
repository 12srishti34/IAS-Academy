<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "ias_academy");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");


$message = "";

if (isset($_GET["saved"]) && $_GET["saved"] == "1") {
    $message = "Changes saved successfully!";

    echo '<script>
        setTimeout(function() {
            const url = new URL(window.location.href);
            url.searchParams.delete("saved");
            window.history.replaceState({}, document.title, url);
        }, 2000);
    </script>';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $academy_name = trim($_POST["academy_name"] ?? "");
    $home_heading = trim($_POST["home_heading"] ?? "");
    $home_description = trim($_POST["home_description"] ?? "");

    $stmt = $conn->prepare(
        "UPDATE site_settings
         SET academy_name = ?, home_heading = ?, home_description = ?
         WHERE id = 1"
    );

    $stmt->bind_param(
        "sss",
        $academy_name,
        $home_heading,
        $home_description
    );

    if ($stmt->execute()) {
        $stmt->close();

        header("Location: dashboard.php?saved=1");
        exit;
    } else {
        $message = "Unable to save changes.";
        $stmt->close();
    }
}



// Get current settings
$result = $conn->query("SELECT * FROM site_settings WHERE id = 1");
$settings = $result->fetch_assoc();

if (!$settings) {
    die("Settings not found. Please check the site_settings table.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            margin: 0;
        }

        header {
            background: #17365d;
            color: white;
            padding: 18px 30px;
        }

        .container {
            max-width: 700px;
            margin: 35px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            background: #17365d;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            color: green;
        }
    </style>
</head>
<body>

<header>
    <h2>IAS Academy - Admin Dashboard</h2>
</header>

<div class="container">
    <h2>Edit Website Content</h2>

    
<?php if ($message !== "") { ?>
    <p class="message" id="successMessage">
        <?php echo htmlspecialchars($message); ?>
    </p>

    <script>
        setTimeout(function() {
            const message = document.getElementById("successMessage");
            if (message) {
                message.style.display = "none";
            }
        }, 3000);
    </script>
<?php } ?>
    

    <form method="POST">
        <label>Academy Name</label>
        <input
            type="text"
            name="academy_name"
            value=""
            required
        >

        <label>Homepage Heading</label>
        <input
            type="text"
            name="home_heading"
            value=""
            required
        >

        <label>Homepage Description</label>
        <textarea name="home_description" required></textarea>

        <button type="submit">Save Changes</button>
    </form>

    <p>
        <a href="../index.php" target="_blank">Open Public Website</a>
    </p>

    <p>
        <a href="logout.php">Logout</a>
    </p>
</div>

</body>
</html>
