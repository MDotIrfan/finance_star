<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT STAR Software Indonesia</title>
    <style type="text/css">
        .bold {
            font-weight: bold;
        }

        body {
            font-size: 14px;
        }

        .center {
            height: 75px;
            width: 200px;
        }

        footer {
            position: absolute;
            bottom: 10px;
            text-align: left;
            color: black;
            width: 1000;
        }

        .header {
            position: absolute;
            top: 35.53px;
            text-align: left;
            padding: 10px;
            color: black;
        }
    </style>

</head>
<?php foreach ($quotation as $qu) { ?>
    <header><?php echo $qu->header; ?></header>
    <h1 align='center' style="background-color:lightgreen">Quotation For <?php echo $qu->project_Name; ?></h1>
    <h2 align='left' style="background-color:Pink">Cost for <?php echo $qu->project_Name; ?></h2>
<?php } ?>

<body>
    <table style="width: 105%" cellspacing="0" cellpadding="0">

        <tr>
            <td class="bold"><br> </td>
            <td><br></td>
            <td class="bold">Volume</td>
            <td class="bold">Unit</td>
            <td class="bold">Price/Unit</td>
            <td class="bold"><?php if ($qu->currency == 'IDR') {
                                    echo 'Cost in IDR';
                                } else if ($qu->currency == 'USD') {
                                    echo 'Cost in USD';
                                } else if ($qu->currency == 'EUR') {
                                    echo 'Cost in EUR';
                                } ?></td>

        </tr>
        <?php foreach ($qi as $q) { ?>
            <tr>
                <td class="bold"><br> <?php echo $q->job_Desc; ?></td>
                <td><br></td>
                <td><?php echo $q->volume; ?></td>
                <td><?php echo $q->unit; ?> Package</td>
                <td><?php if ($qu->currency == 'IDR'&&$q->price!='') {
                        echo 'Rp. ' . number_format($q->price, 2, ",", ".");
                    } else if ($qu->currency == 'USD'&&$q->price!='') {
                        echo '$ ' . number_format($q->price, 2, ".", ",");
                    } else if ($qu->currency == 'EUR'&&$q->price!='') {
                        echo '€ ' . number_format($q->price, 2, ".", ",");
                    } ?></td>
                <td><?php if ($qu->currency == 'IDR'&&$q->cost!='') {
                        echo 'Rp. ' . number_format($q->cost, 2, ",", ".");
                    } else if ($qu->currency == 'USD'&&$q->cost!='') {
                        echo '$ ' . number_format($q->cost, 2, ".", ",");
                    } else if ($qu->currency == 'EUR'&&$q->cost!='') {
                        echo '€ ' . number_format($q->cost, 2, ".", ",");
                    } ?></td>
            </tr>
        <?php } ?>



        <tr>
            <td class="bold"></td>
            <td><br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($quotation as $qu) { ?>
            <tr>
                <td class="bold"></td>
                <td><br></td>
                <td class="bold">Total Cost :</td>
                <td></td>
                <td></td>
                <td class="bold"><?php if ($qu->currency == 'IDR'&&$qu->total_Cost!='') {
                                        echo 'Rp. ' . number_format($qu->total_Cost, 2, ",", ".");
                                    } else if ($qu->currency == 'USD'&&$qu->total_Cost!='') {
                                        echo '$ ' . number_format($qu->total_Cost, 2, ".", ",");
                                    } else if ($qu->currency == 'EUR'&&$qu->total_Cost!='') {
                                        echo '€ ' . number_format($qu->total_Cost, 2, ".", ",");
                                    } ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="bold"></td>
            <td><br></td>
            <td class="bold"></td>
            <td></td>
            <td></td>
            <td class="bold"></td>


        </tr>
        <?php foreach ($quotation as $qu) { ?>
            <tr style="background-color:lightyellow">
                <td class="bold">Grand Total</td>
                <td><br></td>
                <td class="bold"></td>
                <td></td>
                <td></td>
                <td class="bold"><?php if ($qu->currency == 'IDR'&&$qu->grand_Total!='') {
                                        echo 'Rp. ' . number_format($qu->grand_Total, 2, ",", ".");
                                    } else if ($qu->currency == 'USD'&&$qu->grand_Total!='') {
                                        echo '$ ' . number_format($qu->grand_Total, 2, ".", ",");
                                    } else if ($qu->currency == 'EUR'&&$qu->grand_Total!='') {
                                        echo '€ ' . number_format($qu->grand_Total, 2, ".", ",");
                                    } ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="bold"><br><br><br></td>
            <td class="bold"></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"></td>
            <td></td>
            <td></td>
            <td></td>

            <td>Ordered by:</td>
        </tr>
        <tr>
            <td class="bold"><br><i>*Terms and Condition are :</i></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"><br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">1. 2X Mayor Revision<br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">2. Free Design Consultation<br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($quotation as $qu) { ?>
            <tr>
                <td class="bold">3. UNLIMITED Minor Revision (Text, Color and other minors)<br></td>
                <td></td>
                <td></td>
                <td></td>

                <td><?php echo $qu->client_Name; ?></td>
            </tr>
        <?php } ?>
    </table>
    <p>Note : <?php echo $qu->public_Notes; ?> </p>
    <footer>
        <?php echo $qu->footer; ?>
    </footer>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>