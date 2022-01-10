<div class="page-header">
    <h1>New Product</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksilog.php'?>
        <form method="post">
            
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="kode" value="<?=$_POST['kode']?>"/>
            </div>
            <div class="form-group">
                <label>Nama<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST['nama']?>"/>
            </div>
            <div class="form-group">
                <label>Produk Line</label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST['productLine']?>"/>
            </div>
            <div class="form-group">
                <label>Quantity Order </label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST['QuantityOrder']?>"/>
            </div>
            <div class="form-group">
                <label>Stock </label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST['Stock']?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                <a class="btn btn-danger" href="?m=product"><span class="glyphicon glyphicon-arrow-left"></span> Cencel</a>
            </div>
        </form>
    </div>
</div>