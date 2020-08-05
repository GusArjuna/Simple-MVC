<div class="container mt-3">
  <div class="row-1">
    <div class="col-lg-6">
        <?php Flasher::flash()?>
    </div>
  </div>

<div class="row-1">
  <div class="col-lg-6 mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Add Data Mahasiswa
    </button>
  </div>
</div>

<div class="row-1  mb-3">
  <div class="col-lg-6">
   <form action="<?= BASEURL;?>/mahasiswa/cari" method="post">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit" id="tombolCari">Cari!</button>
      </div>
    </div>
  </form> 
  </div>
</div>

  <div class="row-1">
    <div class="col-lg-6"></div>
        <h3>Daftar Mahasiswa</h3>
        <ul class="list-group">
            <?php foreach($data['mhs'] as $mhs):?>
                <li class="list-group-item">
                    <?= $mhs['nama']?>
                    <a href="<?= BASEURL?>/mahasiswa/hapus/<?= $mhs['id'];?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= BASEURL?>/mahasiswa/ubah/<?= $mhs['id'];?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id'];?>">Edit</a>
                    <a href="<?= BASEURL?>/mahasiswa/detail/<?= $mhs['id'];?>" class="badge badge-primary float-right">Detail</a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama : </label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="nim">NIM : </label>
            <input type="number" class="form-control" id="nim" name="nim">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Teknik Arsitektur">Teknik Arsitektur</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>