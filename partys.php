<?php
require("../req/mysqli.php");
$obj = array();
$row = $cnx->query("SELECT * FROM party");
?>
<?php
while($rows = $row->fetch_assoc()) {
    $obj[] = array(
                "name" => $rows["party_name"],
                "id" => $rows["party_id"]
            );
}
echo json_encode($obj);
?>
