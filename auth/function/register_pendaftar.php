<?php
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM pendaftar WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password salah!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user ke database
    $query = "INSERT INTO pendaftar (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    // cek apakah data berhasil disimpan
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Registrasi berhasil!');</script>";
        return true;
    } else {
        echo "<script>alert('Registrasi gagal!');</script>";
        return false;
    }
}
