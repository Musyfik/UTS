<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tengah{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<p>input :</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="negara">Nama Negara :</label>
  <select name="pilihan[]" id="negara">
    <option value="Qatar">Qatar U-23</option>
    <option value="Indonesia">Indonesia U-23</option>
    <option value="Australia">Australia U-23</option>
    <option value="Yordania">Yordania U-23</option>
  </select><br>
  <label for="jumlahp">Jumlah Pertandingan :</label>
  <input type="text" name='jumlahp'><br>
  <label for="jumlahm">Jumlah Menang :</label>
  <input type="text" name='jumlahm'><br>
  <label for="jumlahs">Jumlah Seri :</label>
  <input type="text" name="jumlahs" id=""><br>
  <label for="jumlahk">Jumlah Kalah :</label>
  <input type="text" name="jumlahk" id=""><br>
  <label for="jumlahpoin">Jumlah Poin :</label>
  <input type="text" name='jumlahpoin'><br>
  <label for="nama">Nama Operator</label>
  <input type="text" name='nama'><br>
  <label for="nim">NIM Mahasiswa :</label>
  <input type="text" name='nim'><br>
  <input type="submit" value="Simpan">
  <br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $jumlahp = $_POST["jumlahp"];
  $jumlahm = $_POST["jumlahm"];
  $jumlahs = $_POST["jumlahs"];
  $jumlahk = $_POST["jumlahk"];
  $jumlahpoin = $_POST["jumlahpoin"];
  $nama = $_POST["nama"];
  $nim = $_POST["nim"];

  $terpilih = $_POST['pilihan'];

  if (!empty($terpilih)) {
   foreach ($terpilih as $pilih) {
    $negara = $pilih;
   }
  } else {
   echo 'No options selected.';
  }

  // Menyimpan data ke dalam berkas bukutamu.dat
  $file = fopen("data.txt", "a");
  fwrite($file, "Nama Negara: $negara\n");
  fwrite($file, "Jumlah Pertandingan: $jumlahp\n");
  fwrite($file, "Jumlah Menang: $jumlahm\n");
  fwrite($file, "Jumlah Seri: $jumlahs\n");
  fwrite($file, "Jumlah Kalah: $jumlahk\n");
  fwrite($file, "Jumlah Poin: $jumlahpoin\n");
  fwrite($file, "nama: $nama\n");
  fwrite($file, "nim: $nim\n\n");
  fclose($file);

  echo "<p>Output :</p>";
  echo "<center>Data Group A Piala Asia Qatar U-23</center>";
  echo "<center>Per ".date('d/M/y h:i:s')."</center>";
  echo "<center>$nama / $nim</center>";
  echo "<br>";

  $dataa="
<div class='tengah'>
<table border='1' cellpadding='10' cellspacing='0'>
    <tr>
        <td>Negara</td>
        <td>P</td>
        <td>M</td>
        <td>S</td>
        <td>K</td>
        <td>Poin</td>
    </tr>
    <tr>
        <td>$negara</td>
        <td>$jumlahp</td>
        <td>$jumlahm</td>
        <td>$jumlahs</td>
        <td>$jumlahk</td>
        <td>$jumlahpoin</td>

    </tr>
</table>
</div>
  
  ";
  echo $dataa;
}
?>
</body>
</html>
