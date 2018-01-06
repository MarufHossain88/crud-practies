<?php

namespace App\classes;

class Student
{
    private function dbConnection(){
        $hostName = 'localhost';
        $userName = 'root';
        $passWord = '';
        $dbName = 'homedb';
        $link = mysqli_connect($hostName,$userName,$passWord,$dbName);
        return $link;
    }


    public function saveStudentInfo($data){
        $sql="INSERT INTO students(name,roll,class)
              VALUES('$data[name]','$data[roll]','$data[class]')";
        if(mysqli_query(Student::dbConnection(),$sql)){
            $message='Data save successfully in the database';
            return $message;
        }else{
            die('Query problem'.mysqli_errno(Student::dbConnection()));
        }
    }


    public function getStudentInfo(){
        $sql="SELECT * FROM students";
        if(mysqli_query(Student::dbConnection(),$sql)){
            $queryResult=mysqli_query(Student::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }
    }



    public function getStudentInfoById($id){
        $sql="SELECT * FROM students WHERE id='$id'; ";
        if(mysqli_query(Student::dbConnection(),$sql)){
            $queryResult=mysqli_query(Student::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Student::dbConnection()));
        }
    }



    public function updateStudentInfo($data){
        $sql = "UPDATE students SET name='$data[name]',roll='$data[roll]',class='$data[class]'
                WHERE id='$data[id]'";
        if(mysqli_query(student::dbConnection(),$sql)){
            header('Location: view-student.php');
        }else{
            die('Query problem'.mysqli_error(student::dbConnection()));
        }
    }



    public function deleteStudentInfoById($id){
        $sql = "DELETE FROM students WHERE id= '$id' ";
        if(mysqli_query(student::dbConnection(),$sql)){
            $message = "Student info delete successfully ";
            return $message;
        }else{
            die('Query problem'.mysqli_error(student::dbConnection()));
        }
    }

}