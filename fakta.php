<div class="page-header">
    <h1>Data Tabel Fakta</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="relasi" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="?m=relasi_tambah"><span class="glyphicon glyphicon-plus"></span> AddNew Fakta</a>
        </div>
    </form>
</div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw">
        <th>No</th>
        <th>Sk Employee</th>
        <th>Sk Produk</th>
        <th>Sk Customer</th>
        <th>Sk  Waktu</th>
        <th>Amont</th>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$q = ($_GET['q']);
$rows = $db->get_results("SELECT * FROM fakta 
WHERE id LIKE '%$q%' OR sk_waktu LIKE '%$q%' 
ORDER BY id");
$no=0;

foreach($rows as $row):?>
<tr>
           <td><?=$row->id?></td>
            <td><?=$row->sk_employee?></td>
            <td><?=$row->sk_produk?></td>
            <td><?=$row->sk_customer?></td>
            <td><?=$row->sk_waktu?></td>
            <td><?=$row->amount?></td>
    <td class="nw">
        <a class="btn btn-xs btn-warning" href="?m=relasi_ubah&ID=<?=$row->ID?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksilog.php?act=relasi_hapus&ID=<?=$row->ID?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;?>
</table>
</div>