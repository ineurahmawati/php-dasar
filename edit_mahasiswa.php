<?php
     $mysqli = new mysqli('localhost','root','', 'tedc');
     $NIM = $_GET['NIM'];

     $mahasiswa = $mysqli->query("SELECT * FROM students WHERE NIM='$NIM'");
     $data = $mahasiswa->fetch_assoc();
     $program_studi = $mysqli->query("SELECT * FROM studi_programs");

    if (isset($_POST['Nama'])) {
        $nama = $_POST['Nama'];
        $program_studi = $_POST['Name'];

        $update = $mysqli->query("UPDATE students SET Nama='$nama', Studi_Program_Id='$program_studi' WHERE NIM='$NIM'");
        if($update) {
            header("Location: mahasiswa.php");
            exit();
        }
}      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 class="text-center">Form Edit mahasiswa</h1>
    <form method ="POST">
        <div class ="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control" id="NIM" name="NIM" value="<?= $data['NIM']?>" disabled>
        </div> 
        <div class ="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $data['Nama']?>">
        </div>
        <div class ="mb-3">
            <label for="Name" class="form-label">Program Studi</label><br>
            <select class="form-select" id="Name" name="Name">
            <?php while ($row = $program_studi->fetch_assoc()) { ?>
                <option value="<?= $row['Studi_Program_Id'] ?>" <?= $row['Studi_Program_Id'] == $data['Studi_Program_Id'] ? 'selected' : '' ?>><?= $row['Name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="mahasiswa.php" class="btn btn-warning">Cancel</a>
         </div>
    </form>   
</body>
</html>