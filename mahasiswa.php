<?php
session_start();

if (!isset($_SESSION['login'])) {
    if ($_SESSION['login'] != true) {
        header("Location: login.php");
        exit;
    }
}

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
    <div class="container mt-5">
    <h1 algin="center"> Data Mahasiswa KA 2021 </h1>  
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true ) { ?>
       <div class="alert alert-success" role="alert">
            <?= $_SESSION['message'] ?>
       </div>
       <?php } ?>
    <a href="tambah_mahasiswa.php" class="btn btn-primary">Tambah</a>
    <a href="logout.php" class="btn btn-warning">Logout</a>
    <table class = "table table-bordered  table-hover">
        <tr>
            <th> no </th>
            <th> nim </th>
            <th> nama </th>
            <th> program studi </th>
            <th> Edit </th>
        </tr>
        <?php foreach($mahasiswa as $row) { ?>
        <tr>
            <td> <?= $nomor++; ?> </td>
            <td> <?=  $row['NIM']; ?> </td>
            <td> <?=  $row['Nama']; ?> </td>
            <td> <?=  $row['Name']; ?> </td>
            <td>
            <a href="edit_mahasiswa.php?NIM=<?= $row['NIM']?>" class="btn btn-success">Edit</a>
            <a href="hapus_mahasiswa.php?NIM=<?= $row['NIM']?>" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?');">Hapus</a>
            </td>   
        </tr>
        <?php } ?>
        </table>
        </div>
</body>
</html>
<?php
unset($_SESSION['success']);
unset($_SESSION['message']);

?>
