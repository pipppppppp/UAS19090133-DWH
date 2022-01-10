<?php
    $row = $db->get_row("SELECT * FROM dim_waktu WHERE id='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Edit Waktu</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksilog.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="kode" readonly="readonly" value="<?=$row->id?>"/>
            </div>
            <div class="form-group">
                <label>Tanggal<span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="nama" value="<?=$row->tanggal?>"/>
            </div>
            <div class="form-group">
                <label>Bulan<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->bulan?>"/>
            </div>
            <div class="form-group">
                <label>Tahun <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="city" value="<?=$row->tahun?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-danger" href="?m=time"><span class="glyphicon glyphicon-arrow-left"></span> Cencel</a>
            </div>
        </form>
    </div>
</div>