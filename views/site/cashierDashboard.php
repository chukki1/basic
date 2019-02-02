<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'CashierDashboard';
$this->params['breadcrumbs'][] = $this->title;

// print_r(Url::base(true));die;
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
            integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
            crossorigin="anonymous"></script>
</head>
<body>
<style>
    article {
        float: right;
        padding: 5px;
        width: 30%;

        height: 300px; /* only for demonstration, should be removed */
    }

    .button4 {
        float: left;
        border-radius: 8px;
        font-size: 15px;
        width: 240px;
        background-color: #2e8b57;
        padding: 10px 10px 5px 5px;
    }

    .button5 {
        float: left;
        border-radius: 8px;
        font-size: 14px;
        width: 100px;
        background-color: #2e8b57;
        padding: 10px 10px 5px 5px;
    }


</style>
<h2>Invoice</h2>
<div class="body-content">


    <div class="row">

        <div class="col-lg-12">

            <form>
                <div class="form-row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="Date" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="Time" value="<?php echo time(" "); ?>">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="Customer_Id" placeholder="Customer Id">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="Cashier_Id" placeholder="Cashier Id">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="bar" id="tableToPrint">
                <table id="myTable" class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
        <br><br><br>
        <article>
            <div class="col-md-12">
                <form>


                    <div class>Net Amount:
                        <input type="text" id="netAmount" class="form-control">
                    </div>
                    <br>
                    <div class>No Of Items:
                        <input type="text" id="nOfItem" class="form-control">
                    </div>
                    <br>

                    <div class>Paid:
                        <input type="text" id="Paid" onkeyup="balanceCalculate()" class="form-control">
                    </div>
                    <br>
                    <div class>Balance:
                        <input type="text" id="Balance" class="form-control">
                    </div>
                    <br>


                </form>

            </div>
        </article>
    </div>


    <div class="row">
        <div class="col-lg-9">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <div class="form-row">
                <div class="col-lg-3">Item Name:

                    <select id="mySelect" onchange="myFunction()" input type="text" class="form-control">
                        <option value="" disabled selected>Select your option</option>
                        <? foreach ($list as $product): ?>
                            <option value="<?= $product['Id'] ?>"><?= $product['Name'] ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-2"> Unit Price:<input id="sub" type=text class="form-control"></div>
            </div>

            <div class="form-row">
                <div class="col-lg-2"> Quantity<input type="text" id="quantity" class="form-control"
                                                      onkeyup="quantityPrice()"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-2">Discount<input type="text" id="discount" class="form-control"
                                                     onkeyup="discountPrice()"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-2">Total<input type="text" id="total" class="form-control"></div>
            </div>


            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-8">
                <button class="button button4" type="button" onclick="saveFunction()">Add
                </button>
                <button class="button button4" type="button" onclick="removeFunction()">Remove</button>
                <button class="button button4" onclick="clearFunction()">Save & Print</button>
            </div>


            <div class="col-sm-4">
                <button class="button button5">Vouchers</button>
                <button class="button button5">Credit</button>
                <button class="button button5">Save & print</button>


            </div>
        </div>


    </div>
</body>
</html>


<script>

    function myFunction() {
        var x = document.getElementById("mySelect").value;
        //alert(x)
        $.ajax({
            type: "POST",
            url: "site/add",  //site/add
            data: {'id': x},

            success: function (data) {
                console.log(data)
                document.getElementById("sub").value = data;
                document.getElementById("total").value = "";
                document.getElementById("discount").value = "";
                document.getElementById("quantity").value = "";


                // document.getElementById("div").innerHtml = "<tr><td>name</td></tr>";
                //total =total + ptotal
            }
        });

    }

    function saveFunction() {
        // alert("hit");
        var x = document.getElementById("mySelect").value;
        var quantity = document.getElementById("quantity").value;
        var discount = document.getElementById("discount").value;
        var total = document.getElementById("total").value;
        var tblBody = "";
        var totalPrice = 0;
        var nOfItem;
        console.log(x)
        console.log(quantity)
        console.log(discount)
        console.log(total)
        $.ajax({
            type: "POST",
            url: "site/save",  //site/add
            data: {'id': x, 'quantity': quantity, 'discount': discount, 'total': total},

            success: function (data) {

                var data1 = JSON.parse(data);
                console.log(data1)
                nOfItem = data1.length
                data1.forEach(function (item) {
                    // console.log(item.Id)
                    totalPrice += parseInt(item.Total)
                    tblBody += '<tr><td></td><td>' + item.Id + '</td><td>' + item.Discount + '</td><td>' + item.quantity + '</td><td>' + item.Name + '</td><td>' + item.Total + '</td></tr>'
                });


                $('#myTable tbody').html(tblBody);
                document.getElementById("netAmount").value = totalPrice;
                document.getElementById("nOfItem").value = nOfItem;
                //total =total + ptotal
            },
            error: function (error) {
                console.log(error)
            },
            statusCode: {}
        });

    }

    function removeFunction() {
        var totalPrice = 0;
        var tblBody = "";
        $.ajax({
            type: "POST",
            url: "site/remove",  //site/add
            data: {},

            success: function (data) {

                var data1 = JSON.parse(data);
                console.log(data1)
                nOfItem = data1.length
                data1.forEach(function (item) {
                    // console.log(item.Id)
                    totalPrice += parseInt(item.Total)
                    tblBody += '<tr><td></td><td>' + item.Id + '</td><td>' + item.Discount + '</td><td>' + item.quantity + '</td><td>' + item.Name + '</td><td>' + item.Total + '</td></tr>'
                });


                $('#myTable tbody').html(tblBody);
                document.getElementById("netAmount").value = totalPrice;
                document.getElementById("nOfItem").value = nOfItem;
                //total =total + ptotal
            },
            error: function (error) {
                console.log(error)
            },
            statusCode: {}
        });
    }

    function clearFunction() {
        let Cashier_Id = document.getElementById("Cashier_Id").value;
        let Customer_Id = document.getElementById("Customer_Id").value;
        let Net_Total = document.getElementById("netAmount").value;
        let No_Of_Items = document.getElementById("nOfItem").value;
        let Paid = document.getElementById("Paid").value;
        let Balance = document.getElementById("Balance").value;
        autoRefresh = false;
        $.ajax({
            type: "POST",
            url: "site/clear",
            data: {
                'Cashier_Id': Customer_Id,
                'Customer_Id': Cashier_Id,
                'Net_Total': Net_Total,
                'No_Of_Items': No_Of_Items,
                'Paid': Paid,
                'Balance': Balance
            },

            success: function (data) {
                var data1 = JSON.parse(data);

                if (data1.success) {
                    // print
                    let doc = new jsPDF();
                    let elementHandler = {
                        '#tableToPrint': function (element, renderer) {
                            return true;
                        }
                    };
                    let source = window.document.getElementById("tableToPrint");
                    doc.fromHTML(
                        source,
                        15,
                        15,
                        {
                            'width': 180, 'elementHandlers': elementHandler
                        });

                    doc.output("dataurlnewwindow");

                    // // set data
                    // nOfItem = data1.length
                    // data1.forEach(function (item) {
                    //     // console.log(item.Id)
                    //     totalPrice += parseInt(item.Total)
                    //     tblBody += '<tr><td></td><td>' + item.Id + '</td><td>' + item.Discount + '</td><td>' + item.quantity + '</td><td>' + item.Name + '</td><td>' + item.Total + '</td></tr>'
                    // });
                    //
                    //
                    // $('#myTable tbody').html(tblBody);
                    // document.getElementById("netAmount").value = totalPrice;
                    // document.getElementById("nOfItem").value = nOfItem;
                }
                console.log(data1)


            },
            error: function (error) {
                console.log(error)
                autoRefresh = true;
            },
            statusCode: {}
        });
    }

    let autoRefresh = true;

    function refreshData() {
        let tblBody = "";
        let totalPrice = 0;
        let nOfItem;
        $.ajax({
            type: "POST",
            url: "site/refresh",
            data: {},
            success: function (data) {
                if (autoRefresh) {
                    let data1 = JSON.parse(data);
                    console.log(data1)
                    nOfItem = data1.length
                    data1.forEach(function (item) {
                        totalPrice += parseInt(item.Total)
                        tblBody += '<tr><td></td><td>' + item.Id + '</td><td>' + item.Discount + '</td><td>' + item.quantity + '</td><td>' + item.Name + '</td><td>' + item.Total + '</td></tr>'
                    });
                    $('#myTable tbody').html(tblBody);
                    document.getElementById("netAmount").value = totalPrice;
                    document.getElementById("nOfItem").value = nOfItem;
                }
            },
            error: function (error) {
                console.log(error)
            },
            statusCode: {}
        });
    }

    $(document).ready(function () {
        setInterval(refreshData, 2000);
    });

    function quantityPrice() {
        var quantity = document.getElementById("quantity").value;
        var unitprice = document.getElementById("sub").value;

        document.getElementById("total").value = quantity * unitprice;
        var x = quantity * unitprice;

    }

    function discountPrice() {
        var quantity = document.getElementById("quantity").value;
        var unitprice = document.getElementById("sub").value;

        var mul = quantity * unitprice;
        var discount = document.getElementById("discount").value;
        var total = document.getElementById("total").value;

        document.getElementById("total").value = mul - discount;


    }

    function balanceCalculate() {
        let netAmount = document.getElementById('netAmount').value;
        let paid = document.getElementById('Paid').value;
        document.getElementById('Balance').value = paid - netAmount;
    }

    $("#paidInput").change(function () {
        alert("The text has been changed.");
    });
</script>
