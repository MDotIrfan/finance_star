<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .bold {
            font-weight: bold;
        }

        body {
            font-size: 12px;
        }

        .center {
            height: 60px;
            width: 200px;
        }

        .centerr {
            height: 30px;
            width: 200px;
        }

        .mid {
            height: 100px;
            width: 600px;
        }

        .midd {
            height: 50px;
            width: 600px;
        }
    </style>
</head>

<body>
    <table border="1" style="width: 30%" align="right" cellspacing="0" cellpadding="0">
        <?php foreach ($inv as $po) { ?>
            <tr style="text-align:center;">
                <td>
                    Invoice Date
                </td>
                <td>
                    <?= $po->invoice_date ?>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td>
                    Invoice Due
                </td>
                <td>
                    <?= $po->due_date ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <table border="0" style="width: 100%" align="center">
        <tr>
            <td>
                <p style="text-align:center; font-size:x-large">
                    <b><u>INVOICE</u></b><br>
                    <a style="font-size:small"><?= $po->invoice_date ?></a>
                </p>


            </td>
        </tr>
    </table>
    <table border="0" style="width:100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0" align="left">
    <?php foreach ($a as $a) { ?>
        <tr>
            <td width="10%"></td>
            <td width="45%">
                <a style="color: darkgrey;">From :</a><br><br>
                <a> <b><?= $po->mitra_name ?></b><br><br>
                    <?= $po->address ?>n<br><br>
                    <?= $a->mobile_Phone ?><br>
                    <?= $a->resource_Email ?>
                </a>
            </td>

            <td width="45%" style="text-align:left;">
                <a style="color: darkgrey;">Bill to :</a><br><br>
                
                <a> <b>Project Manager</b><br><br>
                <?= $a->nama_Pm ?><br>      
                    St. Kenanga No. 126B, Sinduadi, Mlati, Sleman, Yogyakarta 55284<br><br>
                    0895 36355 8879<br>
                    <?= $a->email_pm ?>
                </a>
                <?php } ?>
            </td>

        </tr>
        <!-- <?php foreach ($a as $a) { ?>
            <tr>
                <td width="10%"></td>
                <td width="45%">
                    <a style="color: darkgrey;">From :</a><br><br>
                    <a> <b><?= $po->mitra_name ?></b><br><br>
                        <?= $po->address ?><br>
                        Pangandaran, Pangandaran<br><br>
                        <?= $a->mobile_Phone ?><br>
                        <?= $a->resource_Email ?>
                    </a>
                </td>

                <td width="45%" style="text-align:left;">
                    <a style="color: darkgrey;">Bill to :</a><br><br>

                    <a> <b>Project Manager</b><br><br>
                        <?= $a->nama_Pm ?><br>
                        St. Kenanga No. 126B, Sinduadi, Mlati, Sleman, Yogyakarta 55284<br><br>
                        0895 36355 8879<br>
                        <?= $a->email_pm ?>
                    </a>
                <?php } ?>
                </td>

            </tr> -->
    </table>
    <br>
    <div style="margin-top: 200px;">
        <table border="0" style="width: 100%;" cellspacing="0" cellpadding="0">
            <tr style="background: #7afa7a" class="bold">
                <td style="text-align:center; " class="centerr" width="30%">Item</td>
                <td width="" style="text-align:center; " class="bold">QTY</td>
                <td width="" style="text-align:center; " class="bold">Rate</td>
                <td width="" style="text-align:center; " class="bold">Tax</td>
                <td width="40%" style="text-align:center; " class="bold">Sub Total</td>
            </tr>
            <?php foreach ($pi as $p) { ?>
                <tr class="midd">
                    <td style="text-align:center; " width="" class="bold"><?= $p->jobdesc ?></td>
                    <td width="" style="text-align:center; "><?= $p->qty ?></td>
                    <td width="" style="text-align:center; "><?php if($po->currency_inv=='IDR'){
                echo 'IDR '.number_format($p->rate,2,",",".");
            } else if($po->currency_inv=='USD'){
                echo 'USD '.number_format($p->rate,2,".",",");
            } else if($po->currency_inv=='EUR'){
                echo 'EUR '.number_format($p->rate,2,".",",");
            } ?></td>
                    <td width="" style="text-align:center; ">-</td>
                    <td width="" style="text-align:center; "><?php if($po->currency_inv=='IDR'){
                echo 'IDR '.number_format($p->amount,2,",",".");
            } else if($po->currency_inv=='USD'){
                echo 'USD '.number_format($p->amount,2,".",",");
            } else if($po->currency_inv=='EUR'){
                echo 'EUR '.number_format($p->amount,2,".",",");
            } ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <hr>
    <div style="margin-top: 50px;">
        <table border="0" style="width: 40%" class="table" cellspacing="0" cellpadding="0" align="right">


            <tr style="background: #7afa7a" class="centerr">
                <td style="text-align:center; " class="centerr" width="30%">Invoice Summary</td>
            </tr>
            <tr class="centerr">
                <td style="text-align:left; " class="centerr" width="30%">Sub Total&emsp;&emsp;&emsp;&emsp;&emsp;<?php if($po->currency_inv=='IDR'){
                echo 'IDR '.number_format($po->total_cost,2,",",".");
            } else if($po->currency_inv=='USD'){
                echo 'USD '.number_format($po->total_cost,2,".",",");
            } else if($po->currency_inv=='EUR'){
                echo 'EUR '.number_format($po->total_cost,2,".",",");
            } ?>
                </td>
            </tr>
            <tr class="centerr" ">
            <td style=" text-align:left; " class=" centerr; bold" width="30%">Total&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<?php if($po->currency_inv=='IDR'){
                echo 'IDR '.number_format($po->grand_total,2,",",".");
            } else if($po->currency_inv=='USD'){
                echo 'USD '.number_format($po->grand_total,2,".",",");
            } else if($po->currency_inv=='EUR'){
                echo 'EUR '.number_format($po->grand_total,2,".",",");
            } ?>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table border="0" style="width: 100%; margin-bottom: 25px;" class="table" cellspacing="0" cellpadding="0">
            <tr class="centerr">
                <td width=5%></td>
                <td>Please send your payment to:<br>
                    &ensp;Name : <?= $po->mitra_name ?><br>
                    &ensp;Bank : <?= $po->cabang_bank ?><br>
                    &ensp;Account number : <?= $po->no_rekening ?></td>
            </tr>

        </table>
        <div style="margin-top: 80px;">
            <table border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0" align="center">


                <tr>
                    <td style="text-align: center; font-size:large" class="bold">Thank you for your cooperation.</td>
                </tr>

            </table>

        </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>