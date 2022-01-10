<?php
    $row = $db->get_row("SELECT * FROM dim_product WHERE id_product='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Edit Product</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksilog.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->id_product?>"/>
            </div>
            <div class="form-group">
                <label>Nama<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama?>"/>
            </div>
            <div class="form-group">
                <label>Produk Line</label>
                <input class="form-control" type="text" name="nama" value="<?=$row->productLine?>"/>
            </div>
            <div class="form-group">
                <label>Quantity Order </label>
                <input class="form-control" type="text" name="city" value="<?=$row->QuantityOrder?>" />
            </div>
            <div class="form-group">
                <label>Stock </label>
                <input class="form-control" type="text" name="country" value="<?=$row->Stock?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-danger" href="?m=product"><span class="glyphicon glyphicon-arrow-left"></span> Cencel</a>
            </div>
        </form>
    </div>
</div>