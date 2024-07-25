<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mark = $_POST['mark'];
    
    $sql = "UPDATE students SET name='$name', subject='$subject', mark=$mark WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: home.php');
        exit();
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>
<body>
    <div class="edit-container">
        <form method="POST" action="edit_student.php?id=<?php echo $id; ?>" class="edit-form">
            <h2>Edit Student</h2>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
            </div>
            <div class="input-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="<?php echo $student['subject']; ?>" required>
            </div>
            <div class="input-group">
                <label for="mark">Mark</label>
                <input type="number" id="mark" name="mark" value="<?php echo $student['mark']; ?>" required>
            </div>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <button type="submit" class="edit-button">Update</button>
        </form>
    </div>
</body>
</html>
