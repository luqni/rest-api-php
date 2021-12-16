<?php
require_once "phinx.php";

echo "### Update Status Transaksi ###\n";
$references_id = (int)readline('Silahkan Masukkan Refences ID = ');

    global $mysqli;
    $query="SELECT * FROM transactions";
	$query.=" WHERE references_id=".$references_id." LIMIT 1";
    $data=array();
    $result=$mysqli->query($query);
    if(mysqli_num_rows($result) > 0){
        echo "Reference ID  $references_id Tersedia\n";
        $status = readline('Silahkan Masukkan Status (Paid/Failed) = ');

        $query  = "UPDATE transactions SET status = '$status'";
        $query .= "WHERE references_id = '$references_id'";
        $result = mysqli_query($mysqli, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
        }else{
            echo "Status Berhasil di Ubah!\n";
        }
    }else{
        echo "Reference ID Tidak Tersedia!\n";
    }

?>