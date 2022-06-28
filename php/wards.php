<?php
require("../req/mysqli.php");
$id = _int("lga");
$data = "<option value=\"0\">Ward</option>";
$row = $cnx->query("SELECT * FROM ward WHERE lga_id='{$id}'");
?>
<?php
while($rows = $row->fetch_assoc()) {
    $data .= "<option value=\"{$rows['ward_id']}\">{$rows['ward_name']}</option>";
}
echo $data;
?>
