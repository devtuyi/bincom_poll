<?php
require("../req/mysqli.php");
$id = _int("ward");
$data = "<option value=\"0\">Unit</option>";
$row = $cnx->query("SELECT * FROM polling_unit WHERE ward_id='{$id}'");
?>
<?php
while($rows = $row->fetch_assoc()) {
    $data .= "<option value=\"{$rows['polling_unit_id']}\">{$rows['polling_unit_name']}</option>";
}
echo $data;
?>
