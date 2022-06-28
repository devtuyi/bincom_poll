<?php
require("../req/mysqli.php");
$id = _int("state");
$data = "<option value=\"0\">L.G.A</option>";
$row = $cnx->query("SELECT * FROM lga WHERE state_id='{$id}'");
?>
<?php
while($rows = $row->fetch_assoc()) {
    $data .= "\n<option value=\"{$rows['lga_id']}\">{$rows['lga_name']}</option>";
}
echo $data;
?>
