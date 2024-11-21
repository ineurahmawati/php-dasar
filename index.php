<?php
	const nama ="Ineu";
    $umur = "22";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Pribadi</title>
</head>
<body>
<table border = "1" cellspacing = "0" cellpadding="7px">
				<tr>
					<td> Nama </td>
					<td> : </td>
					<td> <?php echo nama ?> </td>
				</tr>
				<tr>
					<td> Umur </td>
					<td> : </td>
					<td> <?php echo $umur ?> </td>
				</tr>
				<tr>
					<td> Tinggi Badan </td>
					<td> : </td>
					<td> 148 cm  </td>
				</tr>
				<tr>
					<td> Berat Badan </td>
					<td> : </td>
					<td> 52 kg </td>

				</tr>	
			</table>
</body>
</html>