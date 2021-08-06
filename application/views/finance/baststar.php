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
            height: 30px;
            width: 200px;
        }

        .mid {
            height: 200px;
            width: 400px;
        }

        .midd {
            height: 50px;
            width: 600px;
        }
    </style>
</head>

<body>
    <table border="0" style="width: 100%">
        <tr style="text-align:left;">
            <td><img src="<?= base_url('assets/img/sslogostar.jpg') ?>" class="mid" align="center"></td>
            <td width="30%">
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

    </table>
    <table border="0" style="width: 100%" align="center">
    <?php foreach ($b as $b) { ?>
        <tr>
            <td>
                <p style="text-align:center; font-size:x-large">
                    <b><u>BERITA ACARA</u></b><br>
                    <u><?php
                        
                        // $tgl = date('d/m/Y');
                        // echo $tgl;
                        ?></u>
                </p>


            </td>
        </tr>
    </table>
    <table border="0" style="width:100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td width="15%">
                Perihal <br>
                Jenis pekerjaan <br>
                Nama project <br>
                Nama perusahaan <br>
                PIC Client <br>
                Item 
            </td>
            <td width="85%" style="text-align:left; ">
                : <?= $b->perihal ?><br>
                : <?= $b->type_of_work ?><br>
                : <?= $b->project_name ?><br>
                : <?= $b->company_name ?><br>
                : <?= $b->pic_client ?><br>
                <?php foreach ($bi as $bi) { ?>
                : <?= $bi->qty ?> <?= $bi->Unit ?> of  <?= $bi->item ?> work<br>
                <?php } ?>
            </td>
            <!-- <?php foreach ($bi as $bi) { ?>
                <td width="85%" style="text-align:left; ">
                    : <?= $bi->perihal ?><br>
                    : <?= $bi->type_of_work ?><br>
                    : <?= $bi->project_name ?><br>
                    : <?= $bi->company_name ?><br>
                    : <?= $bi->pic_client ?><br>
                    : 1 file softcopy
                </td>
            <?php } ?> -->
        </tr>
    </table>

    <table border="0" style="width: 100%; margin-bottom: 25px;" class="table" cellspacing="0" cellpadding="0">


        <tr class="centerr">
            <td>Pada hari ini tanggal <?php
                                        $tgl = date('d/M/Y');
                                        echo $tgl;
                                        ?>, kami PT STAR Software Indonesia telah menyelesaikan
                seluruh pekerjaan tersebut untuk
                <?= $b->company_name ?>
                .
                Seluruh pekerjaan telah kami selesaikan dengan baik serta telah sesuai dengan
                <?= $b->type_of_work ?>
                /
                permintaan dari pihak
                <?= $b->company_name ?>
                .
                Demikian berita acara ini dibuat untuk kelengkapan proses administrasi.

        </tr>

    </table>
    <table border="0" style="width: 50%" cellspacing="0" cellpadding="0" align="left">
        <tr style="text-align:center; ">
            <td>Yogyakarta, <?php
                            $tgl = date('d/M/Y');
                            echo $tgl;
                            ?><br>
                Yang menyerahkan :</td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr style="text-align:center; ">
            <td><u><?php foreach ($user as $u) { ?>
                    <?= $u->full_Name ?>
                <?php } ?></u><br>
                <?= $b->first_party ?> </td>
        </tr>

    </table>
    <table border=" 0" style="width: 50%" cellspacing="0" cellpadding="0" align="right">
        <tr style="text-align:center; ">

            <td><br>Mengetahui : <br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr style="text-align:center; ">

            <td><u> <?= $b->pic_client ?></u><br>
                <?= $b->company_name ?>
            </td>
        </tr>
        <?php } ?>
    </table>


</body>
<script type=" text/javascript">
    window.print();
</script>

</html>