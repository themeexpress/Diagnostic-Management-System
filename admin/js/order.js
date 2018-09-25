$(document).ready(function() {
    var DOMAIN = "http://localhost/Diagnostic-Management-System/admin/";

    /*Add row with dynamic ajax*/
    addNewRow();
    $("#add").click(function() {
        addNewRow();
    })

    function addNewRow() {
        $.ajax({
            url: DOMAIN + "/new_order_ajax_process.php",
            method: "POST",
            data: { getNewOrderItem: 1 },
            success: function(data) {
                $("#invoice_item").append(data);

            }
        })
    }


});