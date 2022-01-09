<div class="page-header">
    <h1>Daftar Custommer</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="diagnosa" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>"
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=cust_tambah"><span class="glyphicon glyphicon-plus"></span> AddNew Customer</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>City</th>
                <th>Cintry</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q =($_GET['q']);
        $rows = $db->get_results("SELECT * FROM dim_cust 
            WHERE id_cust LIKE '%$q%' OR nama LIKE '%$q%' 
            ORDER BY id_cust");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->id?></td>
            <td><?=$row->id_cust?></td>
            <td><?=$row->nama?></td>
            <td><?=$row->city?></td>
            <td><?=$row->country?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=cust_ubah&ID=<?=$row->kode_cust?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksilog.php?act=cust_hapus&ID=<?=$row->kode_cust?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>    
</div>