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
            padding: 20px;
        }
    .judul1{
        text-align: center;
        margin-top: 20px;
        font-size: 35px;
        color: #374987;
    }
    .judul2{
        text-align: center;
        margin-bottom: 30px;
        font-size: 35px;
        color: #374987;
    }

    .judul2 span{
        color: #7889C7;
    }

    .container p{
        font-size: 18px
    }
    .container .tanggal{
        margin-bottom: 10px
    }

    .container h3{
        font-size: 15px;
    }
    .container .atasttd{
        /* display: flex;
        width: 100%;
        justify-content: end;
        padding-right: 20px */
    }

    .container table{
        margin-bottom: 100px;
    }
    .container .atasttd .ttd h3{
        /* font-family: "Poppins"; */
        text-align: right;
        font-weight: normal;
    }

    .siph{
        margin-right: 20px;
    }
    .an{
        margin-right: 40px;
    }

    .jember{
        margin-right: 8px;
    }

    #halo {
  width: 100%;
}

#halo thead  {
  background-color: #374987;
  height: 50px;
  color: white;
  border: 2px solid white;
}
#halo thead th {
    font-size: 15px;
    padding: 5px 10px ;
    border-radius: 4px;
    font-weight: normal;
}



/* Optional: Hover effect */
/* #halo tbody tr:hover {
  background-color: #f0f0f0;
} */
</style>
</head>
<body>
    <div class="container">
        <h1 class="judul1">Laporan Antrian</h1>
        <h2 class="judul2" >Sip<span>PH.</span></h2>
        
        <p class="tanggal">tanggal : {{ $tanggal }}</p>
        <table id="halo" class="table border-top table-hover">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>No Antrian</th>
                  <th>Nama Pasien</th>
                  <th>Nama Dokter</th>
                  <th>jam</th>
                  <th>tanggal</th>
                  <th>Tujuan Poli</th>
                  <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($antrian as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->no_antrian }}</td>
                        <td>{{ $item->pasien->nama_pasien }}</td>
                        <td>{{ $item->dokter->nama_dokter }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->dokter->nama_poli }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="atasttd">
            <div class="ttd">
                <h3 class="siph">TTD P. Pendaftaran Menyetujui</h3>
                
        <h3 class="jember">Jember, ..........................................</h3>
        <br>
                <br>
                <br>
                <br>
        <h3 class="an">a. n. ........................</h3>
            </div>
        </div>
        
        
    </div>
    
</body>
</html>