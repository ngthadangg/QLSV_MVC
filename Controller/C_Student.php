<?php
    include_once("../Model/M_Student.php");
    class Ctrl_Student{
        // public function invoke(){
        //     if (isset($_GET['stid'])){
        //         $modelStudent = new M_Student();
        //         $student = $modelStudent->getStudentDetails($_GET['stid']);
        //         include_once("../View/StudentDetail.php");
        //     }
        //     elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
        //         $this->add_student();    
        //     }
        //     else{
        //         $modelStudent = new M_Student();
        //         $studentList = $modelStudent->getAllStudent();
        //         include_once("../View/StudentList.php");
        //     }

        // }
        // public function add_student(){
        //     $id = $_POST["ID"];
        //     $name = $_POST["Name"];
        //     $age = $_POST["Age"];
        //     $university = $_POST["University"];

        //     $modelStudent = new M_Student();
        //     $modelStudent->addStudent($id, $name, $age, $university);
        // }

        public function invoke(){
            $modelStudent = new M_Student();
            $action = isset($_GET['action']) ? $_GET['action'] : 'list';
            switch ($action) {
                case 'add':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $id = $_POST['ID'];
                        $name = $_POST['Name'];
                        $age = $_POST['Age'];
                        $university = $_POST['University'];

                        if (empty($id))
                        {
                            echo "Vui long nhap ID ";
                        }
                        elseif (empty($name)) {
                            echo "Vui long nhap Ten ";
                        }
                        elseif (!is_numeric($age) || $age <= 0 ){
                            echo "Tuổi là một số dương!";
                        }
                        else
                        {
                            try {
                                $modelStudent->addStudent($id, $name, $age, $university);
                            } 
                            catch (mysqli_sql_exception $e) {
                                if ($e->getCode() == 1062) { // Mã lỗi 1062 tương ứng với lỗi trùng khóa chính
                                    echo "sinh vien có ID: ".$id." đã tồn tại";
                                } else {
                                    echo "Đã xảy ra lỗi: " . $e->getMessage();
                                }
                            }
                        }

                        //Chuyển hướng đến trang danh sách sinh viên sau khi được thêm vào
                        // header('Location: ../Controller/C_Student.php');
                    } else {
                        include_once("../View/StudentAdd.html");
                    }
                    break;
                case 'delete':
                    $studentList = $modelStudent->getAllStudent();
                    include_once("../View/StudentDelete.php");
                    if (isset($_GET['stid'])){
                        try {
                            $stid = $_GET['stid'];
                            $modelStudent->deleteStudent($stid);
                            
                            // Lấy lại danh sách sinh viên mới
                            $studentList = $modelStudent->getAllStudent();
                            // Hiển thị danh sách sinh viên mới
                            include_once("../View/StudentDelete.php");
                        } 
                        catch (mysqli_sql_exception $e) {
                            echo "Đã xảy ra lỗi: " . $e->getMessage();
                        }
                    }
                    break;
                case 'update':
                    $studentList = $modelStudent->getAllStudent();
                    include_once("../View/StudentUpdate.php");
                    if (isset($_GET['stid'])){
                        $student = $modelStudent->getStudentDetails($_GET['stid']);
                            include_once("../View/formUpdate.php");

                        try {
                            $stid = $_GET['stid'];
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $_POST['name'];
                                $age = $_POST['age'];
                                $university = $_POST['university'];
                                $modelStudent->updateStudent($stid, $name, $age, $university);
                            } else {
                                include_once("../View/StudentUpdate.php");
                            }
                        } 
                        catch (mysqli_sql_exception $e) {
                            echo "Đã xảy ra lỗi: " . $e->getMessage();
                        }
                    }
                    break;
                case 'search':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $searchType = $_POST['btn_group'];
                        $searchKeyword = $_POST['txt_find'];
                        $result = $modelStudent->searchStudent($searchType, $searchKeyword);
                        // Hiển thị kết quả tìm kiếm
                        include_once("../View/StudentList.php");
                       
                    } else {
                        // Hiển thị form tìm kiếm
                        include_once("../View/studentFind.html");
                    }
                    break;
                case 'list':
                    
                default:
                    if (isset($_GET['stid'])){
                            $student = $modelStudent->getStudentDetails($_GET['stid']);
                            include_once("../View/StudentDetail.php");
                    }
                    else{
                        $studentList = $modelStudent->getAllStudent();
                        include_once("../View/StudentList.php");
                    }
                    break;
            }
        }
    };
    $C_Student = new Ctrl_Student();
    $C_Student->invoke();
?>