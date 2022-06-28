<?php
$cnx = new mysqli("localhost", "id15805779_test", "w}PQeXGb9>]Eej}&", "id15805779_bincom");
if($cnx->connect_errno) {
    die("Error connecting to database!");
}

function _int($key) {
    return isset($_GET[$key]) ? intval($_GET[$key]) : 0;
}
?>