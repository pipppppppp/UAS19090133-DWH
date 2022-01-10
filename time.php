<div class="page-header">
    <h1>Daftar Waktu</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="time" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Search" name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=time_tambah"><span class="glyphicon glyphicon-plus"></span> AddNew Time</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q =($_GET['q']);
        $rows = $db->get_results("SELECT * FROM dim_waktu 
            WHERE tahun LIKE '%$q%' OR bulan LIKE '%$q%' 
            ORDER BY tahun");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->id?></td>
            <td><?=$row->tanggal?></td>
            <td><?=$row->bulan?></td>
            <td><?=$row->tahun?></td>
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=time_ubah&ID=<?=$row->id?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksilog.php?act=time_hapus&ID=<?=$row->id?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>    
</div>