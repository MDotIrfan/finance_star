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
    <img src="<?= base_url('assets/img/logospq.jpg') ?>" class="mid" align="right">
    <table border="0" style="width: 30%" align="right">
        <tr>
            <td>
                <p style="text-align:right;">
                    <b>SpeeQual Sdn Bhd<br></b>
                    C12-2, Jalan Ampang Utama 1/1, <br>
                    Ampang Avenue, 68000 Ampang, <br>
                    Selangor, Malaysia. <br>
                    Phone : +60 342 660 087<br>
                    Email: <?php foreach ($user as $u) { ?>
                    <?= $u->email_Address ?>
                <?php } ?>
                </p>
            </td>
        </tr>

    </table>
    <table border=" 0" style="width: 100%">
        <tr>
            <td>
                <p class="bold" style="text-align:center; font-size:x-large">
                    INVOICE<br>
                    <?php foreach ($inv as $po) { ?>
                    <u>No. <?= $po->no_invoice; ?></u>

                </p>
            </td>
        </tr>
    </table>
    <table border="0" style="width: 100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td width="60%">
                <a class="bold">
                <?=$po->client_name;?><br>
                </a>
                <a><?=$po->address;?> <br><br>
                    Attn : <?=$po->client_name;?>

                </a>
            </td>
            <td width="40%"><?=$po->invoice_date;?><br><br><br><br><br></td>
        </tr>
    </table>
    <br>
    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        
        <tr>
            <td style="text-align:center; " class="bold" width="5%">No</td>
            <td width="35%" style="text-align:center; " class="bold" width="35%">Job Description</td>
            <td width="15%" style="text-align:center; " class="bold" width="15%">Qtt<br>Word</td>
            <td width="15%" style="text-align:center; " class="bold">Unit Price<br>(MYR)</td>
            <td width="20%" style="text-align:center; " class="bold">Amount<br>(MYR)</td>
        </tr>
        <?php $i=1; foreach ($pi as $pi) {?>
        <tr>
            <td style="text-align:center;height:60px" width="5%"><?= $i."." ?></td>
            <td width="35%" style="text-align:center;"><?= $pi->jobdesc ?></td>
            <td width="15%" style="text-align:center;"><?= $pi->qtt_word ?></td>
            <td width="15%" style="text-align:center;"><?= $pi->price ?></td>
            <td width="20%" style="text-align:center;"><?= $pi->amount ?></td>
        </tr>
        <?php $i++;} ?>
        <tr class="bold">
            <td style="text-align:center;" colspan="2">Grand Total</td>
            <td width="35%" style="text-align:center;" colspan="2">Please Pay</td>
            <td style="text-align:center;" colspan="1"> <?= $po->grand_total; ?></td>
        </tr>
    </table>
    <br>
    <table border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p class="">
                    Payment: within <?php
                    $date1=date_create($po->invoice_date);
                    $date2=date_create($po->due_date);
                    $date=date_diff($date1,$date2); 
                    echo $date->format("%a days");
                    ?> after receiving the invoice <br>
                </p>
            </td>
        </tr>
    </table>
    <table rules="none" border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p>
                    Payment method :<br>
                    Account Name : <b>Speequal Sdn Bhd</b><br>
                    MYR Account No : <b><?=$po->account; ?></b><br>
                    Bank Name : <b>UOB (United Overseas Bank) Bhd</b><br>
                    Address : <b>Head Office Menara UOB,</b><br>
                    <b>Jalan Raja Laut, PO BOX 11212,<br>
                        50738, Kuala Lumpur-Malaysia,<br></b>
                    Swift Code : <b><?=$po->swift_code; ?></b><br><br>
                    <b>or paypal :</b><br>
                    Full Name : <b>PT Bintang Panca Tridasa</b><br>
                    Paypal Account : financedept@bintang35.net

                </p>
            </td>
            <td>
                <p class="bold">
                    Speequal Sdn Bhd<br>

                    <br>
                    <br>
                    <br><br>
                    <br><br>
                    <?php foreach ($user as $u) { ?>
                    <?= $u->full_Name ?>
                <?php } ?>
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