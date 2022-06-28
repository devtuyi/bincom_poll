<?php
require("../req/mysqli.php");
$data = "<option value=\"0\">State</option>";
$row = $cnx->query("SELECT * FROM states");
?>
<?php
while($rows = $row->fetch_assoc()) {
    $data .= "\n<option value=\"{$rows['state_id']}\">{$rows['state_name']}</option>";
}
echo $data;
?>
