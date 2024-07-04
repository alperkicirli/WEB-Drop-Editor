<?php
include 'ayarlar.php';

// Arama sorgusu için kullanılacak parametreleri alın
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';


// Veritabanından canavarları getiren sorgu
// $searchQuery'yi burada kullanarak veritabanında filtreleme yapın

// Sonuçları JSON formatında döndürün
//echo json_encode($results);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$records_per_page = 30;
$offset = ($page - 1) * $records_per_page;

$sql = "SELECT sindex, strName, iItem01, sPersent01, iItem02, sPersent02, iItem03, sPersent03, iItem04, sPersent04, iItem05, sPersent05, iItem06, sPersent06, iItem07, sPersent07, iItem08, sPersent08, iItem09, sPersent09, iItem10, sPersent10, iItem11, sPersent11, iItem12, sPersent12 
        FROM k_monster_item m 
        JOIN k_monster mn ON m.sindex = mn.sSid 
        WHERE mn.strName LIKE CONCAT('%', ?, '%')  -- Örnek: Canavar adına göre filtreleme
        ORDER BY m.sindex
        OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
$params = array("%$searchQuery%", $offset, $records_per_page);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$data = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

$total_sql = "SELECT COUNT(*) AS total FROM k_monster_item";
$total_stmt = sqlsrv_query($conn, $total_sql);
$total_row = sqlsrv_fetch_array($total_stmt, SQLSRV_FETCH_ASSOC);
$total_records = $total_row['total'];

$response = array(
    'data' => $data,
    'total' => $total_records,
    'page' => $page,
    'records_per_page' => $records_per_page
);

echo json_encode($response);
?>
