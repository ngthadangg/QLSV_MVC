<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>

    
    <?php
        if (isset($result))
        {
            echo "<h2>Danh sách sinh viên</h2>";
            echo "<table style='border: 1px solid black; border-collapse: collapse;'>
                <tr>
                    <th style='border: 1px solid black; padding: 10px;'>ID</th>
                    <th style='border: 1px solid black; padding: 10px;'>Name</th>
                    <th style='border: 1px solid black; padding: 10px;'>Age</th>
                    <th style='border: 1px solid black; padding: 10px;'>University</th>
                </tr>";
            while ($student = $result->fetch_object())
            {
                echo "<tr> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->id."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->name."</td> 
                <td style='border: 1px solid black; padding: 10px;'>".$student->age."</td>
                <td style='border: 1px solid black; padding: 10px;'>".$student->university."</td> 
            </tr>";
                // echo "<br>";
            }
            echo "</table>";
            
        }
        elseif (isset($studentList)){
            echo "<h2>Danh sách sinh viên</h2>";
            foreach ($studentList as $i => $student)
            {
                if (isset($studentList[$i])){
                    echo "<p>".$i."<a href='?stid=".$student->id."'> ".$student->name." </a></p>";
                }
                
            }
        }
        else {
            echo "khoong tim thay ket qua";
        }


    ?>
    <br>
    <p><a href="../index.php">Home Page</a></p>
</body>
</html>