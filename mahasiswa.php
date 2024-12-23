<?php
    $mysqli = new mysqli('localhost','root','', 'tedc');
    $result = $mysqli->query("select students.NIM, students.Nama, studi_programs.Name
    From Students INNER JOIN studi_programs on Students.Studi_Program_Id =studi_programs.Studi_Program_Id;"); 
    
    $mahasiswa = [];

    while($row =$result->fetch_assoc()) {
        array_push($mahasiswa, $row);
    }
    $nomor = 1
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2 algin="center"> data mahasiswa KA2021</h2>
    <table class = "table table-bordered  table-hover">
        <tr>
            <th> no </th>
            <th> nim </th>
            <th> nama </th>
            <th> program studi </th>
        </tr>
        <?php foreach($mahasiswa as $row){?>
        <tr>
            <th> <?= $nomor++; ?> </th>
            <th> <?=  $row['NIM']; ?> </th>
            <th> <?=  $row['Nama']; ?> </th>
            <th> <?=  $row['Name']; ?> </th>

        </tr>
        <?php } ?>
        </table>

</body>
</html>