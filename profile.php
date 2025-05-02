
<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "profile_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$uploadMessage = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $business = $_POST["business_name"];

    $image = $_FILES["profile_image"]["name"];
    $tmp = $_FILES["profile_image"]["tmp_name"];
    $uploadDir = "uploads/";
    $uploadPath = $uploadDir . basename($image);
    move_uploaded_file($tmp, $uploadPath);

    $stmt = $conn->prepare("INSERT INTO users (name, email, mobile, business_name, profile_image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $mobile, $business, $uploadPath);
    $stmt->execute();
    $uploadMessage = "Profile created successfully!";
    $stmt->close();
}

// Fetch latest user
$latestUser = $conn->query("SELECT * FROM users ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Creation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Create Your Business Profile</h2>

    <?php if ($uploadMessage): ?>
        <div class="alert alert-success"><?= $uploadMessage ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="border p-4 rounded">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile Number *</label>
            <input type="text" name="mobile" required class="form-control">
        </div>
        <div class="form-group">
            <label>Business Name</label>
            <input type="text" name="business_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Profile Image</label>
            <input type="file" name="profile_image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Create Profile</button>
    </form>

    <?php if ($latestUser): ?>
    <div class="mt-5">
        <h4>Latest Profile</h4>
        <div class="card p-3">
            <img src="<?= $latestUser['profile_image'] ?>" width="120" height="120" class="mb-3 rounded-circle">
            <p><strong>Name:</strong> <?= $latestUser['name'] ?></p>
            <p><strong>Email:</strong> <?= $latestUser['email'] ?></p>
            <p><strong>Mobile:</strong> <?= $latestUser['mobile'] ?></p>
            <p><strong>Business:</strong> <?= $latestUser['business_name'] ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
