<?php
$mysqli = new mysqli('localhost', 'gkjtangerang_290897', 'gkjt_290897', 'gkjtangerang_2024');
if ($mysqli->connect_error) { die('Connect error('.$mysqli->connect_errno.')'); }

$tables = ['tbl_identitas_gereja', 'tbl_alamat_gereja', 'tbl_tlp_gereja', 'tbl_email_gereja', 'tbl_sosial_media'];
foreach($tables as $t) {
    echo "--- $t ---\n";
    $res = $mysqli->query("DESCRIBE $t");
    while($row = $res->fetch_assoc()){ echo $row['Field']." | ".$row['Type']."\n"; }
}
