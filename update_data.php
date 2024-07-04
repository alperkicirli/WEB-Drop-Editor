<?php
include 'ayarlar.php';

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sindex = $_POST['sindex'];
    $iItem01 = $_POST['iItem01'];
    $sPersent01 = $_POST['sPersent01'];
    $iItem02 = $_POST['iItem02'];
    $sPersent02 = $_POST['sPersent02'];
    $iItem03 = $_POST['iItem03'];
    $sPersent03 = $_POST['sPersent03'];
    $iItem04 = $_POST['iItem04'];
    $sPersent04 = $_POST['sPersent04'];
    $iItem05 = $_POST['iItem05'];
    $sPersent05 = $_POST['sPersent05'];
    $iItem06 = $_POST['iItem06'];
    $sPersent06 = $_POST['sPersent06'];
    $iItem07 = $_POST['iItem07'];
    $sPersent07 = $_POST['sPersent07'];
    $iItem08 = $_POST['iItem08'];
    $sPersent08 = $_POST['sPersent08'];
    $iItem09 = $_POST['iItem09'];
    $sPersent09 = $_POST['sPersent09'];
    $iItem10 = $_POST['iItem10'];
    $sPersent10 = $_POST['sPersent10'];
    $iItem11 = $_POST['iItem11'];
    $sPersent11 = $_POST['sPersent11'];
    $iItem12 = $_POST['iItem12'];
    $sPersent12 = $_POST['sPersent12'];

    $sql = "UPDATE k_monster_item 
            SET iItem01 = ?, sPersent01 = ?, iItem02 = ?, sPersent02 = ?, iItem03 = ?, sPersent03 = ?, iItem04 = ?, sPersent04 = ?, 
                iItem05 = ?, sPersent05 = ?, iItem06 = ?, sPersent06 = ?, iItem07 = ?, sPersent07 = ?, iItem08 = ?, sPersent08 = ?, 
                iItem09 = ?, sPersent09 = ?, iItem10 = ?, sPersent10 = ?, iItem11 = ?, sPersent11 = ?, iItem12 = ?, sPersent12 = ?
            WHERE sindex = ?";
    $params = array($iItem01, $sPersent01, $iItem02, $sPersent02, $iItem03, $sPersent03, $iItem04, $sPersent04, $iItem05, $sPersent05, $iItem06, $sPersent06, 
                    $iItem07, $sPersent07, $iItem08, $sPersent08, $iItem09, $sPersent09, $iItem10, $sPersent10, $iItem11, $sPersent11, $iItem12, $sPersent12, $sindex);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo json_encode(array("status" => "success"));
}
?>
