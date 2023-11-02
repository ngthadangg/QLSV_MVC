<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sinh viên </title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="../Controller/C_Student.php?action=update&stid=<?php echo $student->id; ?>" method="POST">

    <h1>Nhập thông tin sinh viên cần cập nhật</h1>

    <table>
        <tr class="input-box">
            <td><label for="id">id: </label></td>
            <td><input type="text" name="id" value="<?php echo $student->id; ?>" disabled><br></td>
        </tr>

        <tr class="input-box">
            <td><label for="name">Name: </label></td>
            <td><input type="text" name="name" value="<?php echo $student->name; ?>"><br></td>
        </tr>

        <tr class="input-box">
            <td><label for="age">Age: </label></td>
            <td><input type="text" name="age" value="<?php echo $student->age; ?>" ><br></td>
        </tr>
                
        <tr class="input-box">
            <td><label for="university">University:  </label></td>
            <td><input type="text" name="university" value="<?php echo $student->university; ?>" ><br></td>
        </tr >

    </table>
            

    <br>
    <div class="button-submit">
        <button type="submit">Cập nhật</button>
        <button type="reset">Reset</button>
    </div>

    </form>
</body>
</html>