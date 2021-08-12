<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        .mid {
            height: 40px;
            width: 600px;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/img/logospq.jpg') ?>" class="mid" align="right" style="height:150px">
    <br><br><br><br><br><br><br><br><br><br><br>
    <table border="0" style="width: 25%" align="right">
        <tr>
            <td>
                <p>
                    <b>SpeeQual Language Solutions <br>
                        QQ. PT. Star Software Indonesia<br></b>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA<br>
                    Phone :+62 21 25558965<br>
                    Email:  <?php foreach ($user as $u) { ?>
                    <?= $u->email_Address ?>
                <?php } ?>
                </p>
            </td>
        </tr>

    </table>
    <table border="0" style="width: 100%">
        <tr>
            <td>
                <p class="bold" style="text-align:center; font-size:x-large">
                    INVOICE
                </p>
            </td>
        </tr>
    </table>
    <table border="0" style="width: 60%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0">
        <tr width="90%">
            <td>
                <a class="bold">
                    <br>
                </a>
                <a><br>
                     <br>
                    <br>

                </a>
            </td>
            <td></td>
        </tr>
    </table>
    <table border="0" style="width:100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td width="55">
            <?php foreach ($inv as $po) { ?>
                <a class="bold">
                <?=$po->client_name;?> <br>
                </a>
                <a><?=$po->address;?> <br>

                </a>
            </td>
            <td width="45" style="text-align:left;">

                <a>Vendor ID : <b>016809/1012200</b></a><br>
                <a>Invoice date: <b><?=$po->invoice_date;?></b></a><br>
                <a>Invoice number: <b>No. <?=$po->no_invoice;?></b> </a>

            </td>

        </tr>
    </table>
    <table border="0" style="width:100%; margin-bottom: 5px;" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td width="55">
                <a class="bold">
                    Supplied services: <br>
                </a>
            </td>


        </tr>
    </table>

    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; " class="bold" width="5%">No</td>
            <td style="text-align:center; " class="bold" width="35%">Pre-invoice number</td>
            <td style="text-align:center; " class="bold" width="15%">Date of Delivery</td>
            <td width="35%" style="text-align:center; " class="bold"><?php if($po->currency_inv=='IDR'){
               echo 'Amount (IDR)';
            } else if($po->currency_inv=='USD'){
                echo 'Amount (USD)';
            } else if($po->currency_inv=='EUR'){
                echo 'Amount (EUR)';
            } ?></td>
        </tr>
        <?php $i=1; foreach ($pi as $pi) {?>
        <tr class="bold" style="height: 60px;">
            <td style="text-align:center;" width="5%"><?= $i."." ?></td>
            <td width="35%" style="text-align:center;"><?= $pi->pre_invoice ?></td>
            <td width="30%" style="text-align:center;"><?= $pi->date_deliv ?></td>
            <td width="30%" style="text-align:center;"><?php if($po->currency_inv=='IDR'&&$pi->amount!=''){
               echo number_format($pi->amount,2,",",".");
            } else if($po->currency_inv=='USD'&&$pi->amount!=''){
                echo number_format($pi->amount,2,".",",");
            } else if($po->currency_inv=='EUR'&&$pi->amount!=''){
                echo number_format($pi->amount,2,".",",");
            } ?></td>
        </tr>
        <?php $i++;} ?>
        <tr class="bold">
            <td style="text-align:center;" colspan="3">Total</td>
            <td width="35%" style="text-align:center;" colspan="1"><?php if($po->currency_inv=='IDR'&&$po->grand_total!=''){
                echo number_format($po->grand_total,2,",",".");
            } else if($po->currency_inv=='USD'&&$po->grand_total!=''){
                echo number_format($po->grand_total,2,".",",");
            } else if($po->currency_inv=='EUR'&&$po->grand_total!=''){
                echo number_format($po->grand_total,2,".",",");
            } ?></td>
        </tr>
    </table>
    <div style="width: 50%">Note : <?php echo $po->public_notes; ?></div>
    <br>
    <table border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p class="">
                    Net sum: <?php if($po->currency_inv=='IDR'&&$po->grand_total!=''){
                echo 'IDR '.number_format($po->grand_total,2,",",".");
            } else if($po->currency_inv=='USD'&&$po->grand_total!=''){
                echo 'USD '.number_format($po->grand_total,2,".",",");
            } else if($po->currency_inv=='EUR'&&$po->grand_total!=''){
                echo 'EUR '.number_format($po->grand_total,2,".",",");
            } ?><br>
                    VAT: 0
                </p>
            </td>
        </tr>
    </table>
    <div></div>
    <table border=" 0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td width="40%">
                <p>
                    <b>Total sum: <?php if($po->currency_inv=='IDR'&&$po->grand_total!=''){
                echo 'IDR '.number_format($po->grand_total,2,",",".");
            } else if($po->currency_inv=='USD'&&$po->grand_total!=''){
                echo 'USD '.number_format($po->grand_total,2,".",",");
            } else if($po->currency_inv=='EUR'&&$po->grand_total!=''){
                echo 'EUR '.number_format($po->grand_total,2,".",",");
            } ?></b> <br>

                </p>
            </td>
            <td width="60%">
                <p>
                    <b>Currency: <?= $po->currency_inv ?> </b> <br>
                </p>
            </td>
        </tr>
    </table>

    <table border=" 0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td>Payable <?php
                    $date1=date_create($po->invoice_date);
                    $date2=date_create($po->due_date);
                    $date=date_diff($date1,$date2); 
                    echo $date->format("%a days");
                    ?> net from invoice date.</td>
        </tr>
        <tr>
            <td width="40%">
                <p>
                    Beneficiary: <br>
                    Bank:<br><br>
                    Account number or IBAN: <br>
                    Swift Code/BIC:<br><br>
                    Paypal<br>
                    Full Name:<br>
                    Paypal Account :<br><br>
                    Signature of vendors:<br><br>
                    Date, Location:

                </p>
            </td>
            <td width="60%">
                <p class="bold">
                    PT Star Software Indonesia<br>
                    Permata Bank, Mid Plaza Branch <br><br>
                    <?=$po->account; ?> (USD Account)<br>
                    <?=$po->swift_code; ?> <br><br>
                    <br>
                    PT Bintang Panca Tridasa<br>
                    financedept@bintang‐35.net
                    <br><br>
                    <br><br>
                    <?=$po->invoice_date; ?>
                </p>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
<script type="text/javascript">
    window.print();
</script>

</html>