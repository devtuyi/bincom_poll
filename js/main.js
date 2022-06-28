$(document).ready(function() {
    $.get("./php/states.php").done(function(data) {
            $("#state").html(data);
        });
    $("#state").change(function(){
        $.get("./php/lgas.php?state="+$('option:selected', this).val()).done(function(data) {
            $("#lga").html(data);
            $("#ward").html("<option value=\"0\">Ward</option>");
            $("#unit").html("<option value=\"0\">Unit</option>");
            $("#datatable").DataTable().clear().destroy();
        });
    });
    $("#lga").change(function(){
        $.get("./php/wards.php?lga="+$('option:selected', this).val()).done(function(data) {
            $("#ward").html(data);
            $("#unit").html("<option value=\"0\">Unit</option>");
            loadData();
        });
    });
    $("#ward").change(function(){
        $.get("./php/units.php?ward="+$('option:selected', this).val()).done(function(data) {
            $("#unit").html(data);
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
                url: "./php/datatable.php",
                type: "GET",
                data: {
                    "lga": $("#lga").find(":selected").val(),
                    "ward": $("#ward").find(":selected").val(),
                    "unit": $("#unit").find(":selected").val()
                },
                dataType: "json"
            },
            "columns": [
                { data: "_id", searchable: false },
                { data: "_name", searchable: false },
                { data: "_desc", searchable: false }
            ]
        });
    }
});