<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){

        $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxId);
        $generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1);
        
        //proses insert
        $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES (
            '".$generateId."',
            '".date('Y.m.d')."',
            '".$_POST['th_ajaran']."',
            '".$_POST['jurusan']."',
            '".$_POST['nm']."',
            '".$_POST['tmp_lahir']."',
            '".$_POST['tgl_lahir']."',
            '".$_POST['jk']."',
            '".$_POST['agama']."',
            '".$_POST['alamat']."'
        )");

        if($insert){
            echo '<script>window.location="succes.php?id='.$generateId.'"</script>';
        }else{
            echo 'Gagal'.mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html> 
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Anggota Baru Online</title>
    <link rel="stylesheet" type = "text/css" href="css/style.css">
    </head>
    <body>
        <section class="box-formulir">
        <h2>Pendaftaran Anggota Baru</h2>

        <form action="" method="post">
            <div class="box">
                <table  class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><input type="text" name="th_ajaran" class="input-control" value="2021/2022" readonly></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select name="jurusan" class="input-control">
                                <option value="">--Pilih--</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <h3>Data Diri Calon Anggota</h3>
            <div class="box">
                <table  class="table-form">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nm" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tmp_lahir" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_lahir" class="input-control"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><input type="radio" name="jk" class="input-control" value="laki-laki">Laki-Laki &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="jk" class="input-control" value="perempuan">Perempuan</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select name="agama" class="input-control">
                                <option value="">--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="katolik">Katolik</option>
                                <option value="Khonghucu">Khonghucu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td><textarea name="alamat" class="input-control"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="submit" class="btn-daftar"value="Daftar Sekarang"></td>
                    </tr>
                </table>
            </div>
            
        </form>

        </section>
    </body>
</html>