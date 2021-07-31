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
    <?php foreach ($inv as $po) { ?>
        <table border="0" style="width: 50%;margin-bottom: 15px;" margin-bottom: 15px; align="right" cellspacing="0" cellpadding="0">
            <tr style="text-align:right;">
                <td><?= $po->mitra_name ?></td>
            </tr>
            <?php foreach ($a as $a) { ?>
                <tr style="text-align:right;">
                    <td><?= $a->mobile_Phone ?></td>
                </tr>
                <tr style="text-align:right;">
                    <td><?= $a->resource_Email ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </table>

        <table border="0" style="width:100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0" align="left">


            <tr>
                <td width="10%"></td>
                <td width="90%">
                    <a>Bill to :</a><br><br>
                    <a> <?= $a->nama_Pm ?><br><br>
                        PT. STAR Software Indonesia<br>
                        Citylofts Sudirman Unit 1512<br>
                        Jl. KH. Mas Mansyur No. 121<br>
                        Jakarta 10220

                    </a>
                </td>
            </tr>

        </table>
        <table border="0" style="width: 100%" align="center">
            <tr>
                <td>
                    <p style="text-align:center; font-size:large">
                        <b><u>INVOICE</u></b><br>
                        <a style="font-size:small"><?php
                                                    $tgl = date('d/m/Y');
                                                    echo $tgl;
                                                    ?></a>
                    </p>


                </td>
            </tr>
        </table>
        <table border="1" style="width: 80%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0" align="center">


            <tr style="background: grey" class="bold">
                <td style="text-align:center; " class="centerr" width="3%">No</td>
                <td width="57%" style="text-align:center; " class="bold">DESCRIPTION</td>
                <td width="40%" style="text-align:center; " class="bold">AMOUNT</td>
            </tr>
            <?php foreach ($pi as $p) { ?>
                <tr class="midd">
                    <td style="text-align:center; " width="3%" class="bold">1</td>
                    <td width="57%" style="text-align:center; "><?= $p->jobdesc ?> </td>
                    <td width="40%" style="text-align:center; "><?= $p->amount ?></td>
                </tr>
            <?php } ?>
            <tr class="centerr">
                <td colspan="2" style="text-align:center; ">TOTAL</>
                <td style="text-align:center; ">IDR <?= $p->grand_total ?></td>
            </tr>

        </table>

        <table border="0" style="width: 80%; margin-bottom: 25px;" class="table" cellspacing="0" cellpadding="0" align="center">


            <tr class="centerr">
                <td>Please send your payment to:<br>
                    &ensp;Name : <?= $po->mitra_name ?><br>
                    &ensp;Bank : <?= $po->cabang_bank ?><br>
                    &ensp;Account number : <?= $po->no_rekening ?>
                </td>
            </tr>

        </table>
        <table border="0" style="width: 100%; margin-bottom: 25px;" class="table" cellspacing="0" cellpadding="0" align="center">


            <tr>
                <td style="text-align: center; font-size:large" class="bold">Thank you for your cooperation.</td>
            </tr>

        </table>
        <table border="0" style="width: 100%" class="center" cellspacing="0" cellpadding="0">


            <tr>
                <td style="text-align:center;" class="bold" width="25"></td>
                <td width="25%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="25"></td>
                <td style="text-align:center;" width="25">Bekasi, <?php
                                                                    $tgl = date('d M Y');
                                                                    echo $tgl;
                                                                    ?></td>
            </tr>
            <tr class="center"></tr>
            <tr>
                <td style="text-align:left;" width="25%"></td>
                <td width="25%" style="text-align:center;"></td>
                <td width="25%" style="text-align:center;"></td>
                <td width="25%" style="text-align:center;"><?= $po->mitra_name ?></td>
            </tr>

        </table>

</body>
<script type="text/javascript">
    window.print();
</script>

</html>