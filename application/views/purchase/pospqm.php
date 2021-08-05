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
            width: 400px;
        }

        .midd {
            height: 50px;
            width: 200px;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('assets/img/logospq.jpg') ?>" class="mid" align="right" style="margin-right: 115px;">
    <div style="margin-top: 50px;">
        <table border="0" style="width: 25%" align="right">
            <td>
                <p style="text-align:left;" class="bold">
                    SpeeQual Sdn Bhd<br>
                    C12-3, One Ampang Avenue<br>
                    Jalan Ampang 1/1,<br>
                    68000, Ampang, <br>
                    Selangor, Malaysia<br><br>
                    Tel : +603-42660087
                    Email: speequal@speequal.com<br>
                    Website : www.speequal.com<br>
                </p>
            </td>
        </table>
    </div>
    <br>
    <div style="margin-top: 200px;">
        <table rules="none" border="0" style="width: 100%" class="table" cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%" class="bold">
                    <p>
                        Date Issued: <br>
                        Project Name:<br><br>

                        Deadline<br><br>

                        Project Manager:<br>
                        Email:<br><br>
                        Telephone Number:<br><br>
                        Vendor/resource:<br>
                        Address:<br>
                        Mobile:<br>
                        Email:<br>
                        Service:<br><br>
                        Currency:<br>
                        Wordcount details


                    </p>
                </td>
                <!-- <?php foreach ($p as $po) { ?>
                    <td width="85%">

                        <p>
                            <?php echo $po->date; ?><br>
                            <b><?php echo $po->project_Name; ?></b><br><br>

                            <?php echo $po->date; ?><br><br>

                            <?php echo $po->nama_Pm; ?><br>
                            <?php echo $po->email_pm; ?><br><br>
                            +6016-5477273<br><br>
                            <?php echo $po->resource_Name; ?><br>
                            <?php echo $po->address_Resource; ?><br>
                            <?php echo $po->mobile_Phone; ?><br>
                            <?php echo $po->resource_Email; ?><br>
                            <?php echo $po->project_Name; ?><br><br>
                            <b>MYR</b> <br><br>
                        </p>
                    </td>
                <?php } ?> -->
            </tr>
        </table>
    </div>
    <!-- <table border="1" style="width: 80%" class="table" cellspacing="0" cellpadding="0" align="center">


        <tr>
            <td width="35%" style="text-align:center; " class="bold" width="35%">Match</td>
            <td width="15%" style="text-align:center; " class="bold" width="15%">Word <br>Count</td>
            <td width="15%" style="text-align:center; " class="bold">Weighting</td>
            <td width="20%" style="text-align:center; " class="bold">Weighted word count</td>
        </tr>
        <?php foreach ($pi as $p) { ?>
            <tr class="bold">
                <td width="35%" style="text-align:center;"><?php echo $p->task; ?></td>
                <td width="15%" style="text-align:center;">20 mei 2020</td>
                <td width="15%" style="text-align:center;">1000</td>
                <td width="20%" style="text-align:center;">1000</td>
            </tr>
        <?php } ?>
        <tr>
            <td width="35%" style="text-align:center;">Total</td>
            <td width="15%" style="text-align:center;">2597</td>
            <td width="15%" style="text-align:center;"></td>
            <td width="20%" style="text-align:center;">1000</td>
        </tr>
        <tr>

            <td style="text-align:right;" colspan="3">Total</td>
            <td style="text-align:center;">RM </td>
        </tr>

    </table> -->
    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center;" class="bold" width="25%">Match</td>
            <td width="25%" style="text-align:center;" class="bold">Word Count</td>
            <td style="text-align:center;" class="bold" width="25%">Weighting</td>
            <td style="text-align:center;" class="bold" width="25%">Weight Word Count</td>
        </tr>
        <?php foreach ($pi as $pi) { ?>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo '-';
                                                            } else {
                                                                echo 'Locked';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->locked; ?></td>
                <td width="25%" style="text-align:center;">0%</td>
                <td width="25%" style="text-align:center;"><?php $wwc1 = $pi->locked * 0 / 100;
                                                            echo $wwc1; ?></td>
            </tr>

            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo '-';
                                                            } else {
                                                                echo 'Repetitions';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->repetitions; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w2 = 0;
                                                                echo $w2 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w2 = 15;
                                                                echo $w2 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w2 = 0;
                                                                echo $w2 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w2 = 0;
                                                                echo $w2 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc2 = $pi->repetitions * $w2 / 100;
                                                            echo $wwc2; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo 'ICE Match';
                                                            } else {
                                                                echo 'Fuzzy 100% / CM';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->fuzzy100; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w3 = 0;
                                                                echo $w3 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w3 = 0;
                                                                echo $w3 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w3 = 0;
                                                                echo $w3 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w3 = 0;
                                                                echo $w3 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc3 = $pi->fuzzy100 * $w3 / 100;
                                                            echo $wwc3; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo 'Repetitions';
                                                            } else {
                                                                echo 'Fuzzy 95% - 99%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->fuzzy95; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w4 = 30;
                                                                echo $w4 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w4 = 30;
                                                                echo $w2 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w4 = 30;
                                                                echo $w4 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w4 = 10;
                                                                echo $w4 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc4 = $pi->fuzzy95 * $w4 / 100;
                                                            echo $wwc4; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo 'Fuzzy 100%';
                                                            } else {
                                                                echo 'Fuzzy 85% - 94%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->fuzzy85; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w5 = 50;
                                                                echo $w5 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w5 = 50;
                                                                echo $w5 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w5 = 50;
                                                                echo $w5 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w5 = 10;
                                                                echo $w5 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc5 = $pi->fuzzy85 * $w5 / 100;
                                                            echo $wwc5; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo '99% - 76% (High Fuzzy)';
                                                            } else {
                                                                echo 'Fuzzy 75% - 84%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->fuzzy75; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w6 = 70;
                                                                echo $w6 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w6 = 70;
                                                                echo $w6 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w6 = 70;
                                                                echo $w6 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w6 = 25;
                                                                echo $w6 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc6 = $pi->fuzzy75 * $w6 / 100;
                                                            echo $wwc6; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo '75% - 0% (New Words)';
                                                            } else {
                                                                echo 'Fuzzy 50% - 74%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->fuzzy50; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w7 = 100;
                                                                echo $w7 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w7 = 100;
                                                                echo $w7 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w7 = 100;
                                                                echo $w7 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w7 = 100;
                                                                echo $w7 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc7 = $pi->fuzzy50 * $w7 / 100;
                                                            echo $wwc7; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%"><?php
                                                            if ($pi->tipe_Po == 4) {
                                                                echo 'MT';
                                                            } else {
                                                                echo 'New';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->new; ?></td>
                <td width="25%" style="text-align:center;"><?php
                                                            if ($pi->tipe_Po == 1) {
                                                                $w8 = 100;
                                                                echo $w8 . '%';
                                                            } else if ($pi->tipe_Po == 2) {
                                                                $w8 = 100;
                                                                echo $w8 . '%';
                                                            } else if ($pi->tipe_Po == 3) {
                                                                $w8 = 80;
                                                                echo $w8 . '%';
                                                            } else if ($pi->tipe_Po == 4) {
                                                                $w8 = 70;
                                                                echo $w8 . '%';
                                                            }
                                                            ?></td>
                <td width="25%" style="text-align:center;"><?php $wwc8 = $pi->new * $w8 / 100;
                                                            echo $wwc8; ?></td>
            </tr>
            <tr>
                <td style="text-align:left;" width="25%">Total</td>
                <td width="25%" style="text-align:center;"><?php echo $pi->locked + $pi->repetitions + $pi->fuzzy100 + $pi->fuzzy95 + $pi->fuzzy85 + $pi->fuzzy75 + $pi->fuzzy50 + $pi->new; ?></td>
                <td width="25%" style="text-align:center; border-bottom : none;"></td>
                <td width="25%" style="text-align:center;"><?php echo $wwc1 + $wwc2 + $wwc3 + $wwc4 + $wwc5 + $wwc6 + $wwc7 + $wwc8; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <table border="0" style="width: 100%" class="center" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td style="text-align:center;" width="25%">Regards,</td>
        </tr>

        <tr class="center">
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td style="text-align:center;" width="25%"><br></td>
        </tr>
        <tr class="center">
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;color:blue;">Someone</td>
        </tr>
        <tr class="center">
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td style="text-align:center;color:grey;" width="25%">Project Manager</td>
        </tr>
        <tr>
            <td style="text-align:left;" width="25%"></td>
            <td width="25%" style="text-align:center;"></td>
            <td width="25%" style="text-align:center;">
            </td>
            <td width="25%" style="text-align:center;">
                <img src="<?= base_url('assets/img/logospq.jpg') ?>" class="midd" align="center">
            </td>
        </tr>

    </table>

</body>
<script type="text/javascript">
    window.print();
</script>

</html>