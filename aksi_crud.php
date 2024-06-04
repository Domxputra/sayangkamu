<?php

//pangil koneksi database
include "koneksi.php";


//uji jika tompol simpan di klik
if(isset($_POST['bsimpan'])) {

    //persiapan simpan baru 
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nama, alamat, jk, agama, asl_sklh, tgl_lahir)
                                      VALUES ('$_post[tnamadosen]',
                                             '$_post[tmatakuliah]',
                                             '$_post[tjurusan]',
                                             '$_post[tsemester]') ");
    
    //jika simpan sukses
    if ($simpan) {
    echo "<script>
            alert('Simpan data sukses');
            document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal');
                document.location='index.php';
            </script>";
    }
}



//uji jika tompol ubah di klik
if(isset($_POST['bubah'])) {

    //persiapan ubah baru 
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET
                                                    nama = '$_POST[tnamadosen]',
                                                    matakuliah = '$_POST[tmatakuliah]',
                                                    jurusan = '$_POST[tjurusan]',
                                                    semester = '$_POST[tsemester]'
                                                WHERE id_mhs = '$_POST[id_mhs]'
                                                    ");
    
    //jika ubah sukses
    if ($ubah) {
    echo "<script>
            alert('ubah data sukses');
            document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('ubah data gagal');
                document.location='index.php';
            </script>";
    }
}


//uji jika tompol hapus di klik
if(isset($_POST['bhapus'])) {

    //persiapan ubah baru 
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]' ");
    
    //jika hapus sukses
    if ($hapus) {
    echo "<script>
            alert('Hapus data sukses');
            document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                document.location='index.php';
            </script>";
    }
}
?>