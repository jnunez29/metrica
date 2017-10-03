<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de empleados</title>
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
<form method="POST" action="">
    <label>Email</label>
    <input type="email" name="email" id="email" value="<?php if (isset($email)) echo $email;?>"/>
    <input type="submit" value="Buscar" id="buscar" name="buscar"/>
</form>
<table>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>position</th>
        <th>salary</th>
        <th></th>
    </tr>
    <tbody>

    <?php foreach($employees as $emp){?>
       <tr>
           <?php
            echo '<td>'.$emp['name'].'</td>';
            echo '<td>'.$emp['email'].'</td>';
            echo '<td>'.$emp['position'].'</td>';
            echo '<td>'.$emp['salary'].'</td>';
           echo '<td><a href="index.php/detalle/'.$emp['id'].'">detalle</a></td>';
           ?>
       </tr>
   <?php } ?>

    </tbody>
</table>
</body>
</html>
