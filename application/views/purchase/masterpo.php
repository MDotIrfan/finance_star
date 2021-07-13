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
            font-size: 11px;
        }

        /* .center {
            height: 60px;
            width: 200px;
        }

        .mid {
            height: 100px;
            width: 300px;
        } */
    </style>

</head>

<body>
    <div>
        <img src=" <?= base_url('assets/img/sslogostar.PNG') ?>" class="mid">
        <br>
        <h1 style="text-align:center;" class="bold">PURCHASE ORDER</h1>
    </div>

    <table border="0" style="width: 100%">
        <tr>
            <td>
                <p class="bold">
                    PT.STAR Software Indonesia <br>
                    Head Office:<br>
                    CityLofts Sudirman, Unit 2109 <br>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA<br><br><br>Tel : +62 21 2555-8856 <br>
                    Fax : +62 21 2555-8767 <br>

                    Website : www.star-group.net
                </p>
            </td>
            <td>
                <p class="bold">
                    Branch Office: <br>
                    Jl. Kenangan 126B, Jombor Kidul <br>
                    Sinduadi, Mlati, Sleman <br>
                    Yogyakarta 55284 <br>
                    INDONESIA<br>
                    <br>
                    Tel : +622774-623-971 <br>
                </p>
            </td>
            <td></td>
            </>


    </table>
    <?php foreach ($pi as $pi) { ?>
        <table border="1" style="width: 70%" class="table" cellspacing="0" cellpadding="0" align="left">


            <tr>
                <td style="text-align:center; background-color:pink" class="bold" width="35%"><a>Project Name</a></td>



            </tr>
            <tr>
                <td style="text-align:center;" class="center" width="35%"><?php echo $pi->project_Name; ?></td>

            </tr>
        </table>
    <?php } ?>
    <table border="1" style="width: 25%" class="table" cellspacing="0" cellpadding="0" align="center">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="%">Date Issued</td>



        </tr>
        <tr>
            <td style="text-align:center; " class="center" width="%"><?php echo $pi->date; ?></td>

        </tr>
    </table>
    <br>
    <table border="1" style="width: 75%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Project Manager</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Email</td>


        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $pi->nama_Pm; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $pi->email_pm; ?></td>
        </tr>
    </table>
    <br>
    <table border="1" style="width: 75%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Freelance</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Email</td>


        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $pi->resource_Name; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $pi->resource_Email; ?></td>
        </tr>
        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Mobile Phone</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Address</td>
        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $pi->mobile_Phone; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $pi->address; ?></td>
        </tr>
    </table>

    <br>
    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="25">Match</td>
            <td width="25%" style="text-align:center; background-color:pink" class="bold">Word Count</td>
            <td style="text-align:center; background-color:pink" class="bold" width="25">Weighting</td>
            <td style="text-align:center; background-color:pink" class="bold" width="25">Weight Word Count</td>
        </tr>

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

    </table>
    <br>
    <table border="1" style="width: 50%" align="right" cellspacing="0" cellpadding="0">
        <td width="25%" style="text-align:center; background-color:pink" class="bold">Rate</td>
        <td width="25%" style="text-align:center;" class="bold"><?php echo $pi->rate; ?></td>
        <td width="25%" style="text-align:center; background-color:pink" class="bold">Total Fee</td>
        <td width="25%" style="text-align:center;" class="bold"><?php echo $pi->grand_Total; ?></td>
    </table>
    <br>
    <table border="0" style="width: 100%" class="center" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center;" class="bold" width="25"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25"></td>
            <td style="text-align:center;" class="bold" width="25">Regards,</td>
        </tr>
        <tr class="center"></tr>
        <tr>
            <td style="text-align:left;" width="25%"></td>
            <td width="25%" style="text-align:center;"></td>
            <td width="25%" style="text-align:center;"></td>
            <td width="25%" style="text-align:center;" class="bold"><?php echo $pi->nama_Pm; ?></td>
        </tr>

    </table>
    <br>
    <br>
    <div style="text-align:center;">For questions concerning this purchase order, please contact <br>
        respective PM who issued this purchase order.
    </div>
    <div style="text-align:center;" class="bold">Thank you for your service
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>


</html>