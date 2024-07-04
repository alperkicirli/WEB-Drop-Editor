
<?php
$serverName = "DB SERVERNAME";
$connectionOptions = array(
    "Database" => "DB ADI",
    "Uid" => "DB KULLANICI ADI",
    "PWD" => "DB ŞİFRESİ"
);

// Veritabanı bağlantısı
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>