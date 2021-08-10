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
            height: 100px;
            width: 350px;
        }
    </style>
</head>

<body>
    <center><img src="<?= base_url('assets/img/sslogostar.jpg') ?>" class="mid"></center>
    <table border="0" style="width: 35%" align="right">
        <tr>
            <td>
                <p>
                    <b> PT.STAR Software Indonesia</b> <br>
                    Head Office:<br>
                    CityLofts Sudirman # 1512 <br>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA<br>
                    Tel : +62 21 2555-8856 <br>
                    Fax : +62 21 2555-8767 <br>
                    e-mail : <?php foreach ($user as $u) { ?>
                        <?= $u->email_Address ?>
                    <?php } ?><br>
                    web : www.star-group.net
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
    <div style="margin-top: 110px;">

        <table border="0" style="width: 50%" class="table" cellspacing="0" cellpadding="0" align="left">


            <tr>
                <td>
                    <?php foreach ($inv as $po) { ?>
                        <a class="bold">
                            <?= $po->client_name; ?><br>
                        </a>
                        <a><?= $po->address; ?><br>
                            <br>
                            Attn.: <?= $po->client_name; ?><br>
                        </a>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table border="0" style="width: 50%" class="table" cellspacing="0" cellpadding="0" align="right">


            <tr>
                <td>

                    <a><?= $po->invoice_date; ?><br><br></a>
                    <a class="bold"><u><?= $po->no_invoice; ?></u><br><br></a>
                    <a>Page 1/2</a>

                </td>

            </tr>
        </table>
    </div>
    <br>
    <div style="margin-top: 100px;">
        <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">


            <tr>

                <td width="5%%" style="text-align:center; background-color:pink" class="bold">No</td>
                <td width="45%" style="text-align:center; background-color:pink" class="bold">Job Description</td>
                <td style="text-align:center; background-color:pink" class="bold">STAR Number</td>
                <td style="text-align:center; background-color:pink" class="bold">Number Line</td>
                <td style="text-align:center; background-color:pink" class="bold"><?php if ($po->currency_inv == 'IDR') {
                                                                                        echo 'Amount IDR';
                                                                                    } else if ($po->currency_inv == 'USD') {
                                                                                        echo 'Amount USD';
                                                                                    } else if ($po->currency_inv == 'EUR') {
                                                                                        echo 'Amount EUR';
                                                                                    } ?></td>
            </tr>
            <?php $i = 1;
                        foreach ($pi as $item) { ?>
                <tr>
                    <td width="5%%" style="text-align:center;"><?= $i . "."; ?></td>
                    <td width="45%" style="text-align:center;"><?= $item->jobdesc; ?></td>
                    <td style="text-align:center;"><?= $item->star_number; ?></td>
                    <td style="text-align:center;"><?= $item->number_line; ?></td>
                    <td style="text-align:center;"><?php if ($po->currency_inv == 'IDR') {
                                                        echo number_format($item->amount, 2, ",", ".");
                                                    } else if ($po->currency_inv == 'USD') {
                                                        echo number_format($item->amount, 2, ".", ",");
                                                    } else if ($po->currency_inv == 'EUR') {
                                                        echo number_format($item->amount, 2, ".", ",");
                                                    } ?></td>
                </tr>
            <?php $i++;
                        } ?>
            <tr>
                <td width="5%%" style="text-align:center;"></td>
                <td width="45%" style="text-align:center;">GRAND TOTAL</td>
                <td style="text-align:center;" colspan="2">PLEASE PAY</td>
                <td style="text-align:center;"><?php if ($po->currency_inv == 'IDR') {
                                                    echo number_format($po->grand_total, 2, ",", ".");
                                                } else if ($po->currency_inv == 'USD') {
                                                    echo number_format($po->grand_total, 2, ".", ",");
                                                } else if ($po->currency_inv == 'EUR') {
                                                    echo number_format($po->grand_total, 2, ".", ",");
                                                } ?></td>
            </tr>
        </table>
    </div>
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
                <td style="text-align:center;" width="40%">PT STAR Software Indonesia</td>
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
                <td style="text-align:center;" width="40%">Afrizal Lisdianta</td>
            </tr>

        <?php } ?>
        </table>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>