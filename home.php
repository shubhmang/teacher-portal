<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mark = $_POST['mark'];
    
    $sql = "INSERT INTO students (name, subject, mark) VALUES ('$name', '$subject', $mark)
            ON DUPLICATE KEY UPDATE mark = mark + $mark";
    $conn->query($sql);
}

$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Student List</h1>
            <a href="home.php" style="margin-left:486px;">Home</a>
            <a href="logout.php">Logout</a>
        </header>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Mark</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $students->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['mark']; ?></td>
                    <td>
                        <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_student.php?id=<?php echo $row['id']; ?>"  onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        
        <button onclick="showAddStudentModal()">Add Student</button>
    </div>
    
    <div id="add-student-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddStudentModal()">&times;</span>
            <h3>Add Student</h3>
            <form method="POST" action="home.php">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="input-group">
                    <label for="mark">Mark</label>
                    <input type="number" id="mark" name="mark" placeholder="Mark" required>
                </div>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
