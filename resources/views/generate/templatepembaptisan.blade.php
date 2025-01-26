<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Sertifikat Pembaptisan</title>
        
        <style>
            @page {
                size: A4 landscape;
                margin: 5mm;
            }
            body {
                font-family: 'Georgia', serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }
            .certificate-container {
                width: 92%;
                min-height: 100vh;
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            .certificate {
                display: flex;
                flex-direction: column;
                justify-content: center;
                border: 10px double #000;
                padding: 30px;
                width: 100%;
                height: auto;
                text-align: center;
                background: #fff;
                box-sizing: border-box;
            }
            .certificate h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin: 10px 0;
                width: 100%;
                color: #2c3e50;
            }
            .certificate .subtitle {
                font-size: 1.2rem;
                font-style: italic;
                margin-bottom: 20px;
                color: #7f8c8d;
            }
            .certificate h2 {
                font-size: 2rem;
                font-weight: bold;
                color: #34495e;
                margin: 20px 0;
            }
            .certificate p {
                font-size: 1rem;
                line-height: 1.6;
                margin: 5px 0;
            }
            .certificate .details {
                margin-top: 30px;
                font-size: 1rem;
                color: #34495e;
            }
            .certificate .details h3 {
                font-size: 1.2rem;
                margin-bottom: 5px;
            }
            .signature {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 80px;
            }
            span {
                display: block;
                margin-top: 90px;
                border-top: 2px solid #000;
                padding-top: 5px;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <div class="certificate-container">
            <div class="certificate">

                <h1>SERTIFIKAT PEMBAPTISAN</h1>
                <p class="subtitle">“Karena itu pergilah, jadikanlah semua bangsa murid-Ku dan baptislah mereka dalam nama Bapa dan Anak dan Roh Kudus.” (Matius 28:19)</p>
                <p>Dengan hormat kami menyatakan bahwa:</p>
                <h2>{{ $participantName }}</h2>
                <p>Telah menerima sakramen pembaptisan suci pada:</p>
                <h2>{{ \Carbon\Carbon::parse($baptistDate)->format('d M Y') }}</h2>
                
                <div class="details">
                    <h3>Tempat Pembaptisan:</h3>
                    <p>GBI Sungai Yordan</p>
                </div>
                
                <div class="signature">
                    <table style="width: 100%; table-layout: fixed;">
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                <p>Gembala Sidang</p>
                                <span>Nama Gembala</span>
                            </td>
                            <td style="text-align: center; width: 50%;">
                                <p>Saksi Baptis</p>
                                <span>Nama Saksi</span>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </body>
</html>

