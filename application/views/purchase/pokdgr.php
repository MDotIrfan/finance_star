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
            height: 60px;
            width: 200px;
        }

        .mid {
            height: 150px;
            width: 250px;
        }
    </style>
</head>

<body>

    <img src="<?= base_url('assets/img/Logokdgr.jpg') ?>" class="mid">
    <h1 style="text-align:center;" class="bold">PURCHASE ORDER</h1>


    <table border="0" style="width: 100%">
        <tr>
            <td>
                <p class="bold">
                    PT.STAR Software Indonesia <br>
                    Head Office:<br>
                    CityLofts Sudirman, Unit 1512 <br>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA<br><br><br>
                    Tel : +62 21 2291-8933 <br>
                    Fax : +62 21 2555-8767 <br>

                    Website : www.kodegiri.com
                </p>
            </td>
            <td>
                <p class="bold">
                    Production Office: <br>
                    Jl. Kenangan 126B, Jombor Kidul <br>
                    Sinduadi, Mlati, Sleman <br>
                    Yogyakarta 55284 <br>
                    INDONESIA<br>
                    <br>
                    Tel : +62 274-623-971, +62 81 333 933 132 <br>
                    Email:cycas@kodegiri.com
                </p>
            </td>
            <td></td>


            <div>
    </table>
    <?php foreach ($p as $po) { ?>
        <table border="1" style="width: 70%" class="table" cellspacing="0" cellpadding="0" align="left">


            <tr>
                <td style="text-align:center; background-color:green" class="bold" width="35%"><a>Project Name</a></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="center" width="35%">
                    <!-- <?php echo $po->project_Name; ?> -->
                </td>

            </tr>

        </table>
    <?php } ?>
    <table border="1" style="width: 25%" class="table" cellspacing="0" cellpadding="0" align="right">


        <tr>
            <td style="text-align:center; background-color:green" class="bold" width="%">Date Issued</td>



        </tr>
        <tr>
            <td style="text-align:center; " class="center" width="%"><?php echo $po->date; ?></td>
        </tr>
    </table>
    </div>
    <br>
    <div style="margin-top: 80px;">
        <table border="1" style="width: 98.5%" class="table" cellspacing="0" cellpadding="0">


            <tr>
                <td style="text-align:center; background-color:green" class="bold" width="35%">Project Manager</td>
                <td width="35%" style="text-align:center; background-color:green" class="bold">Email</td>


            </tr>
            <tr>
                <td style="text-align:center;" class="center" width="35%"><?php echo $po->nama_Pm; ?></td>
                <td width="35%" style="text-align:center;"><?php echo $po->email_pm; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <table border="1" style="width: 98.5%" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td style="text-align:center; background-color:green" class="bold" width="35%">Freelnce</td>
            <td width="35%" style="text-align:center; background-color:green" class="bold">Email</td>
        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $po->resource_Name; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $po->resource_Email; ?></td>
        </tr>
        <tr>
            <td style="text-align:center; background-color:green" class="bold" width="35%">Mobile Phone</td>
            <td width="35%" style="text-align:center; background-color:green" class="bold">Addres</td>
        </tr>
        <tr>
            <td style="text-align:center;" class="center" width="35%"><?php echo $po->mobile_Phone; ?></td>
            <td width="35%" style="text-align:center;"><?php echo $po->address_Resource; ?></td>
        </tr>

    </table>

    <br>

    <table border="1" style="width: 100%" class="table" cellspacing="0" cellpadding="0">

        <tr>
            <td style="text-align:center; background-color:green" class="bold" width="25%">Task</td>
            <td width="25%" style="text-align:center; background-color:green" class="bold">Quantity</td>
            <td style="text-align:center; background-color:green" class="bold" width="25%">Rate (IDR)</td>
            <td style="text-align:center; background-color:green" class="bold" width="25%">Total (IDR)</td>
        </tr>
        <?php foreach ($pi as $p) { ?>
            <tr>
                <td style="text-align:left;" width="25%">
                    <!-- <?php echo $p->task; ?> -->
                </td>
                <td width="25%" style="text-align:center;">
                    <!-- <?php echo $p->qty; ?> -->
                </td>
                <td width="25%" style="text-align:center;">
                    <!-- <?php echo $p->rate; ?> -->
                </td>
                <td width="25%" style="text-align:center;">
                    <!-- <?php echo $p->amount; ?> -->
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <table border="1" style="width: 50%" align="right" cellspacing="0" cellpadding="0">

        <td width="25%" style="text-align:center; background-color:green" class="bold">Total Fee</td>
        <td width="25%" style="text-align:center;" class="bold">
            <!-- <?php echo $p->grand_Total; ?> -->
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
    <div style="text-align:center; margin-top:40px;">For questions concerning this purchase order, please contact <br>
        respective PM who issued this purchase order.
    </div>
    <div style="text-align:center;" class="bold">Thank you for your service
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>