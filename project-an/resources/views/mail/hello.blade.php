<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji {{ $periode }}</title>
</head>

<body>
    <div class="container">
        <h1 class="h1">Slip Gaji {{ $periode }}</h1>
        <p class="p">
            Salam hangat, saya berharap Anda dalam keadaan baik. Saya ingin menginformasikan bahwa slip
            gaji Anda untuk {{ $periode }} sudah siap dan terlampir dalam email ini.
        </p>
        <p class="p">
            Berikut ini adalah rincian gaji Anda:
        </p>
        <ol>
            <li>
                Nama: {{ $payroll->nama_karyawan }}
            </li>
            <li>
                Jabatan: {{ $payroll->jabatan }}
            </li>
            <li>
                Tanggal Pembayaran: {{ $payroll->created_at }}
            </li>
        </ol>
        <p>
            Mohon diperhatikan bahwa jumlah gaji bersih tersebut telah dipotong dengan pajak penghasilan dan potongan
            asuransi kesehatan sesuai dengan ketentuan perusahaan.
            Jika ada pertanyaan atau keberatan terkait slip gaji Anda, jangan ragu untuk menghubungi bagian keuangan
            perusahaan. Kami akan dengan senang hati membantu Anda.
            Terima kasih atas kerja keras dan dedikasi Anda. Kami menghargai kontribusi Anda dalam menjaga keberhasilan
            perusahaan. Semoga bulan yang menyenangkan dan sukses menanti Anda!
        </p>
        <p>
            Salam hormat,
        </p>
        <p>
            Dedi Kurnia
        </p>
        <p>
            Accounting
        </p>
        <p>
            Cihampelas Hotel
        </p>
    </div>
</body>

</html>
