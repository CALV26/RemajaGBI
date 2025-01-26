<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
    <style>
        @page {
            size: A4 landscape; /* Mengatur ukuran halaman menjadi A4 landscape */
            margin: 5mm;
        }
        body {
            font-family: 'Georgia', serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .certificate {
            border: 10px double #2c3e50; /* Border luar sertifikat */
            padding: 40px;
            padding-top: 100px;
            width: 90.5%;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            text-align: center;
            position: relative;
            min-height: 100vh;
            height: auto;
        }
        .certificate h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: #2c3e50;
            text-transform: uppercase;
        }
        .certificate p {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #555;
        }
        .certificate h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #34495e;
            margin: 20px 0;
        }
        .certificate h3 {
            font-size: 2rem;
            font-weight: bold;
            color: #7f8c8d;
            margin: 10px 0;
        }
        .certificate .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 155px;
        }
        .footer div {
            text-align: center;
            font-size: 1rem;
        }
        .footer span {
            display: block;
            margin-top: 50px;
            border-top: 2px solid #000;
            padding-top: 5px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .ribbon {
            position: absolute;
            top: 15px;
            left: auto;
            transform: translateX(-50%);
            background: #2c3e50;
            color: #fff;
            font-size: 1rem;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="ribbon">Sertifikat Keikutsertaan</div>
        <h1>SERTIFIKAT</h1>
        <p>Dengan ini diberikan kepada:</p>
        <h2>{{ $participantName }}</h2>
        <p>Atas partisipasinya dalam seminar:</p>
        <h3>{{ $seminarName }}</h3>
        <p>Pada tanggal: {{ \Carbon\Carbon::parse($eventDate)->format('d M Y') }}</p>
        <div class="footer">
            <table style="width: 100%; table-layout: fixed;">
                <tr>
                    <td style="text-align: center; width: 50%;">
                        <p>Gembala Sidang</p>
                        <span>Nama Gembala</span>
                    </td>
                    <td style="text-align: center; width: 50%;">
                        <p>Ketua Panitia</p>
                        <span>Nama Ketua</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
