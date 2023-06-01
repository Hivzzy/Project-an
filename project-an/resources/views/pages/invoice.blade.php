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

        h2 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.0em;
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
        <h2 class="">PAYROLL SHEET</h2>
        <div id="company" class="clearfix">
            <div>&nbsp;</div>
            <div><b>SALARIES</b></div>
            <div>{{ $periode }}</div>
        </div>
        <div id="project">
            {{-- <div><span>PROJECT</span> Website development</div> --}}
            <div><span>Nama</span>{{ $data_payroll->nama_karyawan }}</div>
            <div><span>Jabatan</span>{{ $data_payroll->jabatan }}</div>
            <div><span>Email</span><a href="mailto:{{ $data_payroll->email }}">{{ $data_payroll->email }}</a></div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Keterangan</th>
                    {{-- <th class="desc">DESCRIPTION</th> --}}
                    <th colspan="1"></th>
                    <th class="service">Potongan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Gaji Per Hari</td>
                    <td class="unit">Rp {{ number_format($data_payroll->gaji_perhari, 0, ',', '.') }}</td>
                    <td class="service">Kasbon</td>
                    <td class="unit">Rp {{ number_format($data_payroll->kasbon, 0, ',', '.') }}</td>
                    <td class="unit"></td>
                </tr>
                <tr>
                    <td class="service">Hari kerja</td>
                    <td class="qty">{{ $data_payroll->hari_kerja }}</td>
                </tr>
                <tr>
                    <td class="service">Lembur</td>
                    <td class="qty">Rp {{ number_format($data_payroll->tambahan, 0, ',', '.') }}</td>
                    <td class="qty"></td>
                    <td class="qty"></td>
                    <td class="qty"></td>
                </tr>

                <tr>
                    <td class="service">Total Pendapatan</td>
                    <td class="total">Rp {{ number_format($data_payroll->gaji_kotor, 0, ',', '.') }}</td>
                    <td class="service">Total Potongan</td>
                    <td class="total">Rp {{ number_format($data_payroll->kasbon, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="service">Sisa Hutang</td>
                    <td class="total">Rp {{ number_format(0, 0, '.') }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">Terima Bersih</td>
                    <td class="grand total">Rp {{ number_format($data_payroll->gaji_bersih, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table style="margin-bottom: 50x">
            <div>
                <span style="margin-left: 3cm">Dibuat</span>
                <span style="margin-left: 4.7cm">Diketahui</span>
                <span style="margin-left: 4.6cm">Disetujui</span>
            </div>
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
