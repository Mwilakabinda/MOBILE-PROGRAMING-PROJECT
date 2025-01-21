<?php
 include_once("navbar.php");
// Include the database connection
if (!@include_once 'db.php') {
    die("Error: Unable to include db.php. Check the file path.");
}

$message = "";
if (isset($_POST['submit'])) {
    $notice = $_POST['notice'];
    $odience = $_POST['odience'];

    try {
        $sql = "INSERT INTO notice (notice, odience, `date`) VALUES ('" . $notice . "', '" . $odience . "', now())";
        if ($conn->query($sql) === TRUE) {
            $message = "New Notice Successfully Added!";
        } else {
            $message = "Error: " . $conn->error;
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 50px;
        }
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .message-success {
            background-color: #d4edda;
            color: #155724;
        }
        .message-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h3>Add New Notice</h3>
            <?php if (!empty($message)) : ?>
                <div class="message <?= strpos($message, 'Success') !== false ? 'message-success' : 'message-error'; ?>">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="notice" class="form-label">Notice</label>
                    <textarea name="notice" id="notice" rows="5" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="odience" class="form-label">Audience (Class)</label>
                    <input type="text" name="odience" id="odience" class="form-control" placeholder="Enter class (e.g., Class 10A)" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Add Notice</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
