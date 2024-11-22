<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah data mahasiswa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama']; // Menambah agama
    $nama_ayah = $_POST['nama_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ortu = $_POST['penghasilan_ortu']; // Menambah penghasilan

    $query = "INSERT INTO mahasiswa1 (nama, nik, asal_sekolah, email, jenis_kelamin, agama, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, penghasilan_ortu) 
              VALUES ('$nama', '$nik', '$asal_sekolah', '$email', '$jenis_kelamin', '$agama', '$nama_ayah', '$pekerjaan_ayah', '$nama_ibu', '$pekerjaan_ibu', '$penghasilan_ortu')";
    $conn->query($query);
    header("Location: tabel_mahasiswa.php"); // Redirect ke halaman tabel setelah submit
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengisian Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Form Pengisian Data Mahasiswa</h2>

        <!-- Form untuk menambah data mahasiswa -->
        <form method="POST" class="form">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" required>
            </div>

            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" name="nik" id="nik" placeholder="NIK" required>
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required>
                        Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="agama">Agama:</label>
                <select name="agama" id="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_ayah">Nama Ayah:</label>
                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" required>
            </div>

            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required>
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu:</label>
                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" required>
            </div>

            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required>
            </div>

            <div class="form-group">
                <label for="penghasilan_ortu">Penghasilan Orang Tua:</label>
                <select name="penghasilan_ortu" id="penghasilan_ortu" required>
                    <option value="">Pilih Penghasilan</option>
                    <option value="Di Bawah 3 Juta">Di Bawah 3 Juta</option>
                    <option value="3-5 Juta">3-5 Juta</option>
                    <option value="5-10 Juta">5-10 Juta</option>
                    <option value="Di Atas 10 Juta">Di Atas 10 Juta</option>
                </select>
            </div>

            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</body>
</html>