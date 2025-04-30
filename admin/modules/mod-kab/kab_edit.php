<?php
    $id_kab     = $_GET['id_kab'];
    $datakab    = $config->detail_datakab($id_kab);
    $data       = mysqli_fetch_assoc($datakab);
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">EDIT KABUPATEN</h3>
    </div>
<div class="card-body">
<div class="panel-body">
    <form class="form-horizontal bucket-form" method="POST" action="index.php?module=<?php echo $modul; ?>&act=update">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Kabupaten</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_kab" placeholder="Nama Kabupaten" value="<?php echo $data['nama_kab']; ?>">
                <input type="hidden" class="form-control" name="id_kab" value="<?php echo $data['id_kab']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Kode</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" placeholder="Kode" value="<?php echo $data['kode']; ?>">
            </div>
        </div>
        <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <input type="submit" class="btn btn-primary" value="Simpan" />
                  <input type="button" class="btn btn-default" onClick="location.href='?module=<?php echo $modul; ?>&act=view'" value="Batal" />
                </div>
              </div>
    </form>
</div>