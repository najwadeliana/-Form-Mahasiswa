<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data mahasiswa berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa1 WHERE id = $id");
$data = $result->fetch_assoc();

// Update data mahasiswa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $email = $_POST['email'];
    $nama_ayah = $_POST['nama_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ortu = $_POST['penghasilan_ortu'];

    $query = "UPDATE mahasiswa1 SET 
                nama = '$nama', 
                nik = '$nik', 
                asal_sekolah = '$asal_sekolah', 
                email = '$email', 
                nama_ayah = '$nama_ayah', 
                pekerjaan_ayah = '$pekerjaan_ayah', 
                nama_ibu = '$nama_ibu', 
                pekerjaan_ibu = '$pekerjaan_ibu', 
                penghasilan_ortu = '$penghasilan_ortu'
              WHERE id = $id";
    $conn->query($query);

    // Redirect ke halaman utama setelah update
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>

        <!-- Form Edit Data -->
        <form method="POST" class="form">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama" required>
            <input type="text" name="nik" value="<?= $data['nik'] ?>" placeholder="NIK" required>
            <input type="text" name="asal_sekolah" value="<?= $data['asal_sekolah'] ?>" placeholder="Asal Sekolah" required>
            <input type="email" name="email" value="<?= $data['email'] ?>" placeholder="Email" required>
            <input type="text" name="nama_ayah" value="<?= $data['nama_ayah'] ?>" placeholder="Nama Ayah" required>
            <input type="text" name="pekerjaan_ayah" value="<?= $data['pekerjaan_ayah'] ?>" placeholder="Pekerjaan Ayah" required>
            <input type="text" name="nama_ibu" value="<?= $data['nama_ibu'] ?>" placeholder="Nama Ibu" required>
            <input type="text" name="pekerjaan_ibu" value="<?= $data['pekerjaan_ibu'] ?>" placeholder="Pekerjaan Ibu" required>

            <!-- Pilihan Penghasilan Orang Tua -->
            <div class="form-group">
                <label>Penghasilan Orang Tua:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="penghasilan_ortu" value="Di Bawah 3 Juta" <?= $data['penghasilan_ortu'] == 'Di Bawah 3 Juta' ? 'checked' : '' ?> required>
                        <span>Di Bawah 3 Juta</span>
                    </label>
                    <label>
                        <input type="radio" name="penghasilan_ortu" value="3-5 Juta" <?= $data['penghasilan_ortu'] == '3-5 Juta' ? 'checked' : '' ?> required>
                        <span>3-5 Juta</span>
                    </label>
                    <label>
                        <input type="radio" name="penghasilan_ortu" value="5-10 Juta" <?= $data['penghasilan_ortu'] == '5-10 Juta' ? 'checked' : '' ?> required>
                        <span>5-10 Juta</span>
                    </label>
                    <label>
                        <input type="radio" name="penghasilan_ortu" value="Di Atas 10 Juta" <?= $data['penghasilan_ortu'] == 'Di Atas 10 Juta' ? 'checked' : '' ?> required>
                        <span>Di Atas 10 Juta</span>
                    </label>
                </div>
            </div>

            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>