<?php
require("req/mysqli.php");
include("inc/header.html");
$lga = _int("lga");
$unit = _int("unit");
$ward = _int("ward");
$lgas = $cnx->query("SELECT * FROM `lga`");
$wards = $cnx->query("SELECT * FROM `ward` WHERE `lga_id`='{$lga}'");
?>
<div class="form-row">
    <form method="get" action="" class="form-inline">
        <select class="form-control custom-select" name="state" id="state">
            <option value="0">State</option>
        </select>
        <select class="form-control custom-select" name="lga" id="lga">
            <option value="0">L.G.A</option>
        </select>
        <select class="form-control custom-select" name="ward" id="ward">
            <option value="0">Ward</option>
        </select>
        <select class="form-control custom-select" name="unit" id="unit">
            <option value="0">Unit</option>
        </select>
        <button class="btn btn-primary" type="submit" id="submit">Search</button> 
    </form>
</div>
<div class="table-responsive">
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th scope="col">Unit n<u>o</u></th>
                <th scope="col">Unit name</th>
                <th scope="col">Unit description</th>
            </tr>
        </thead>
    </table>
</div>
<?php
include("inc/footer.html");
$cnx->close();
?>