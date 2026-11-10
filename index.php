
<?php
$submitted = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $address = trim($_POST["address"]);

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) &&
        preg_match("/^[0-9]{10}$/", $phone) && $dob &&
        $gender && $course && $address) {
        $submitted = true;
    } else {
        $error = "Please enter valid registration details.";
    }
}

function safe($value) {
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="stylea2.css">
</head>
<body>

<div class="container">

    <header>
        <h1>Student Registration</h1>
        <p>Online Application Portal</p>
    </header>

    <?php if ($submitted): ?>

        <div class="success">
            <h2>✓ Registration Successful!</h2>
            <p>Your application has been submitted successfully.</p>

            <div class="details">
                <h3>Application Details</h3>

                <p><strong>Name:</strong> <?= safe($name) ?></p>
                <p><strong>Email:</strong> <?= safe($email) ?></p>
                <p><strong>Phone:</strong> <?= safe($phone) ?></p>
                <p><strong>Date of Birth:</strong> <?= safe($dob) ?></p>
                <p><strong>Gender:</strong> <?= safe($gender) ?></p>
                <p><strong>Course:</strong> <?= safe($course) ?></p>
                <p><strong>Address:</strong> <?= safe($address) ?></p>
            </div>

            <button onclick="window.print()">Print Application</button>
            <a href="index.php">Register Another Student</a>
        </div>

    <?php else: ?>

        <?php if ($error): ?>
            <p class="error"><?= safe($error) ?></p>
        <?php endif; ?>

        <form method="POST" id="registrationForm">

            <h2>Application Form</h2>

            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required>

            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="10-digit mobile number" required>

            <label>Date of Birth</label>
            <input type="date" name="dob" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option>Female</option>
                <option>Male</option>
                <option>Other</option>
            </select>

            <label>Select Course</label>
            <select name="course" required>
                <option value="">Choose Course</option>
                <option>BCA</option>
                <option>BBA</option>
                <option>B.Com</option>
                <option>B.Tech</option>
                <option>MCA</option>
            </select>

            <label>Address</label>
            <textarea name="address" placeholder="Enter your address" required></textarea>

            <button type="submit">Submit Application</button>

        </form>

    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="scripta2.js"></script>

</body>
</html>
