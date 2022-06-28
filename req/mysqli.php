<?php
$cnx = new mysqli("localhost", "root", "", "bincom");
if($cnx->connect_errno) {
    die("Error connecting to database!");
}

function _int($key) {
    return isset($_GET[$key]) ? intval($_GET[$key]) : 0;
}
?>