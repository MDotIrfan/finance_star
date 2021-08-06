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
            height: 150px;
            width: 150px;
        }

        .midd {
            height: 50px;
            width: 600px;
        }
    </style>
</head>

<body>
    <table border="0" style="width:100%;" class="table" cellspacing="0" cellpadding="0">


        <tr style="text-align:right;">
            <td width=" 40%">
                Citylofts Sudirman, Unit 1512<br>
                Jl. K.H. Mas Mansyur No.121<br>
                Jakarta 10220,<br>
                Indonesia<br>
                +(62-21) 2991-8933<br>
                +(62-21) 2555-8767<br>
                info@kodegiri.com

            </td>
            <td><img src="<?= base_url('assets/img/Logokdgr.jpg') ?>" class="mid"></td>
            <td width="45%" style="text-align:left;">
                Jalan Kenanga No. 126B,<br>
                Sinduadi, Mlati, Sleman,<br>
                Yogyakarta 55284,<br>
                Indonesia<br>
                +(62-274) 623-971<br>
                +(62-81) 333 933 132<br>
                cycas@kodegiri.com
            </td>

        </tr>
    </table>
    <table border="0" style="width: 100%">
        <tr>
            <td style="text-align: center;">
                | Software |Website |Mobile Apps | Information System |</td>
            </td>
        </tr>
    </table>
    <table border="0" style="width: 100%">
        <tr>
            <td>
                <p style="text-align:center; font-size:x-large">
                    <b><u>BERITA ACARA</u></b><br>
                    <u><?php
                            $tgl = date('d/m/Y');
                            echo $tgl;
                            ?></u>
                </p>


            </td>
        </tr>
    </table>
    <table border="0" style="width:100%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0">


        <tr>
            <td width="20%">
                Perihal <br>
                Jenis pekerjaan <br>
                Nama project <br>
                Nama perusahaan <br>
                PIC Client <br>
                Item
            </td>
            <td width="80%" style="text-align:left; ">
            <?php foreach ($b as $b) { ?>
                    : <?= $b->perihal ?><br>
                    : <?= $b->type_of_work ?><br>
                    : <?= $b->project_name ?><br>
                    : <?= $b->company_name ?><br>
                    : <?= $b->pic_client ?><br>
                    <?php foreach ($bi as $bi) { ?>
                : <?= $bi->qty ?> <?= $bi->Unit ?> of  <?= $bi->item ?> work<br>
                <?php } ?>
            </td>
            
            <!-- 
                
        </tr>
    </table>
    <div>
        <table border="1" style="width: 80%; margin-bottom: 15px;" class="table" cellspacing="0" cellpadding="0" align="center">


            <tr class="bold">
                <td width="40%" style="text-align:center; " class="">Item</td>
                <td width="30%" style="text-align:center; " class="bold">QTY</td>
                <td width="30%" style="text-align:center; " class="bold">Check (√/X)</td>
            </tr>
            <tr>
                <td width="40%" style="text-align:center;height:30px">
                    a
                </td>
                <td width="30%" style="text-align:center; ">
                    a
                    Unit
                </td>
                <td width="30%" style="text-align:center; ">
                    fasa
                </td>
            </tr>
            <!-- <?php foreach ($bii as $bii) { ?> -->
            <tr>
                <td width="40%" style="text-align:center; ">
                    <!-- <?= $bii->item ?> -->
                </td>
                <td width="30%" style="text-align:center; ">
                    <!-- <?= $bii->Unit ?> -->
                    Unit
                </td>
                <td width="30%" style="text-align:center; ">
                    <!-- <?= $bii->status ?> -->
                </td>
            </tr>
            <!-- <?php } ?> -->
        </table>
    </div>
    <table border="0" style="width: 100%; margin-bottom: 25px;" class="table" cellspacing="0" cellpadding="0">


        <tr class="centerr">

            <td>Pada hari ini tanggal <?php
                                        $tgl = date('d M Y');
                                        echo $tgl;
                                        ?>, kami PT Kode Evolusi Bangsa telah menyelesaikan seluruh pekerjaan tersebut
                untuk
                <?= $b->project_name ?>.

                Seluruh pekerjaan telah kami selesaikan dengan baik serta telah sesuai dengan permintaan dari pihak <?= $b->company_name ?>.
                Demikian berita acara ini dibuat untuk kelengkapan proses administrasi.
        </tr>

    </table>
    <table border="0" style="width: 50%" cellspacing="0" cellpadding="0" align="left">
        <tr style="text-align:center; ">
            <td>Yogyakarta, <?php
                            $tgl = date('d M Y');
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

            <td>Mengetahui : <br><br></td>
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
                <?= $b->company_name ?></td>
        </tr>
        <tr style="text-align:center; ">

            <td><u>
                    <!-- <?= $bi->pic_client ?> -->
                </u><br>
                <!-- <?= $bi->company_name ?> -->
            </td>
        </tr>

    </table>

    <?php } ?>
</body>
<script type=" text/javascript">
    window.print();
</script>

</html>