<?php
include('../../database/koneksi.php');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $gambar = upload($data);
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar') ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {

        echo "<script>
alert('pilih gambar terlebih dahulu!');
</script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    //  var_dump($ekstensiGambar);
    //  die;
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!');
            </script>
        ";
        return false;
    }
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('ukuran gambar terlalu besar!');
            </script>
        ";
        return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa where id_siswa = $id");

    return mysqli_affected_rows($conn);
}



function ubah($data) {
    global $conn;

    // Get data from POST array
    $id_siswa = $data['id_siswa'];
    $nisn = $data['nisn'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $ttl = $data['ttl'];
    $alamat = $data['alamat'];
    $agama = $data['agama'];
    $no_telepon = $data['no_telepon'];
    $email = $data['email'];
    $asal_sekolah = $data['asal_sekolah'];
    $id_jurusan = $data['id_jurusan'];

    // Update query
    $query = "UPDATE siswa SET
              nisn = '$nisn',
              nama_lengkap = '$nama_lengkap',
              jenis_kelamin = '$jenis_kelamin',
              ttl = '$ttl',
              alamat = '$alamat',
              agama = '$agama',
              no_telepon = '$no_telepon',
              email = '$email',
              asal_sekolah = '$asal_sekolah',
              id_jurusan = '$id_jurusan'
              WHERE id_siswa = $id_siswa";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn); // Print the error if the query fails
        return 0; // Return 0 if there is an error
    }
}





function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE 
nama LIKE '%$keyword%' OR 
nrp LIKE '%$keyword%' OR 
email LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%'
";
    return query($query);
}


function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password salah!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    // tambahkan user ke data base
    mysqli_query($conn, "INSERT INTO user VALUE('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
