<?php
require_once 'vendor/autoload.php';
use App\classes\Student;

$queryResult=Student::getStudentInfo();

if (isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = student::deleteStudentInfoById($id);
}

?>


<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>View-Student</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
</head>
<body>
<a href="view.php">view-page ||</a>
<a href="view-student.php">view-student-page</a>



<div class="jumbotron" style="color:orangered">
    <div class="container">
        <div class="row">

            <div class="col-sm-8" style="height: 400px; border: 1px solid">
                <form action="" method="post">
                    <table border="1px solid" width="725px">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                        <?php while($student=mysqli_fetch_assoc($queryResult)){ ?>
                        <tr>
                            <td><?php echo $student['id']; ?></td>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['roll']; ?></td>
                            <td><?php echo $student['class']; ?></td>
                            <td>
                                <a href="Edit-student.php?id=<?php echo $student['id']; ?>">Edit</a>
                                <a href="?delete=true&id=<?php echo $student['id']; ?>" onclick="return confirm('Are u sure to delete this');">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
