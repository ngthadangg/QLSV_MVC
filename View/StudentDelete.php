<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <?php
        echo "<table style='border: 1px solid black; border-collapse: collapse;'> 
        <tr> 
            <th style='border: 1px solid black; padding: 10px;'>ID</th> 
            <th style='border: 1px solid black; padding: 10px;'>Name</th> 
            <th style='border: 1px solid black; padding: 10px;'>Age</th> 
            <th style='border: 1px solid black; padding: 10px;'>University</th> 
            <th style='border: 1px solid black; padding: 10px;'>Xoa Sinh Vien </th> 
        </tr>";
        foreach ($studentList as $i => $student)
        {
            if (isset($studentList[$i])){
                echo "<tr> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->id."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->name."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->age."</td>
                <td style='border: 1px solid black; padding: 10px;'>".$student->university."</td> 
                <td style='border: 1px solid black; padding: 10px;'><a href='../Controller/C_Student.php?action=delete&stid=".$studentList[$i]->id."'>XXX</a></td>
            </tr>";
            }
            
        }
        echo "</table>";
    ?>
    <br>
    <p><a href="../index.php">Home Page</a></p>
</body>
</html>