<?php
require_once'functions.php';
/** LOGIN */ 
if ($mod=='login'){
    $user = ($_POST['user']);
    $pass = ($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else{
        print_msg("Salah kombinasi username dan password.");
    }    
    
/** UBAH PASSWORD */ 
}else if ($mod=='password'){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION['login']);
    header("location:index.php?m=login");
}

/** Customer */
else if($mod=='cust_tambah'){
    $kode = $_POST['id_cust'];
    $nama = $_POST['nama'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM dim_cust WHERE id_cust ='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO dim_cust (id_cust, nama, city, country) VALUES ('$kode', '$nama', '$city, $country')");                       
        redirect_js("index.php?m=cust");
    }
} else if($mod=='cust_ubah'){
    $kode = $_POST['id_cust'];
    $nama = $_POST['nama'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE dim_cust SET nama='$nama', city='$city', country='$country' WHERE id_cust='$_GET[ID]'");
        redirect_js("index.php?m=cust");
    }
} else if ($act=='cust_hapus'){
    $db->query("DELETE FROM dim_cust WHERE id_cust='$_GET[ID]'");
    header("location:index.php?m=cust");
} 

/** EMPLOYEE */    
if($mod=='employe_tambah'){
    $kode = $_POST['id_employee'];
    $nama = $_POST['nama'];
    $Jt = $_POST['jobTitle'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM dim_employee WHERE id_employee ='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO dim_employee (id_employee, nama, jobTitle, city, country) VALUES ('$kode', '$nama', '$jt', '$city', '$country')");                       
        redirect_js("index.php?m=employee");
    }
} else if($mod=='employe_ubah'){
    $kode = $_POST['id_employee'];
    $nama = $_POST['nama'];
    $Jt = $_POST['jobTitle'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM dim_employee WHERE id_employee='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO dim_employee (id_employee, nama, jobTitle, city, country) VALUES ('$kode', '$nama', '$jt', '$city', '$country')");
        $id = $db->insert_id;                           
        redirect_js("index.php?m=employee");
    }                      
} else if ($act=='employe_hapus'){
    $db->query("DELETE FROM dim_employee WHERE id_employee='$_GET[ID]'");
    header("location:index.php?m=employee");
} 

// Produk
if($mod=='product_tambah'){
    $kode = $_POST['id_product'];
    $nama = $_POST['nama'];
    $pl = $_POST['productLine'];
    $qo = $_POST['QuantityOrder'];
    $stock = $_POST['Stock'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM dim_product WHERE id_product='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO dim_product (id_product, nama, productLine, QuantityOrder, Stock) VALUES ('$kode', '$nama', '$pl', '$qo', '$stock')");
        $id = $db->insert_id;                           
        redirect_js("index.php?m=product");
    }                    
} else if($mod=='product_ubah'){
    $kode = $_POST['id_product'];
    $nama = $_POST['nama'];
    $pl = $_POST['productLine'];
    $qo = $_POST['QuantityOrder'];
    $stock = $_POST['Stock'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE dim_product SET nama='$nama' WHERE id_product='$_GET[ID]'");
        redirect_js("index.php?m=product");
    }    
} else if ($act=='product_hapus'){
    $db->query("DELETE FROM dim_product WHERE id_product='$_GET[ID]'");
    header("location:index.php?m=product");
} 

// Time
if($mod=='time_tambah'){
    $kode = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    
    if($kode=='' || $tanggal=='' || $bulan == '' || $tahun=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM dim_waktu WHERE id='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO dim_waktu (id, tanggal, bulan, tahun) VALUES ('$kode', '$tanggal', '$bulan', '$tahun')");
        $id = $db->insert_id;                           
        redirect_js("index.php?m=time");
    }                    
} else if($mod=='time_ubah'){
    $kode = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    if($kode=='' || $tanggal=='' || $bulan == '' || $tahun=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE dim_waktu SET tanggal='$tanggal' WHERE id='$_GET[ID]'");
        redirect_js("index.php?m=time");
    }    
} else if ($act=='time_hapus'){
    $db->query("DELETE FROM dim_waktu WHERE id='$_GET[Id]'");
    header("location:index.php?m=time");
} 


// /** Fakta TAMBAH */ 
// else if ($mod=='fakta_tambah'){
//     $id = $_POST['Id']
//     $ske = $_POST['sk_employee'];
//     $skp = $_POST['sk_produk'];
//     $skc = $_POST['sk_customer'];
//     $qo = $_POST['QuantityOrder'];
//     $waktu = $_POST['sk_waktu'];
//     $amount = $_POST['amount'];
    
//     if($id=='' || $waktu=='' || $amount='')
//         print_msg("Field bertanda * tidak boleh kosong!");
//     elseif($db->get_results("SELECT * FROM fakta WHERE sk_waktu='$waktu'"))
//         print_msg("Kode sudah ada!");
//     else{
//         $db->query("INSERT INTO fakta (Id, sk_employee, id_produk, sk_customer, productLine, QuantityOrder, QuantityOrder, sk_waktu, amount) VALUES ('$id', '$ske', '$skc', '$skp', '$waktu', '$amount')");
//         $id = $db->insert_id;                           
//         redirect_js("index.php?m=fakta");
//     }                    
// }
// else if($mod=='fakta_ubah'){
//     $id = $_POST['Id']
//     $ske = $_POST['sk_employee'];
//     $skp = $_POST['sk_produk'];
//     $skc = $_POST['sk_customer'];
//     $qo = $_POST['QuantityOrder'];
//     $waktu = $_POST['sk_waktu'];
//     $amount = $_POST['amount'];
    
//     if($id=='' || $waktu=='' || $amount='')
//         print_msg("Field bertanda * tidak boleh kosong!");
//     else{
//         $db->query("UPDATE fakta SET sk_produk='$skp', amount='$amount' WHERE ID='$_GET[ID]'");
//         redirect_js("index.php?m=fakta");
//     }    
// } else if ($act=='fakta_hapus'){
//     $db->query("DELETE FROM fakta WHERE id='$_GET[ID]'");
//     header("location:index.php?m=fakta");     
// }
?>
