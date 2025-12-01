<?php
include 'koneksi.php';

if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$npm            = $_POST['npm'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$kelas          = $_POST['kelas'];
$status         = $_POST['status'];
$bukti_foto     = $_FILES['bukti_foto']['name'];

if (empty($bukti_foto)) {


    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $bukti_foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_foto']['tmp_name'];
    $angka_acak = rand(1,999);
    $nama_bukti_baru = $angka_acak.'-'.$bukti_foto;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

        if (!move_uploaded_file($file_tmp, 'bukti_foto/'.$nama_bukti_baru)) {
            echo "<script>alert('Gagal memindahkan file.');window.location='tambah.php';</script>";
            exit;
        }

        $query = "INSERT INTO absensi (npm, nama_mahasiswa, kelas, status, bukti_foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);

        if ($stmt === false) {
            die("Prepare statement gagal: " . $koneksi->error);
        }

        $stmt->bind_param("sssss", $npm, $nama_mahasiswa, $kelas, $status, $nama_bukti_baru);

        if ($stmt->execute()) {
            echo "<script>alert('Data absensi berhasil ditambah.');window.location='index.php';</script>";
        } else {
            die("Eksekusi query gagal: " . $stmt->error);
        }

        $stmt->close();

    } else {
        echo "<script>alert('Ekstensi bukti foto harus png, jpg, atau jpeg.');window.location='tambah.php';</script>";
    }
} else {
    echo "<script>alert('Bukti foto wajib diisi.');window.location='tambah.php';</script>";
}
?>
