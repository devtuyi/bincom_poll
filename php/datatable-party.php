<?php
require("../req/mysqli.php");
$lga = _int("lga");
$qt_i = $cnx->query("SELECT COUNT(*) as i FROM announced_lga_results WHERE lga_name='{$lga}'");
$i_qt = $qt_i->fetch_array();
$_i_qt = $i_qt[0];
$draw = _int("draw");
$start = _int("start");
$length = _int("length");
if($start < 1) {
    $start = 0;
}
if($start > $_i_qt) {
    $start = floor($_i_qt / $length) * $length;
}
$history = $cnx->query("SELECT party_abbreviation, party_score FROM announced_lga_results WHERE lga_name='{$lga}' ORDER BY result_id DESC LIMIT {$start}, {$length}");
$h_i = $history->num_rows;
echo "{\n\t\"draw\": {$draw},\n\t\"recordsTotal\": {$_i_qt},\n\t\"recordsFiltered\": {$_i_qt},\n\t\"data\":[";
if($h_i > 0) {
    while($row = $history->fetch_array()) {
        $h_i--;
        echo "\n\t\t{\"_party\": \"{$row[0]}\", \"_score\": \"{$row[1]}\"}" . ($h_i > 0 ? ',' : '');
    }
}
echo "\n\t]\n}";
?>