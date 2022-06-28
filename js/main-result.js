$(document).ready(function() {
    $.get("./php/states.php").done(function(data) {
            $("#state").html(data);
        });
    $("#state").change(function(){
        $.get("./php/lgas.php?state="+$('option:selected', this).val()).done(function(data) {
            $("#lga").html(data);
            $("#datatable").DataTable().clear().destroy();
        });
    });
    $("#lga").change(function(){
        $.get("./php/wards.php?lga="+$('option:selected', this).val()).done(function(data) {
            loadData();
        });
    });
    $("#submit").click(function(e){
        e.preventDefault();
        loadData();
    });
    function loadData() {
        $("#datatable").DataTable().clear().destroy();
        $("#datatable").DataTable({
            processing: true,
            searching: false,
            ordering: false,
            lengthChange: true,
            paging: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            responsive: false,
            serverSide: true,
            ajax: {
                url: "./php/datatable-result.php",
                type: "GET",
                data: {
                    "lga": $("#lga").find(":selected").val()
                },
                dataType: "json"
            },
            "columns": [
                { data: "_ward", searchable: false },
                { data: "_total", searchable: false }
            ]
        });
    }
});