<div class="card">
    <div class="card-header">
        <h3 class="card-title">INPUT KABUPATEN</h3>
    </div>
<div class="card-body">
<div class="panel-body">
    <form class="form-horizontal bucket-form" method="POST" action="index.php?module=<?php echo $modul; ?>&amp;act=create">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama Kabupaten</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_kab" placeholder="Nama Kabupaten">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Kode</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" placeholder="Kode">
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
</div>
</div>