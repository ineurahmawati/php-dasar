<?php

$mahasiswa = [
    [  
        "NIM" => "D2121110019",
        "Nama" => "Siti Rismawati"
    ],
    [
        "NIM" => "D21211109",
        "Nama" => "Islah Nurhasanah"
    ],
    [  
        "NIM" => "D212111008",
        "Nama" => "Intan Khoirunnisa"
    ],
    [
        "NIM" => "D21211105",
        "Nama" => "Dewi Yulianti"
    ],
    [  
        "NIM" => "D212111029",
        "Nama" => "Ineu Rahmawati"
    ],
];

echo "<table border = 1 cellspacing = 0 cellpadding= 5px >";
echo "<tr><th>No</th><th>NIM</th><th>Nama</th></tr>";
$nomor = 1;
foreach ($mahasiswa as $value) {
    echo "<tr>";
    echo "<td>" .$nomor++.  "</td>";
    echo "<td>"  .$value["NIM"].  "</td>";
    echo "<td>"  .$value["Nama"].  "</td>";
    echo "</tr>";
}
echo "</table>"
?>