$(document).ready(function() {
    var DOMAIN = "http://localhost/DMS/backend/";

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
                var n = 0;
                $(".number").each(function() {
                    $(this).html(++n);
                })

            }
        })
    }
    $("#remove").click(function() {
        $("#invoice_item").children("tr:last").remove();
        calculate(0, 0);
    })

    /*get Value according to select*/
    $("#invoice_item").delegate(".pid", "change", function() {
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        $(".overlay").show();
        $.ajax({
            url: DOMAIN + "/new_order_ajax_process.php",
            method: "POST",
            dataType: "json",
            data: { getPriceAndQty: 1, id: pid },
            success: function(data) {
                tr.find(".qty").val(1);
                tr.find(".test_name").val(data["test_name"]);
                tr.find(".price").val(data["test_price"]);
                tr.find(".amt").html(tr.find(".qty").val() * tr.find(".price").val());
                calculate(0, 0);
            }
        })

    })

    function calculate(dis, paid) {
        var sub_total = 0;
        var vat = 0;
        var net_total = 0;
        var discount = dis;
        var paid_amt = paid;
        var due = 0;

        $(".amt").each(function() {
                sub_total = sub_total + ($(this).html() * 1);
            })
            //VAT IS 15%
        vat = 0.15 * sub_total;
        //calculate net _ total
        net_total = vat + sub_total;
        net_total = net_total - discount;
        due = net_total - paid_amt;

        $("#sub_total").val(sub_total);
        $("#vat").val(vat);
        $("#discount").val(discount);
        $("#net_total").val(net_total);
        // $("#")
        $("#due").val(due);

    }
    //Discount function
    $("#discount").keyup(function() {
            var discount = $(this).val();
            calculate(discount, 0);

        })
        //Paid Functtion
    $("#paid").keyup(function() {
            var paid = $(this).val();
            var discount = $("#discount").val();
            calculate(discount, paid);

        })
        /**Order processing and save */
    $("#order_form").click(function() {
        var invoice = $("#get_order_data").serialize();
        if ($("#customer_id").val() === "") {
            alert("Please Enter Customer Number");
        } else if ($("#paid").val() === "") {
            alert("Please Enter the Paid Amount");
        } else {
            $.ajax({
                url: DOMAIN + "/new_order_ajax_process.php",
                method: "POST",
                data: $("#get_order_data").serialize(),
                success: function(data) {
                    if (data > 0) {
                    alert(data);
                   } else {
                         $("#get_order_data").trigger("reset");

                       if (confirm("Do u want to print invoice ?")) {
                             window.location.href = DOMAIN + "/all_invoice/pathology_invoice.php?invoice_no=" + data + "&" + invoice;
                        }
                     }


                }
            });
        }

    });

});