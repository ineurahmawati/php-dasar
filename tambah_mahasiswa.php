<?php
session_start();
if (!isset($_SESSION['login'])) {
    if ($_SESSION['login'] != true) {
        header("Location: login.php");
        exit;
    }
}

$mysqli = new mysqli('localhost','root','', 'tedc');
$program_studi = $mysqli->query("select * from studi_programs");
if (isset($_POST['NIM']) && isset($_POST['Nama'])) {
    $NIM = $_POST['NIM'];
    $Nama = $_POST['Nama'];
    $prodi = $_POST['Name'];

    $insert = $mysqli->query("INSERT INTO students (NIM, Nama, Studi_Program_Id) VALUES ('$NIM','$Nama','$prodi')");
    if ($insert) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = 'Data Berhasil Ditambahkan';
        header("Location: mahasiswa.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form method="POST">
    <div class="mb-3">
        <label for="NIM" class="form-label">NIM</label>
        <input type="text" class="form-control" id="NIM" name="NIM">
    </div>
    <div class="mb-3">
        <label for="Nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="Nama" name="Nama">
    </div>
    <div class="mb-3">
        <label for="Name" class="form-label">Prodi</label>
        <select class="form-select" id="Name" name="Name" required>
        <option value="">Pilih Prodi</option>
            <?php while ($row = $program_studi->fetch_assoc()) { ?>
            <option value="<?= $row['Studi_Program_Id']; ?>">
                <?= $row['Name']; ?>
            </option>
            <?php  } ?>
            </select>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">submit</button>
        <a href="mahasiswa.php" class="btn btn-warning">cancel</a>
    </div>
    </form>
</body>
</html>