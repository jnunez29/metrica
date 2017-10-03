<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de empleados</title>
    <style>
        table{
            border: 1px solid #000;
        }
        th,td{
            border: 1px solid #000;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>address</th>
        <th>position</th>
        <th>salary</th>
        <th>skills</th>
    </tr>
    <tbody>

    <?php foreach($employees as $emp){?>
        <tr>
            <?php
            echo '<td>'.$emp['name'].'</td>';
            echo '<td>'.$emp['email'].'</td>';
            echo '<td>'.$emp['phone'].'</td>';
            echo '<td>'.$emp['address'].'</td>';
            echo '<td>'.$emp['position'].'</td>';
            echo '<td>'.$emp['salary'].'</td>';
            echo '<td>'.$skills.'</td>';
            ?>
        </tr>
    <?php } ?>

    </tbody>
</table>
</body>
</html>
