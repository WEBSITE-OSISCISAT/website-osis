<?php
$koneksi = mysqli_connect("localhost", "root", "", "osis");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm  = $_POST["confirm"];


    if ($password !== $confirm) {
        $error = "Password tidak sama!";
    } else {
        // Enkripsi password biar aman
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Insert ke tabel akun (sesuaikan nama tabel)
        $query = "INSERT INTO akun (username, password) VALUES ('$username', '$hashed')";

        if (mysqli_query($koneksi, $query)) {
            $success = "Akun berhasil dibuat!";
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($koneksi);
        }
    }
}
?>
