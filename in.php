<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
    @page {
        size: auto;
        margin: 0mm;
    }

    body {
        background: #eee;
        margin-top: 0;
        padding: 0;
    }

    .text-danger strong {
        color: #9f181c;
    }

    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        /* margin-top: 50px; */
        /* margin-bottom: 50px; */
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }

    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }

    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }

    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }

    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }

    .receipt-main thead th {
        color: #fff;
    }

    .receipt-right h5 {
        font-size: 18px;
        font-weight: bolder;
        margin: 0 0 5px 0;
        color: navy;
    }

    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }

    .receipt-right p i {
        text-align: center;
        width: 18px;
        
    }

    .receipt-main td {
        padding: 3px 8px !important;
    }

    .term td {
        padding: 0px 5px !important;
    }
    .term table {
         width: 100%;
    }
    .term thead th {
        font-size: 10px;
        font-weight: initial !important;
    }
    .bill p{
        padding: 0;
        margin: 0;
        color: #9f181c;
    }
    .term tbody td {
        font-size: 10px;
        font-weight: initial !important;
    }

    .receipt-main th {
        padding: 0px 10px !important;
    }

    .receipt-main td {
        font-size: 10px;
        font-weight: initial !important;
    }

    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }

    .receipt-main td h2 {
        font-size: 15px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }

    #container {
        background-color: #dcdcdc;
    }
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#InkPrint').click(function() {
            window.print();
        });
    });
    </script>
</head>

<body>




    <div class="col-md-12">
        <div class="row">

            <div class="receipt-main col-md-8">
                <div class="row align-items-center">
                    <!-- <div class="receipt-header"> -->

                    <div class="col-4 text-left">
                        <div class="receipt-right">
                            <h5>Address</h5>
                            <p>Changghurail, Maju, J.B. Pur</P>
                            <p>Howrah - 711410</P>
                            <p><b>Mobile :</b> +91 9830255838</p>
                            <p><b>Email :</b> info@btntechno.in</p>
                            <p><b>GSTIN :</b> 19CCDPSO725H1ZJ</p>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row align-items-end">
                            <div class="col-2">
                                <div class="receipt-left">
                                    <img class="img-responsive" alt="iamgurdeeposahan" src="photo/logo.jpg"
                                        style="width: 80px;">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="receipt-right">
                                    <h5>B.T.N TECHNO SOLUTION</h5>

                                    <p>Total IT And CCTV Solution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="receipt-right">
                            <h5>TAX INVOICE</h5>
                            <p>DATE :</p>
                            <p>INVOICE NO # <?php echo $btnbill ; ?></p>

                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <hr>

                <div class="row">
                    <!-- <div class="receipt-header receipt-header-mid"> -->
                    <div class="col-md-4 text-left">
                        <div class="receipt-right">
                            <h5>CUSTOMER</h5>
                            <p>Changghurail, Maju, J.B. Pur</P>
                            <p>Howrah - 711410</P>
                            <p><b>Mobile :</b> +91 9830255838</p>
                            <p><b>Email :</b> info@btntechno.in</p>
                            <p><b>GSTIN :</b> 19CCDPSO725H1ZJ</p>
                        </div>
                    </div>
                    

                    <!-- </div> -->
                </div>
                <hr>

                <div class ="bill">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-6">Description</th>
                                <th>HSN/SAC</th>
                                <th>Warranty</th>
                                <th>QTY</th>
                                <th>RATE</th>
                                <th>AMOUNT</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            <tr>
                                <td>Payment for August 2016</td>
                                <td>ABHDYU</td>
                                <td>12</td>
                                <td>2</td>
                                <td>600</td>
                                <td> 12,00/-</td>
                            </tr>
                            
                          
                            

                            <tr>
                                <td colspan="2">
                                    <p><b>Our Bank Details:</b></p>
                                    <p>BANK OF INDIA</p>
                                    <p><b>A/C No.</b> 428220110000112(CA)</p>
                                    <p><b>IFS CODE:</b> BKID0004282</p>
                                    <p><b>Branch</b> MAJU</p>
                                </td>

                                <td colspan="3" class="text-right">
                                    <p>
                                        <strong>Subtotal Amount: </strong>
                                    
                                    <p>
                                        <strong>CGST 9%: </strong>
                                    </p>
                                    <p>
                                        <strong>SGST 9%: </strong>
                                    </p>
                                    <p>
                                        <strong>Round Off: </strong>
                                    </p>
                                </td>

                                <td>
                                    <p>
                                        <strong> 65,500/-</strong>
                                    </p>
                                    <p>
                                        <strong> 500/-</strong>
                                    </p>
                                    <p>
                                        <strong> 1300/-</strong>
                                    </p>
                                    <p>
                                        <strong>9500/-</strong>
                                    </p>
                                </td>
                            </tr>


                            <tr>

                                <td colspan="5" class="text-right">
                                    <h2><strong>Total: </strong></h2>


                                <td class="text-left text-danger">
                                    <h2><strong> 31.566/-</strong></h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>




                <div class="row">

                    <table>
                        <tr>
                            <td class="col">

                                <div class="term">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>
                                                    * TERMS AND CONDITIONS
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Product received in good condition.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Warranty of all items are covered by the principles or by their
                                                    authorised service centeres. We don't have any legal or financial
                                                    liability for the same. Burn or physical damage case no warranty.
                                                </td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    Customer Acceptance (sign):
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </td>

                            <td class="col-6">
                                <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                            </td>

                            <td>
                                <div class="receipt-left">
                                    <h4>Stamp</h4>
                                </div>
                            </td>
                        </tr>



                    </table>


                </div>

            </div>
        </div>
    </div>
    <!-- <input type="button" onclick="printDiv('print-content')" value="print a div!"/> -->
    <a href="#" id="InkPrint">Print</a>





</body>


</html>