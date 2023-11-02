<?php
include_once("E_Student.php");
class M_Student{
    public function __construct(){}


    public function getAllStudent(){
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to CSDL");
        mysqli_select_db($link, "DULIEU");

        $sql = "SELECT * FROM s";
        $result = mysqli_query($link, $sql);
        $i = 0;

        while($row= mysqli_fetch_array($result)){
            $id = $row['id'];
            $name = $row['name']; 
            $age = $row['age'];
            $university = $row['university'];
            while ($i != $id) $i++;
            $student[$i++] = new E_Student($id ,$name, $age, $university);
        }
        return $student;
    }
    public function getStudentDetails($stid){
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }
    public function addStudent($id, $name, $age, $university){
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to CSDL");
        mysqli_select_db($link, "DULIEU");
    
        $sql = "INSERT INTO s (id, name, age, university) VALUES ('$id', '$name', '$age', '$university')";
        if(mysqli_query($link, $sql)){
            echo "<h2>Thêm sinh viên thành công.</h2>";

        } else{
            echo "Lỗi:  $sql. " . mysqli_error($link);
        }
    }
    public function updateStudent($id, $name, $age, $university){
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to CSDL");
        mysqli_select_db($link, "DULIEU");

        $sql = "UPDATE s SET name='$name', age='$age', university='$university' WHERE id='$id'";
        if(mysqli_query($link, $sql)){
            echo "Sinh viên có ID: $id đã được cập nhật thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($link);
        }

    }
    public function deleteStudent($id){
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to CSDL");
        mysqli_select_db($link, "DULIEU");

        $sql = "DELETE FROM s WHERE id = '$id'";
        if(mysqli_query($link, $sql)){
            echo "Nhân viên có ID: $id đã được xoá thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($link);
        }
    }
    public function searchStudent($searchType, $searchKeyword){
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to CSDL");
        mysqli_select_db($link, "DULIEU");

        $sql = "SELECT * FROM s WHERE $searchType = '$searchKeyword' ";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
        else {
            // echo "Khong tim thay ket qua";
            return;
        }
    }

    
}
?>
