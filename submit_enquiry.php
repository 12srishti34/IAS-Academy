
<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mobile = trim($_POST['mobile'] ?? '');
    $course = trim($_POST['course'] ?? '');

    // Validate name
    if (strlen($name) < 3) {
        exit("Name must contain at least 3 characters.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Please enter a valid email address.");
    }

    // Validate mobile
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        exit("Mobile number must contain exactly 10 digits.");
    }

    // Validate course
    $allowed_courses = [
        "UPSC Foundation",
        "UPSC Prelims",
        "UPSC Mains"
    ];

    if (!in_array($course, $allowed_courses, true)) {
        exit("Please select a valid course.");
    }

    // Check whether an image was uploaded
    $hasImage = isset($_FILES['image_path'])
        && $_FILES['image_path']['error'] !== UPLOAD_ERR_NO_FILE;

    if ($hasImage) {

        if ($_FILES['image_path']['error'] !== UPLOAD_ERR_OK) {
            exit("Image upload failed. Please try again.");
        }

        // Limit image size to 20 MB
        if ($_FILES['image_path']['size'] > 20 * 1024 * 1024) {
            exit("Image size must be 2 MB or less.");
        }

        // Check actual image type
        $tmpName = $_FILES['image_path']['tmp_name'];
        $imageInfo = getimagesize($tmpName);

        if ($imageInfo === false) {
            exit("Please upload a valid image.");
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $imageType = finfo_file($finfo, $tmpName);
        finfo_close($finfo);

        $allowedTypes = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];

        if (!in_array($imageType, $allowedTypes, true)) {
            exit("Only JPG, PNG and WEBP images are allowed.");
        }

        // Read the actual image data
        $imageData = file_get_contents($tmpName);
        $imageName = basename($_FILES['image_path']['name']);

        // Save form data and image data in MySQL
        $sql = "INSERT INTO enquiries
                (name, email, mobile, course, image_data, image_name, image_type)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssssbss",
            $name,
            $email,
            $mobile,
            $course,
            $imageData,
            $imageName,
            $imageType
        );

        // Send the actual image bytes to MySQL
        mysqli_stmt_send_long_data($stmt, 4, $imageData);

    } else {

        // Normal form submission without an image
        $sql = "INSERT INTO enquiries (name, email, mobile, course)
                VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $name,
            $email,
            $mobile,
            $course
        );
    }

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        exit("Unable to submit enquiry. Please try again.");
    }
}

?>