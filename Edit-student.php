<?php
require_once 'vendor/autoload.php';
use App\classes\Student;


$id= $_GET['id'];
$queryResult=Student::getStudentInfoById($id);
$student=mysqli_fetch_assoc($queryResult);




$message='';
if(isset($_POST['btn'])){
    Student::updateStudentInfo($_POST);
}

?>






<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Info</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
</head>
<body>
<a href="view.php">view-page ||</a>
<a href="view-student.php">view-student-page</a>



<div class="jumbotron" style="color:orangered">
    <div class="container">
        <div class="row">

            <div class="col-sm-4" style="height: 300px; width:50px; border: 1px solid">
                <form action="" method="post">
                    <table border="1px solid">

                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="name" value="<?php echo $student['name']; ?>"></td>
                            <td><input type="hidden" name="id" value="<?php echo $student['id']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Roll</th>
                            <td><input type="text" name="roll" value="<?php echo $student['roll']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td><input type="text" name="class" value="<?php echo $student['class']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Click Update</th>
                            <td><input type="submit" name="btn" value="update" class="btn btn-success btn-block"></td>
                        </tr>

                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
