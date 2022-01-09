<div class="page-header">
    <h1>Daftar Employee</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="gejala" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=gejala_tambah"><span class="glyphicon glyphicon-plus"></span> AddNew Employee</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Job Title</th>
                <th>City</th>
                <th>Country</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = ($_GET['q']);
        $rows = $db->get_results("SELECT * FROM dim_employee 
        WHERE id_employee LIKE '%$q%' OR nama LIKE '%$q%' OR city LIKE '%$q%' 
        ORDER BY id_employee");        
        foreach($rows as $row):?>
        <tr>
        <td><?=$row->id?></td>
            <td><?=$row->id_employee?></td>
            <td><?=$row->nama?></td>
            <td><?=$row->jobTitle?></td>
            <td><?=$row->city?></td>
            <td><?=$row->country?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=gejala_ubah&ID=<?=$row->id_employee?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksilog.php?act=gejala_hapus&ID=<?=$row->id_employee?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>