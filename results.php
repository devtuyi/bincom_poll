<?php
require("req/mysqli.php");
include("inc/header.html");
?>
<div class="form-row">
    <form method="get" action="" class="form-inline">
        <select class="form-control custom-select" name="state" id="state">
            <option value="0">State</option>
        </select>
        <select class="form-control custom-select" name="lga" id="lga">
            <option value="0">L.G.A</option>
        </select>
        <button class="btn btn-primary" type="submit" id="submit">Search</button> 
    </form>
</div>
<div class="table-responsive">
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th scope="col">L.G.A</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
    </table>
</div>
<?php
include("inc/footer.html");
?>
<script src="./js/main-result.js"></script>
