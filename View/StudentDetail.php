<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet Sinh Vien</title>
</head>
<body>
    <h2>Chi tiết sinh viên</h2>
    <?php
        echo "<p>IDSV: ".$student->id."</p>";
        echo "<p>Name: ".$student->name."</p>";
        echo "<p>Age: ".$student->age."</p>";
        echo "<p>University: ".$student->university."</p>";
    ?>
    <p><a href="javascript:history.back()">Back</a></p>
</body>
</html>