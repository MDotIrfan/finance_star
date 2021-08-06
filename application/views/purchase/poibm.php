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
            font-size: 11px;
        }

        .center {
            height: 40px;
            width: 200px;
        }

        .mid {
            height: 100px;
            width: 300px;
        }
    </style>
</head>

<body>

    <img src="<?= base_url('assets/img/sslogostar.jpg') ?>" class="mid">
    <h1 style="text-align:center;" class="bold">PURCHASE ORDER</h1>


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
    <div>
        <?php foreach ($p as $po) { ?>
            <table border="1" style="width: 70%;" class="table" cellspacing="0" cellpadding="0" align="left">


                <tr>
                    <td style="text-align:center; background-color:pink" class="bold" width="35%"><a>Project Name</a></td>



                </tr>
                <tr>
                    <td style="text-align:center;" class="center" width="35%">
                        <?php echo $po->project_Name_po; ?>
                    </td>

                </tr>

            </table>
        <?php } ?>
        <table border="1" style="width: 25%" class="table" cellspacing="0" cellpadding="0" align="right">


            <tr>
                <td style="text-align:center; background-color:pink" class="bold" width="%">Date Issued</td>



            </tr>
            <tr>
                <td style="text-align:center; " class="center" width="%"><?php echo $po->date; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <div style="margin-top: 60px;">
        <table border="1" style="width: 98.5%" class="table" cellspacing="0" cellpadding="0">


            <tr>
                <td style="text-align:center; background-color:pink" class="bold" width="35%">Project Manager</td>
                <td width="35%" style="text-align:center; background-color:pink" class="bold">Email</td>
            </tr>
            <tr>
                <td style="text-align:center;" class="center" width="35%"><?php echo $po->nama_Pm; ?></td>
                <td width="35%" style="text-align:center;"><?php echo $po->email_pm; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <table border="1" style="width: 70%" class="table" cellspacing="0" cellpadding="0">


            <tr>
                <td style="text-align:center; background-color:pink" class="bold">Freelnce</td>
                <td style="text-align:center; background-color:pink" class="bold">Email</td>
            </tr>
            <tr>
                <td style="text-align:center;" class="center"><?php echo $po->resource_Name; ?></td>
                <td style="text-align:center;"><?php echo $po->resource_Email; ?></td>
            </tr>
            <tr>
                <td style="text-align:center; background-color:pink" class="bold">Mobile Phone</td>
                <td style="text-align:center; background-color:pink" class="bold">Addres</td>


            </tr>
            <tr>
                <td style="text-align:center;" class="center"><?php echo $po->mobile_Phone; ?></td>
                <td style="text-align:center;"><?php echo $po->address_Resource; ?></td>
            </tr>
        </table>
    </div>

    <br>

    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">

        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="25%">Task</td>
            <td width="25%" style="text-align:center; background-color:pink" class="bold">Quantity</td>
            <td style="text-align:center; background-color:pink" class="bold" width="25%"><?php if($po->currency_po=='IDR'){
               echo 'Rate (IDR)';
            } else if($po->currency_po=='USD'){
                echo 'Rate (USD)';
            } else if($po->currency_po=='EUR'){
                echo 'Rate (EUR)';
            } ?></td>
            <td style="text-align:center; background-color:pink" class="bold" width="25%"><?php if($po->currency_po=='IDR'){
               echo 'Total (IDR)';
            } else if($po->currency_po=='USD'){
                echo 'Total (USD)';
            } else if($po->currency_po=='EUR'){
                echo 'Total (EUR)';
            } ?></td>
        </tr>
        <?php foreach ($pi as $p) { ?>
            <tr>
                <td style="text-align:left;" width="25%"><?php echo $p->task; ?></td>
                <td width="25%" style="text-align:center;"><?php echo $p->qty; ?></td>
                <td width="25%" style="text-align:center;"> <?php if($po->currency_po=='IDR'){
                echo number_format($p->rate,2,",",".");
            } else if($po->currency_po=='USD'){
                echo number_format($p->rate,2,".",",");
            } else if($po->currency_po=='EUR'){
                echo number_format($p->rate,2,".",",");
            } ?></td>
                <td width="25%" style="text-align:center;"><?php if($po->currency_po=='IDR'){
                echo number_format($p->amount,2,",",".");
            } else if($po->currency_po=='USD'){
                echo number_format($p->amount,2,".",",");
            } else if($po->currency_po=='EUR'){
                echo number_format($p->amount,2,".",",");
            } ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <table border="1" style="width: 50%" align="right" cellspacing="0" cellpadding="0">

        <td width="25%" style="text-align:center; background-color:pink" class="bold">Total Fee</td>
        <td width="25%" style="text-align:center;" class="bold">
            <?php if($po->currency_po=='IDR'){
                echo 'Rp. '.number_format($p->grand_Total_po,2,",",".");
            } else if($po->currency_po=='USD'){
                echo '$ '.number_format($p->grand_Total_po,2,".",",");
            } else if($po->currency_po=='EUR'){
                echo '€ '.number_format($p->grand_Total_po,2,".",",");
            } ?>
        </td>
    </table>
    <br>
    <div style="margin-top: 10px;">
        <table border="0" style="width: 100%" cellspacing="0" cellpadding="0">


            <tr>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td width="20%" style="text-align:center;" class="bold"></td>
                <td style="text-align:center;" class="bold" width="20%"></td>
                <td style="text-align:center;" class="bold" width="40%">Regards,</td>
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
                <td style="text-align:center;" class="bold" width="40%"><?php echo $po->nama_Pm; ?></td>
            </tr>


        </table>
    </div>
    <div style="text-align:center;margin-top:40px;">For questions concerning this purchase order, please contact <br>
        respective PM who issued this purchase order.
    </div>
    <div style="text-align:center;" class="bold">Thank you for your service
    </div>

</body>
<script type="text/javascript">
    window.print();
</script>

</html>