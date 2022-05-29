<?php 
use Dompdf\Dompdf;
$pdf = new DOMPDF();

$ntw = new \NTWIndia\NTWIndia();

$fs_invoice_logo_path = 'assets/dist/img/logo/logo.png';
$fs_invoice_logo_type = pathinfo($fs_invoice_logo_path, PATHINFO_EXTENSION);
$fs_invoice_logo_data = file_get_contents($fs_invoice_logo_path);
$fs_invoice_logo_base64 = 'data:image/' . $fs_invoice_logo_type . ';base64,' . base64_encode($fs_invoice_logo_data);

$test_ntw = $ntw->numToWord(2250);
$html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <style type="text/css">
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto";
        }

        .container-fluid {
            width: 100%;
        }

        .w-100 {
            width: 100%;
        }

        .border-main-div {
            width: 100%;
            padding: 15px 0;
            border: 1px solid #000000;
        }

        .table {
            width: 100%;
        }

        .fs-invoice-logo-td {
            width: 20%;
        }

        .fs-quinpro-address-td {
            width: 50%;
        }

        .fs-hdr-comp-name {
            font-weight: bold;
            font-size: 20px;
        }

        .hdr-invoice-date-div {
            font-weight: 400;
            font-size: 15px;
            text-align: right;
        }

        .fs-hdr-comp-address {
            font-size: 15px;
        }

        .border-top {
            border-top: 1px solid #000000;
        }

        .fs-invoice-logo-td img {
            width: 100%;
        }

        .row::after {
            content: "";
            clear: both;
        }

        .w-50 {
            width: 50%;
            float: left;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .border-right {
            border-right: 1px solid #000000;
        }

        .invoice-details {
            width: 100%;
            font-size: 15px;
        }

        .pt-0 {
            padding-top: 0px;
        }

        .pb-0 {
            padding-bottom: 0px;
        }

        .bill-to-hdr {
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            background: #cbcbcb;
        }

        .bill-to-txt {
            padding-left: 5px;
            font-weight: bold;  
            color: #272727;
            font-size: 15px;
        }

        .client-address-div {
            width: 100%;
            padding: 10px 0 15px 5px;
        }

        .client-hdr-comp-name {
            font-weight: bold;
            font-size: 15px;
        }

        .client-hdr-comp-address {
            font-size: 15px;
            width: 40%;
        }

        .invoice-details tr td {
            padding-left: 5px;
        }

        .purchased-package-service-details-div {
            margin-top: 15px;
            padding-left: 5px;
        }

        .purchased-package-service-name {
            font-weight: bold;
            margin-top: 15px;
        }

        .purchased-package-components-table {
            width: 98.5%;
            border-collapse: collapse;
        }

        .purchased-package-components-table,
        .purchased-package-components-table td,
        .purchased-package-components-table th {
            border: 1px solid;
        }

        .purchased-package-components-table thead th {
            text-align: left;
        }

        .total-amt-in-words-div {
            margin-top: 20px;
            padding-left: 5px;
            font-size: 15px;
        }

        .total-amt-in-words {
            font-weight: bold;
            font-style: italic;
        }

        .declaration-div {
            width: 92%;
            margin: auto;
            border: 1px solid #000000;
            padding-left: 5px;
            font-size: 15px;
            padding: 7px 5px;
        }

        .show-total-sub-total-and-grand-total-table tr {
            width: 98.5%;
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
        }

        .text-right {
            text-align: right
        }

        .grand-total-div {
            font-size: 17px;
        }

        .no-spacing-table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .text-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="border-main-div">
        <div class="container-fluid">
            <table class="table">
                <tr>
                    <td class="fs-invoice-logo-td">
                        <img src="'.$fs_invoice_logo_base64.'">
                    </td>
                    <td class="fs-quinpro-address-td">
                        <div class="fs-hdr-comp-name">Hello Network Service Pvt Ltd</div>
                    </td>
                    <td class="hdr-tax-invoice-main-td">
                        <div class="hdr-invoice-date-div">Date:  2022-05-29 14:23:33</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="border-top"></div>
        <div class="container-fluid">
            <table class="table no-spacing invoice-details" cellspacing="0">
                <tr>
                    <td>
                        From,<br>
                        <span class="text-bold">Hello Network,</span><br>
                        1135/14, BRB Complex Hanumanbari, Vansda, Navsari, Gujarat - 396580<br>
                        <span class="text-bold">Phone:</span> 9537252564<br>
                        <span class="text-bold">Email:</span> hellonetworkservice@gmail.com
                    </td>
                    <td>
                        To,<br>
                        <span class="text-bold">vanarasigp,</span><br>
                        1 Gram Panchayat Vanarasi, At Post Vanarasi Ta Vansda Dist Navsari<br>
                        <span class="text-bold">Phone:</span> 6355650407<br>
                        <span class="text-bold">Email:</span> shaileshpatel066@gmail.com
                    </td>
                    <td>
                        <span class="text-bold">User ID:</span> #10995<br>
                        <span class="text-bold">Due Date:</span> 2022-05-29<br>
                        <span class="text-bold">Bank Name:</span> HDFC Bank<br>
                        <span class="text-bold">Account Name:</span> : HELLO NETWORK SERVICE PVT LTD<br>
                        <span class="text-bold">Account Number:</span> 50200057405255<br>
                        <span class="text-bold">IFSC Code:</span> HDFC0003398<br>
                        <span class="text-bold">GSTIN:</span> 24AAFCH7013Q1ZC<br>
                    </td>
                </tr>
            </table>
        </div>
        <div class="container-fluid purchased-package-service-details-div">
            <table class="purchased-package-components-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5086</td>
                        <td>30 Mbps (2022-04-30 to 2022-05-30)</td>
                        <td>588</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid row">
            <div class="w-50">
                <div class="total-amt-in-words-div">
                    Terms:
                </div>
            </div>
            <div class="w-50">
                <div class="total-amt-in-words-div">
                    Due Date:
                    <span class="text-bold">
                       2022-06-11
                    </span>
                </div>
            </div>
        </div>
        <div class="container-fluid row">
            <div class="w-50">
                <div class="declaration-div">
                    <div class="declaration-words">
                        Uptime will be 98% and service time will be 3-4 Days. Installation charges are non-refundable and property of <span class="text-bold">Hello Network</span>. Finance charge of 1.5% will be made on unpaid balances after 28 days.
                    </div>
                </div>
            </div>
            <div class="w-50">
                <table class="show-total-sub-total-and-grand-total-table w-100">
                    <tr>
                        <td colspan="2">
                            <div class="border-top"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Sub Total:</td>
                        <td class="text-right">₹588</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="border-top"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-bold">Amount Paid:</td>
                        <td class="text-right"><span class="text-bold">₹</span>588</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="border-top"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Total Due:</td>
                        <td class="text-right"><span class="text-bold">₹</span>0</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container-fluid">
            <table>
                <tbody>
                    <tr>
                        <td>Portal: <span class="text-bold">https://hellofibernet.in/</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>';
 
$pdf->loadHtml($html,'UTF-8');
$pdf->set_paper('a4', 'portrait');// or landscape
$pdf->render();
$output = $pdf->output();
$file_name = 'invoice.pdf';
file_put_contents('assets/uploads/purchased-package-invoice/'.$file_name, $output);
$pdf->stream("invoice.pdf", array("Attachment" => false));
// $pdf->stream("invoice.pdf");
exit(0);
?>