<div class="page-header">
    <h1>Data Tabel Fakta</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="fakta" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Search" name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
    </form>
</div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw">
        <th>Sk Employee</th>
        <th>Sk Produk</th>
        <th>Sk Customer</th>
        <th>Sk  Waktu</th>
        <th>Amont</th>
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
            <td><?=$row->sk_employee?></td>
            <td><?=$row->sk_produk?></td>
            <td><?=$row->sk_customer?></td>
            <td><?=$row->sk_waktu?></td>
            <td><?=$row->amount?></td>
</tr>
<?php endforeach;?>
</table>
</div>