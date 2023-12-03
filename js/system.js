const btn_employees = document.getElementById("employees");
const btn_inventory = document.getElementById("inventory");
const btn_client = document.getElementById("client");
const btn_sales = document.getElementById("sales");

$(document).ready(function(){
    fill_table_empl()

    btn_employees.addEventListener("click", function() {
        $("#modal-empl").modal("show");
        start_datatable();
    });

    btn_inventory.addEventListener("click", function () {
        alert("inv_js");
    });

    btn_client.addEventListener("click", function () {
        alert("client_js");
    });

    btn_sales.addEventListener("click", function () {
        alert("sales_js");
    });
});