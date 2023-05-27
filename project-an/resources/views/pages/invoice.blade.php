<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="/project-an/resources/css/style.css" media="all" />
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 19cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 150px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="./image/logo.jpeg">
        </div>
        <h1>SALARIES</h1>
        <div id="company" class="clearfix">
            <div>Cihampelas Hotel</div>
            <div>455 Foggy Heights,<br /> AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div>
        </div>
        <div id="project">
            {{-- <div><span>PROJECT</span> Website development</div> --}}
            <div><span>Nama</span> John Doe</div>
            <div><span>Jabatan</span> Front Desk</div>
            <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
            <div><span>DATE</span> August 17, 2015</div>
            <div><span>DUE DATE</span> September 17, 2015</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Keterangan</th>
                    {{-- <th class="desc">DESCRIPTION</th> --}}
                    <th colspan="1">PRICE</th>
                    <th class="service">Potongan</th>
                    <th>PRICE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Gaji Per Hari</td>
                    <td class="unit">$40.00</td>
                    <td class="service">Kasbon</td>
                    <td class="unit">$1,040.00</td>
                    <td class="unit"></td>
                </tr>
                <tr>
                    <td class="service">Hari kerja</td>
                    <td class="qty">14</td>
                </tr>
                <tr>
                    <td class="service">Lembur</td>
                    <td class="qty">14</td>
                    <td class="qty"></td>
                    <td class="qty"></td>
                    <td class="qty"></td>
                </tr>

                <tr>
                    <td>SUBTOTAL</td>
                    <td class="total">$5,200.00</td>
                    <td>SUBTOTAL</td>
                    <td class="total">$1,300.00</td>
                </tr>
                <tr>
                    <td>SISA HUTANG</td>
                    <td class="total">$1,300.00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">$6,500.00</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table style="margin-bottom: 50x">
            <thead>
                <tr>
                    <th class="unit">Dibuat</th>
                    <th class="unit">Diketahui</th>
                    <th class="unit">Disetujui</th>
                </tr>
            </thead>
        </table>
        <br><br><br><br><br><br><br><br>

        <table>
            <thead>
                <tr>
                    <th class="unit">Lily Permana Putra</th>
                    <th class="unit">Dedi Kurnia</th>
                    <th class="unit">Gerry Satria Muchtar</th>
                </tr>
            </thead>
        </table>
        <div>
            <span style="margin-left: 3cm">HRD</span>
            <span style="margin-left: 4.5cm">ACCOUNTING</span>
            <span style="margin-left: 4cm">DIREKTUR</span>
        </div>
        <hr>
    </main>
</body>

</html>
