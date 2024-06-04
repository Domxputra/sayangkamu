<?php

//panggil koneksi
include "koneksi.php";

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud_matakuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>

        <div class="container">

            <div class=mt-3>
                <h3 class="text-center">TABEL</h3>
                <h3 class="text-center">MATAKULIAH</h3>

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Data matakuliah
                    </div>
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            Tambah Data
                        </button>
                        <!--- akhir trigger modal-->

                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No.</th>
                                <th>Nama Dosen</th>
                                <th>Matakuliah</th>
                                <th>Jurusan</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>

                            <?php
                            $no =1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs ASC");
                            while($data = mysqli_fetch_array($tampil)) :
                            
                            ?>

                            <tr>
                                <td><?=$no++ ?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['matakuliah']?></td>
                                <td><?= $data['jurusan']?></td>
                                <td><?= $data['semester']?></td>
                                <td>
                                    <a href="#" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>" >Ubah</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                                </td>
                            </tr>
                                
                            <!-- awal Modal ubah -->
                            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Matakuliah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">

                                            <div class="modal-body">
                                                
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Dosen</label>
                                                        <input type="text" class="form-control" name="tnamadosen" value="<?=$data['nama'] ?>" placeholder="Masukan Nama Dosen">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Matakuliah</label>
                                                        <input type="text" class="form-control" name="tmatakuliah" value="<?=$data['matakuliah'] ?>" placeholder="Masukan Matakuliah">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jurusan</label>
                                                        <select class="form-select" name="tjurusan">
                                                            <option value="<?=$data['jurusan'] ?>"><?=$data['jurusan'] ?></option>
                                                            <option value="Informatika">Informatika</option>
                                                            <option value="Informasi">Informasi</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Semester</label>
                                                        <select class="form-select" name="tsemester">
                                                            <option value="<?=$data['semester'] ?>"><?=$data['semester'] ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"name="bubah">Ubah</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---akhir modal ubah--->

                            <!-- awal Modal hapus -->
                            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi hapus data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">

                                            <div class="modal-body">

                                                <h5 class="text-center">Apakah anda yakin menghapus data ini? <br>
                                                <span class="text-danger"><?=$data['nama'] ?> - <?=$data['matakuliah'] ?></span>

                                                </h5>
                                                
                                                    
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"name="bhapus">Ya hapus KZ</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---akhir modal hapus--->


                            <?php endwhile; ?>
                        </table>


                            <!-- awal Modal -->
                            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Matakuliah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Dosen</label>
                                                        <input type="text" class="form-control" name="tnamadosen" placeholder="Masukan Nama Dosen">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Matakuliah</label>
                                                        <input type="text" class="form-control" name="tmatakuliah" placeholder="Masukan Matakuliah">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jurusan</label>
                                                        <select class="form-select" name="tjurusan">
                                                            <option></option>
                                                            <option value="Informatika">Informatika</option>
                                                            <option value="Informasi">Informasi</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Semester</label>
                                                        <select class="form-select" name="tsemester">
                                                            <option></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"name="bsimpan">Simpan</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---akhir modal--->
                    </div>
                </div>
            </div>
        </div>

    




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>