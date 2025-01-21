<?php
 include_once("navbar.php");
// Include the database connection
if (!@include_once 'db.php') {
    die("Error: Unable to include db.php. Check the file path.");
}

// Handle delete request
if (isset($_GET['delete'])) {
    $sql = "DELETE FROM notice WHERE id='" . $_GET['delete'] . "'";
    if (!$conn->query($sql)) {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notices</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            margin-top: 50px;
        }
        .table-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<h2 class="text-center" style="color:green;">User Dashboard</h2>

    <div class="container">
        <div class="table-section">
            <h3>All Notices</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Notice ID</th>
                        <th>Notice</th>
                        <th>Audience (Class)</th>
                        <th>Date and Time</th>
                        <th>No Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM notice";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['notice']}</td>
                                    <td>{$row['odience']}</td>
                                    <td>{$row['date']}</td>
                                   
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No notices available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
