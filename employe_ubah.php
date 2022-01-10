<?php
    $row = $db->get_row("SELECT * FROM dim_employee WHERE id_employee='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Edit Employee</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksilog.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="kode" readonly="readonly" value="<?=$row->id_employee?>"/>
            </div>
            <div class="form-group">
                <label>Nama<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama?>"/>
            </div>
            <div class="form-group">
                <label>Job Title<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->jobTitle?>"/>
            </div>
            <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="city" value="<?=$row->city?>" />
            </div>
            <div class="form-group">
                <label>Country</label>
                <input class="form-control" type="text" name="country" value="<?=$row->country?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-danger" href="?m=employee"><span class="glyphicon glyphicon-arrow-left"></span> Cencel</a>
            </div>
        </form>
    </div>
</div>