<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "mahasiswa_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus data mahasiswa
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM mahasiswa1 WHERE id = $id");
    header("Location: tabel_mahasiswa.php");
}

// Ambil data mahasiswa
$result = $conn->query("SELECT * FROM mahasiswa1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>

        <!-- Tabel Data Mahasiswa -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Asal Sekolah</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Nama Ayah</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Penghasilan Orang Tua</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$data['nama']}</td>
                            <td>{$data['nik']}</td>
                            <td>{$data['asal_sekolah']}</td>
                            <td>{$data['email']}</td>
                            <td>{$data['jenis_kelamin']}</td>
                            <td>{$data['agama']}</td>
                            <td>{$data['nama_ayah']}</td>
                            <td>{$data['pekerjaan_ayah']}</td>
                            <td>{$data['nama_ibu']}</td>
                            <td>{$data['pekerjaan_ibu']}</td>
                            <td>{$data['penghasilan_ortu']}</td>
                            <td>
                                <a href='edit.php?id={$data['id']}'>Edit</a> | 
                                <a href='tabel_mahasiswa.php?delete={$data['id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>