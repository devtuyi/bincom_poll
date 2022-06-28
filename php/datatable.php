<?php
require("../req/mysqli.php");
$lga = _int("lga");
$ward = _int("ward");
$unit = _int("unit");
$filter = "lga_id='{$lga}'";
if($ward > 0) {
    $filter .= " AND ward_id='{$ward}'";
}
if($unit > 0) {
    $filter .= " AND polling_unit_id='{$unit}'";
}

$qt_i = $cnx->query("SELECT COUNT(*) as i FROM polling_unit WHERE {$filter}");
$i_qt = $qt_i->fetch_assoc();
$_i_qt = $i_qt['i'];
$draw = _int("draw");
$start = _int("start");
$length = _int("length");
if($start < 1) {
    $start = 0;
}
if($start > $_i_qt) {
    $start = floor($_i_qt / $length) * $length;
}
$history = $cnx->query("SELECT polling_unit_number, polling_unit_name, polling_unit_description FROM polling_unit WHERE {$filter} ORDER BY uniqueid DESC LIMIT {$start}, {$length}");
$h_i = $history->num_rows;
echo "{\n\t\"draw\": {$draw},\n\t\"recordsTotal\": {$_i_qt},\n\t\"recordsFiltered\": {$_i_qt},\n\t\"data\":[";
if($h_i > 0) {
    while($row = $history->fetch_assoc()) {
        $h_i--;
    echo "\n\t\t{\"_id\": \"{$row['polling_unit_number']}\", \"_name\": \"{$row['polling_unit_name']}\", \"_desc\": \"{$row['polling_unit_description']}\"}" .($h_i > 0 ? ',' : '');
    }
}
echo "\n\t]\n}";
?>