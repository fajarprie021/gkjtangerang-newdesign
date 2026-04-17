<?php
$mysqli = new mysqli('localhost', 'gkjtangerang_290897', 'gkjt_290897', 'gkjtangerang_2024');
$res = $mysqli->query("SELECT * FROM tbl_sub_menu_admin");
if(!$res) die($mysqli->error);
while($row = $res->fetch_assoc()){
    print_r($row);
}
