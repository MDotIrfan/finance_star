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

        .centerr {
            height: 20px;
            width: 200px;
        }

        .mid {
            height: 150px;
            width: 150px;
        }
    </style>
</head>

<body>

    <table border="0" style="width:100%;" class="table" cellspacing="0" cellpadding="0">


        <tr style="text-align:right;">
            <td width=" 40%">
                Citylofts Sudirman, Unit 1512<br>
                Jl. K.H. Mas Mansyur No.121<br>
                Jakarta 10220,<br>
                Indonesia<br>
                +(62-21) 2991-8933<br>
                +(62-21) 2555-8767<br>
                info@kodegiri.com

            </td>
            <td><img src="<?= base_url('assets/img/Logokdgr.jpg') ?>" class="mid"></td>
            <td width="45%" style="text-align:left;">
                Jalan Kenanga No. 126B,<br>
                Sinduadi, Mlati, Sleman,<br>
                Yogyakarta 55284,<br>
                Indonesia<br>
                +(62-274) 623-971<br>
                +(62-81) 333 933 132<br>
                cycas@kodegiri.com
            </td>

        </tr>
    </table>
    <table style="width: 100%" align="center">
        <tr>
            <td>
                <p class="bold" style="text-align:center; font-size:x-large">
                    INVOICE
                </p>
            </td>
        </tr>
    </table>
    <div>
        <table style="width: 50%" class="table" cellspacing="0" cellpadding="0" align="left">


            <tr>
                <td>
                    <?php foreach ($inv as $po) { ?>
                        <div style="width: 50%"><a class="bold">
                            <?= $po->address; ?><br>
                        </a></div>
                        <br>
                        <a>
                            Attn.: <?= $po->client_name; ?><br><br>
                        </a>
                </td>
                <td></td>
                </td>
            </tr>
        </table>
    </div>
    <table border="0" style="width: 50%" class="table" cellspacing="0" cellpadding="0" align="right">


        <tr>
            <td style="text-align: center;">

                <a><?= $po->invoice_date; ?><br><br></a>
                <a class="bold"><u><?= $po->no_invoice; ?></u><br><br></a>

            </td>

        </tr>
    </table>
    <br>
    <div style="margin-top: 100px;">
        <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
            <tr>
                <td style="text-align:center; " class="bold" width="3%">No</td>
                <td width="30%" style="text-align:center; " class="bold">Job Description</td>
                <td width="20%" style="text-align:center; " class="bold">Volume<br>Hour</td>
                <td width="20%" style="text-align:center; " class="bold">
                    <?php if ($po->currency_inv == 'IDR') {
                            echo 'Unit Price<br>Rp';
                        } else if ($po->currency_inv == 'USD') {
                            echo 'Unit Price<br>$';
                        } else if ($po->currency_inv == 'EUR') {
                            echo 'Unit Price<br>€';
                        } ?></td>
                <td width="27%" style="text-align:center; " class="bold">
                    <?php if ($po->currency_inv == 'IDR') {
                            echo 'Amount<br>Rp';
                        } else if ($po->currency_inv == 'USD') {
                            echo 'Amount<br>$';
                        } else if ($po->currency_inv == 'EUR') {
                            echo 'Amount<br>€';
                        } ?>
                </td>


            </tr>
            <?php $i = 1;
                        foreach ($pi as $pi) { ?>
                <tr>

                    <td style="text-align:center;" width="3%"><?= $i ?></td>
                    <td width="30%" style="text-align:center;">
                        <?= $pi->domain ?>
                    </td>
                    <td width="20%" style="text-align:center;">
                        <?= $pi->volume ?>
                    </td>
                    <td width="20%" style="text-align:center;">
                        <?php if ($po->currency_inv == 'IDR'&&$pi->price!='') {
                                echo number_format($pi->price, 2, ",", ".");
                            } else if ($po->currency_inv == 'USD'&&$pi->price!='') {
                                echo number_format($pi->price, 2, ".", ",");
                            } else if ($po->currency_inv == 'EUR'&&$pi->price!='') {
                                echo number_format($pi->price, 2, ".", ",");
                            } ?>
                    </td>
                    <td width="27%" style="text-align:center;">
                        <?php if ($po->currency_inv == 'IDR'&&$pi->amount!='') {
                                echo number_format($pi->amount, 2, ",", ".");
                            } else if ($po->currency_inv == 'USD'&&$pi->amount!='') {
                                echo number_format($pi->amount, 2, ".", ",");
                            } else if ($po->currency_inv == 'EUR'&&$pi->amount!='') {
                                echo number_format($pi->amount, 2, ".", ",");
                            } ?>
                    </td>
                <?php $i++;
                        } ?>
                </tr>
                <tr>
                    <td width="30%" style="text-align:center;" colspan="2">Total</td>
                    <td width="20%" style="text-align:center;" colspan="2">Please Pay</td>
                    <td width="27%" style="text-align:center;">
                        <?php if ($po->currency_inv == 'IDR'&&$po->grand_total!='') {
                            echo 'Rp ' . number_format($po->grand_total, 2, ",", ".");
                        } else if ($po->currency_inv == 'USD'&&$po->grand_total!='') {
                            echo '$ ' . number_format($po->grand_total, 2, ".", ",");
                        } else if ($po->currency_inv == 'EUR'&&$po->grand_total!='') {
                            echo '€ ' . number_format($po->grand_total, 2, ".", ",");
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div style="width: 50%">Note : <?php echo $po->public_notes; ?></div>
    <br>
    <table border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <p class="">
                    Payment <?php
                            $date1 = date_create($po->invoice_date);
                            $date2 = date_create($po->due_date);
                            $date = date_diff($date1, $date2);
                            echo $date->format("%a days");
                            ?><br>
                    Transfer to:<br>
                </p>
            </td>
            <td></td>
            </td>
        </tr>
    </table>
    <div>
        <table border="1" style="width: 25%" class="table" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p class="bold" style="text-align: center;">
                        PT STAR Software Indonesia<br>
                        Permata Bank, Mid plazza Branch<br>
                        Jakarta, Indonesia<br>
                        Swift Code: <?= $po->swift_code; ?><br>
                        RP Account <?= $po->account; ?>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table border="0" style="width: 100%" cellspacing="0" cellpadding="0">
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" width="40%">PT Kode Evolusi Bangsa</td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%"><br></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%"><br></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%"><br></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%"><br></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%">
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" width="40%"><?php echo $po->signature; ?></td>
            </tr>


        </table>
    </div>






</body>
<script type="text/javascript">
    window.print();
</script>

</html>