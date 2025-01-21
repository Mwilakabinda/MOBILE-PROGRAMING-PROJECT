<?php
include 'db.php';

   
   include_once("navbar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $day = $_POST['day'];
    $time_slot = $_POST['time_slot'];
    $classroom = $_POST['classroom'];
    $lecturer_name = $_POST['lecturer_name'];
    $course = $_POST['course'];

    $stmt = $con->prepare("INSERT INTO timetable (day, time_slot, classroom, lecturer_name, course) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $day, $time_slot, $classroom, $lecturer_name, $course);

    if ($stmt->execute()) {
        $message = "Schedule added successfully!";
    } else {
        $message = "Error adding schedule: " . $stmt->error;
    }
    $stmt->close();
}

$result = $conn->query("SELECT * FROM timetable ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), time_slot");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h2 class="text-center" style="color:green;">User Dashboard</h2>
    <br>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Day</label>
                    <select name="day" class="form-control" required>
                        <option value="" disabled selected>Select</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                        <option>Sunday</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Time Slot</label>
                    <input type="text" name="time_slot" class="form-control" placeholder="e.g., 8:00 AM - 10:00 AM" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Classroom</label>
                    <input type="text" name="classroom" class="form-control" placeholder="e.g., Room 101" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Lecturer Name</label>
                    <input type="text" name="lecturer_name" class="form-control" placeholder="e.g., Dr. Smith" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Course</label>
                    <input type="text" name="course" class="form-control" placeholder="e.g., Math 101" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Schedule</button>
        </form>

        <h4 class="mb-3">Timetable</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Time Slot</th>
                    <th>Classroom</th>
                    <th>Lecturer Name</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['day']; ?></td>
                        <td><?php echo $row['time_slot']; ?></td>
                        <td><?php echo $row['classroom']; ?></td>
                        <td><?php echo $row['lecturer_name']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
