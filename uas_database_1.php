<?php
$conn = mysqli_connect("localhost", "root", "", "db_mik1_uas_1");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rekap Pemilihan Suara</title>
</head>

<body>
   <h3>Form Pemilihan Suara</h3>
   <form action="" method="post">
      <fieldset>
         <label>Nama Pemilih</label>
         <select name="nama_pemilih">
            <?php
            $data_pemilih = $conn->query("SELECT * FROM pemilih WHERE status = '0'");
            foreach ($data_pemilih as $pemilih) :
            ?>
               <option value="<?= $pemilih['id_pemilih'] ?>"><?= $pemilih['nama_pemilih'] ?></option>
            <?php endforeach
            ?>
         </select> <br>
         <label>Kandidat Pasang</label>
         <select name="kandidat_pasangan">
            <?php
            $data_kandidat = $conn->query("SELECT * FROM kandidat");
            foreach ($data_kandidat as $kandidat) :
            ?>
               <option value="<?= $kandidat['id_kandidat'] ?>">
                  <?= $kandidat['nomor_urut'] . ' - ' . $kandidat['nama_kepala_daerah'] . ' - ' . $kandidat['nama_wakil_kepala_daerah']  ?>
               </option>
            <?php endforeach
            ?>
         </select> <br>
         <button type="submit">Simpan</button>
      </fieldset>
   </form>

   <h3>Data Pemilih (Soal 1)</h3>
   <table border="1" cellpadding="5" cellspacing="0">
      <tr>
         <td>Nama Pemilih</td>
         <td>Alamat</td>
         <td>Nama Calon Kepala Daerah</td>
         <td>Nama Calon Wakil Kepala Daerah</td>
      </tr>
      <?php
      $sql = $conn->query("SELECT * FROM data_pemilih");
      foreach ($sql as $pemilih) :
      ?>
         <tr>
            <td><?= $pemilih['nama_pemilih'] ?></td>
            <td><?= $pemilih['alamat'] ?></td>
            <td><?= $pemilih['nama_kepala_daerah'] ?></td>
            <td><?= $pemilih['nama_wakil_kepala_daerah'] ?></td>
         </tr>
      <?php endforeach ?>
   </table>

   <h3>Rekap Suara (Soal 2)</h3>
   <table border="1" cellpadding="5" cellspacing="0">
      <tr>
         <td>Nama Pemilih</td>
         <td>Alamat</td>
         <td>Nama Calon Kepala Daerah</td>
         <td>Nama Calon Wakil Kepala Daerah</td>
      </tr>
      <?php
      $rekap = $conn->query("SELECT * FROM rekap_suara");
      foreach ($rekap as $r) :
      ?>
         <tr>
            <td><?= $r['nomor_urut'] ?></td>
            <td><?= $r['nama_kepala_daerah'] ?></td>
            <td><?= $r['nama_wakil_kepala_daerah'] ?></td>
            <td><?= $r['jumlah_suara'] ?></td>
         </tr>
      <?php endforeach ?>
   </table>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $kandidat_pasangan = $_POST['kandidat_pasangan'];
   $nama_pemilih = $_POST['nama_pemilih'];

   // Cek Pemilih
   $cek_pemilih = $conn->query("SELECT * FROM hasil_pemilihan WHERE pemilih_id = '$nama_pemilih'");
   if ($cek_pemilih->num_rows > 0) {
      echo "<script>alert('Pemilih Sudah Memilih')</script>";
      exit;
   }

   $sql = $conn->query("INSERT INTO hasil_pemilihan (pemilih_id, kandidat_id) VALUES ('$nama_pemilih','$kandidat_pasangan')");

   $conn->query("UPDATE pemilih SET status = '1' WHERE id_pemilih = '$nama_pemilih'");

   echo "<script>location.reload();</script>";
}
?>