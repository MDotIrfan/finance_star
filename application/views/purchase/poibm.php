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

        .center {
            height: 60px;
            width: 200px;
        }

        .mid {
            height: 100px;
            width: 300px;
        }
    </style>
</head>

<body>

    <img src=" <?= base_url('assets/img/sslogostar.PNG') ?>" class="mid">
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

    <table border="1" style="width: 50%" class="table" cellspacing="0" cellpadding="0">
        <?php foreach ($po as $po) { ?>

            <tr>
                <td style="text-align:center; background-color:pink" class="bold" width="35%"><a>Project Name</a></td>



            </tr>
            <tr>
                <td style="text-align:center;" class="center" width="35%"><?php echo $po->project_Name; ?></td>

            </tr>

    </table>
    <table border="1" style="width: 25%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold">Date Issued</td>



        </tr>
        <tr>
            <td style="text-align:center; " class="center" ><?php echo $po->date; ?></td>

        </tr>
    </table>
    <br>
    <table border="1" style="width: 75%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Project Manager</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Email</td>


        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $po->nama_Pm; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $po->email_pm; ?></td>
        </tr>
    </table>
    <br>
    <table border="1" style="width: 75%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Freelnce</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Email</td>


        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $po->resource_Name; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $po->resource_Email; ?></td>
        </tr>
        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="35%">Mobile Phone</td>
            <td width="35%" style="text-align:center; background-color:pink" class="bold">Addres</td>


        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $po->mobile_Phone; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $po->address; ?></td>
        </tr>
    <?php } ?>
    </table>

    <br>

    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">

        <tr>
            <td style="text-align:center; background-color:pink" class="bold" width="25%">Task</td>
            <td width="25%" style="text-align:center; background-color:pink" class="bold">Quantity</td>
            <td style="text-align:center; background-color:pink" class="bold" width="25%">Rate (IDR)</td>
            <td style="text-align:center; background-color:pink" class="bold" width="25%">Total (IDR)</td>
        </tr>
        <?php foreach ($pi as $pi) { ?>
            <tr>
                <td style="text-align:left;" width="25%"><?php echo $pi->task; ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->qty; ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->rate; ?></td>
                <td width="25%" style="text-align:center;"><?php echo $pi->amount; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <table border="1" style="width: 50%" cellspacing="0" cellpadding="0">

        <td width="25%" style="text-align:center; background-color:pink" class="bold">Total Fee</td>
        <td width="25%" style="text-align:center;" class="bold"><?php echo $po->grand_Total; ?></td>
    </table>
    <br>
    <!-- <table border="0" style="width: 100%"  cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td width="25%" style="text-align:center;" class="bold"></td>
            <td style="text-align:center;" class="bold" width="25%"></td>
            <td style="text-align:center;" class="bold" width="25%">Regards,</td>
        </tr>
        <tr class="center"></tr>
        <tr>
            <td style="text-align:left;" width="25%"></td>
            <td width="25%" style="text-align:center;"></td>
            <td width="25%" style="text-align:center;"></td>
            <td width="25%" style="text-align:center;" class="bold">SOMEONE</td>
        </tr>

    </table> -->
    <br>
    <br>
    <div style="text-align:center;">For questions concerning this purchase order, please contact <br>
        respective PM who issued this purchase order.
    </div>
    <div style="text-align:center;" class="bold">Thank you for your service
    </div>
</body>

</html>