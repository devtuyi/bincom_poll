<?php
require("../req/mysqli.php");
$lga = _int("lga");

$qt_i = $cnx->query("SELECT COUNT(*) as i FROM polling_unit WHERE lga_id='{$lga}' GROUP BY(ward_id)");
$_i_qt = 0;
while($row = $qt_i->fetch_array()) {
$_i_qt++;
}
$draw = _int("draw");
$start = _int("start");
$length = _int("length");
if($start < 1) {
    $start = 0;
}
if($start > $_i_qt) {
    $start = floor($_i_qt / $length) * $length;
}
$history = $cnx->query("SELECT COUNT(ward_id), ward_id FROM polling_unit WHERE lga_id='{$lga}' GROUP BY(ward_id) ORDER BY uniqueid DESC LIMIT {$start}, {$length}");
$h_i = $history->num_rows;
echo "{\n\t\"draw\": {$draw},\n\t\"recordsTotal\": {$_i_qt},\n\t\"recordsFiltered\": {$_i_qt},\n\t\"data\":[";
if($h_i > 0) {
    while($row = $history->fetch_array()) {
        $h_i--;
        $ward = $cnx->query("SELECT ward_name FROM ward WHERE ward_id='{$row[1]}'");
        $_ward = $ward->fetch_array();
        echo "\n\t\t{\"_ward\": \"{$_ward[0]}\", \"_total\": \"{$row[0]}\"}" . ($h_i > 0 ? ',' : '');
    }
}
echo "\n\t]\n}";
?>