<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
    font-family: 'Poppins';
    src: url('{{ public_path('fonts/Poppins-Regular.ttf') }}') format('truetype');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Poppins';
    src: url('{{ public_path('fonts/Poppins-Bold.ttf') }}') format('truetype');
    font-weight: bold;
    font-style: normal;
}
        *{
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }
        .container{
            box-sizing: border-box;
            /* padding: 0 20px; */
    width: 100%;
        }

        .container h1{
            font-size: 25px;
            font-weight: bold;
            color: #2F6FB8;
            margin-top: 20px;
            text-align: center;
        }
        .container h1 span{
            color: #68889C;
        }

        .container p{
            text-align: center
        }

        .garis{
            /* text-align: center */
            margin-left: 15%;
            height: 1px;
            background-color: grey;
            width: 70%;
        }

        .container h2{
            text-align: center;
            margin: 30px 0;
            font-size: 70px
        }

        .container h3{
            text-align: center
        }

        .terimakasih{
            font-size: 14px;
            padding: 0 30px;
        }
    </style>
</head>
<body>
    @forEach($Antrian as $item)
    <div class="container">
        <h1>Sip<span>PH.</span></h1>
        <p>sistem informasi No Antrian</p>
            <div class="garis"></div>
        <h2>{{ $item->no_antrian }}</h2>
        <div class="garis"></div>
        <h3>ke @php
            $firstChar = strtoupper(substr($item->no_antrian, 0, 1));
            $poli = '';
            switch ($firstChar) {
                case 'A':
                    $poli = 'Poli Umum';
                    break;
                case 'B':
                    $poli = 'Poli Gigi';
                    break;
                case 'C':
                    $poli = 'Poli Kia';
                    break;
                default:
                    $poli = 'Tidak Diketahui';
            }
            echo $poli;
        @endphp</h3>
        <div class="garis"></div>
        <p class="terimakasih">Terima kasih telah menggunakan situs SipPH. semoga hari anda menyenangkan</p>
    </div>
    @endforeach
    
</body>
</html>