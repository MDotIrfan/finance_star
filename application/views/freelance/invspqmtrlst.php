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
            height: 25px;
            width: 200px;
        }

        .mid {
            height: 100px;
            width: 600px;
        }
    </style>
</head>

<body>
    <?php foreach ($inv as $po) { ?>
        <div>
            <table border="0" style="width: 100%">
                <tr>
                    <td>
                        <p style="text-align:left; font-size:18px">
                            <b><?= $po->mitra_name ?><br>
                                bin SHAMSUDDIN<br>
                                Ampang Avenue, 68000 Ampang, <br>
                                INVOICE / <?php
                                            $tgl = date('d/m/Y');
                                            echo $tgl;
                                            ?><br></b>
                        </p>
                    </td>
                    <td style="text-align:right;">
                        <p><?= $po->address ?></p>
                        <p> No. 6 Persiaran Setia Makmur,</p>
                        <p> Setia Alam, Seksyen U13,</p>
                        <p>40170, Shah Alam, Selangor.</p>


                    </td>
                </tr>

            </table>
        <?php } ?>
        </div>
        <div>
            <table border=" 0" style="width: 100%; background-color:#c7c7ff;  margin-bottom: 15px;">
                <tr>
                    <td style="text-align:left;">
                        <p><b>SpeeQual Sdn Bhd<br></b></p>
                        <p> C12-3, One Ampang Avenue,<br></p>
                        <p>Jalan Ampang Avenue 1/1, <br></p>
                        <p>Selangor, Malaysia. <br></p>


                    </td>
                    <td style="text-align:right;">
                        <p><b>BALANCE DUE</b></p>
                        <p>Upon Receipt </b></p>
                        <p style="color:green; font-size:x-large;">RM<?= $po->grand_total ?></p>


                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table border="1" style="width: 100%; border-collapse: collapse;" bordercolor="#449dee" class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="text-align:left; " class="centerr">Project Manager:</td>
                </tr>
                <tr>
                    <td>
                        1. Nur Athirah Anuar<br>
                         O-94259_Teleflex GTD - B<br>
                        2. Aniq<br>
                         ToTranslate_081-ENG-MAS-210225-1<br>
                        3. Chan Mei Theng<br>
                         MT-cleanup task 2021020193_JZ & CJ<br>
                         MT-cleanup 2021022029_NW26
                    </td>
                </tr>

                <!-- <tr>
            <?php foreach ($a as $a) { ?>
                <td style="text-align:left;" class="mid">1. <?= $a->nama_Pm ?><br><br>
                    <?php foreach ($pi as $p) { ?>
                        &emsp; - <?= $p->jobdesc ?><br>
                    <?php } ?>
                </td>
            <?php } ?>
        </tr> -->
            </table>
        </div>
        <div>
            <table border=" 0" style="width: 100%;   margin-bottom: 15px;">
                <tr>
                    <td>
                        <p style="text-align:left;">
                            Please send payment to:<br>
                            Name: <?= $po->mitra_name ?><br>
                            Bank: <?= $po->cabang_bank ?><br>
                            Account Number: <?= $po->no_rekening ?>
                        </p>
                    </td>
                    <td>
                        <p style="text-align:left;">
                            Branch name: Kuala Terengganu<br>
                            Swift code: MBBEMYKL<br><br><br><br>
                        </p>


                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table border="1" style="width: 100%; border-collapse: collapse;" class="table" cellspacing="0" cellpadding="0">
                <tr class="centerr" class="centerr" style="text-align:center; background-color:#b3acb4; ">
                    <td width="35%" width="35%">Job Description</td>
                    <td width="15%" width="15%">Quantiy</td>
                    <td width="15%">Price Per</td>
                    <td width="20%">Total (RM)</td>
                </tr>
                <?php foreach ($pi as $p) { ?>
                    <tr class="center">
                        <td width="35%" style="text-align:center;"><?= $p->jobdesc ?></td>
                        <td width="15%" style="text-align:center;"><?= $p->qty ?></td>
                        <td width="15%" style="text-align:center;"><?= $p->rate ?></td>
                        <td width="20%" style="text-align:center;"><?= $p->amount ?></td>
                    </tr>
                <?php } ?>
                <tr class="centerr" style="text-align:center; background-color:#b3acb4; ">
                    <td width="35%"></td>
                    <td width="15%"></td>
                    <td width="15%">TOTAL</td>
                    <td width="20%">RM
                        <!-- <?= $p->grand_total ?> -->
                    </td>
            </table>
        </div>

        <div>
            <table rules="none" border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>
                            <?= $po->mitra_name ?>
                        </p>
                    </td>
                    <td>
                        <?php foreach ($res as $res) { ?>
                            <p>
                                Phone: <?= $res->mobile_phone ?>
                            </p>
                        <?php } ?>
                    </td>
                    <td>
                        <p style="text-align:right;">
                            email: <?= $po->email ?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>