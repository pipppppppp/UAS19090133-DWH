<div class="page-header">
    <h1>Daftar Produk</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="product" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Search" name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=product_tambah"><span class="glyphicon glyphicon-plus"></span> AddNew Product</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>Kode</th>
                <th>Nama</th>
                <th>Produk Line</th>
                <th>Quantity Order</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q =($_GET['q']);
        $rows = $db->get_results("SELECT * FROM dim_product 
            WHERE id_product LIKE '%$q%' OR nama LIKE '%$q%' OR Stock  LIKE '%$q%' 
            ORDER BY id_product");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->id_product?></td>
            <td><?=$row->nama?></td>
            <td><?=$row->productLine?></td>
            <td><?=$row->QuantityOrder?></td>
            <td><?=$row->Stock?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=product_ubah&ID=<?=$row->id_product?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksilog.php?act=product_hapus&ID=<?=$row->id_product?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>    
</div>