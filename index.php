<?php
$host     = "localhost";
$username = 'root';
$password = '';
$database = 'Mahasiswa';

    $koneksi = mysqli_connect($host, $username, $password, $database);
    if (!$koneksi) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }
$nim = "";
$nama = "";
$jenjang = "";
$programStudi = "";
$masuk = "";
$status = "";
$smt = "";
$sks = "";
$ipk = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from dataMahasiswa where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
    $sukses = "Berhasil hapus data";
    }else{
    $error = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from dataMahasiswa where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim = $r1['nim'];
    $nama = $r1['nama'];
    $jenjang = $r1['jenjang'];
    $programStudi = $r1['programStudi'];
    $masuk = $r1['masuk'];
    $status = $r1['status'];
    $smt = $r1['smt'];
    $sks = $r1['sks'];
    $ipk = $r1['ipk'];

    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenjang = $_POST['jenjang'];
    $programStudi = $_POST['programStudi'];
    $masuk = $_POST['masuk'];
    $status = $_POST['status'];
    $smt = $_POST['smt'];
    $sks = $_POST['sks'];
    $ipk = $_POST['ipk'];

    if ($nim && $nama && $jenjang && $programStudi && $masuk && $status && $smt && $sks && $ipk) {
        if ($op == 'edit') { //untuk update
            $sql1 = "update dataMahasiswa set nim = '$nim',nama='$nama',jenjang = '$jenjang',programStudi='$programStudi', masuk =
            '$masuk', status = '$status', smt = '$smt', sks = '$sks', ipk = '$ipk' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "insert into dataMahasiswa(nim,nama,jenjang,programStudi,masuk,status,smt,sks,ipk) values
            ('$nim','$nama','$jenjang','$programStudi','$masuk','$status','$smt','$sks','$ipk')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
    .mx-auto {
        width: 800px
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Tambah / Perbaharui Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Jenjang</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenjang" id="jenjang">
                                <option value="">- Pilih Jenjang -</option>
                                <option value="Strata-1" <?php if ($jenjang == "Strata-1") echo "selected" ?>>Strata-1
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="programStudi" class="col-sm-2 col-form-label">Program Studi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="programStudi" id="programStudi">
                                <option value="">- Pilih Program Studi -</option>
                                <option value="Informatika"
                                    <?php if ($programStudi == "Informatika") echo "selected" ?>>Informatika
                                </option>
                                <option value="Arsitektur" <?php if ($programStudi == "Arsitektur") echo "selected" ?>>
                                    Arsitektur
                                </option>
                                <option value="Sistem Informasi"
                                    <?php if ($programStudi == "Sistem Informasi") echo "selected" ?>>
                                    Sistem Informasi
                                </option>
                                <option value="Desain Produk"
                                    <?php if ($programStudi == "Desain Produk") echo "selected" ?>>
                                    Desain Produk
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="masuk" class="col-sm-2 col-form-label">Masuk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="masuk" name="masuk"
                                value="<?php echo $masuk ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">- Aktiv / Non-Aktiv -</option>
                                <option value="Aktiv" <?php if ($status == "Aktiv") echo "selected" ?>>Aktiv
                                </option>
                                <option value="Non-Aktiv" <?php if ($status == "Non-Aktiv") echo "selected" ?>>
                                    Non-Aktiv
                                </option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="smt" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="smt" name="smt" value="<?php echo $smt ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sks" name="sks" value="<?php echo $sks ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenjang</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Status</th>
                            <th scope="col">Semester</th>
                            <th scope="col">SKS</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from dataMahasiswa order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nim        = $r2['nim'];
                            $nama       = $r2['nama'];
                            $jenjang    = $r2['jenjang'];
                            $programStudi = $r2['programStudi'];
                            $masuk = $r2['masuk'];
                            $status = $r2['status'];
                            $smt = $r2['smt'];
                            $sks = $r2['sks'];
                            $ipk = $r2['ipk'];

                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $nim ?></td>
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="row"><?php echo $jenjang ?></td>
                            <td scope="row"><?php echo $programStudi ?></td>
                            <td scope="row"><?php echo $masuk ?></td>
                            <td scope="row"><?php echo $status ?></td>
                            <td scope="row"><?php echo $smt ?></td>
                            <td scope="row"><?php echo $sks ?></td>
                            <td scope="row"><?php echo $ipk ?></td>
                            <td scope="row">
                                <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <a href="index.php?op=delete&id=<?php echo $id?>"
                                    onclick="return confirm('Yakin mau delete data?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>