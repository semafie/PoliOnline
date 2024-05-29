@extends('user.component.sidebare')
@section('content')
<div class="antrian_user">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_antrian">Tambah Antrian Baru</button>
    <div class="no_antrianmuu">

    @foreach($Antrianmu as $item)
    <div class="satu_antrian">
        <h1>{{ $item->no_antrian }}</h1>
        <h2>{{ $item->pasien->nama_pasien }}</h2>
        <h2>@php
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
      @endphp</h2>
        <h3 class="info_status_antrian">{{ $item->status }}</h3>
        <button type="button " class="btn btn-success btn_info" data-bs-toggle="modal" data-bs-target="#infoantrian{{ $item->id }}">info</button>
    </div>

    <div class="modal fade" id="infoantrian{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">info Antrian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="infoantrian">
              <h1>{{ $item->no_antrian }}</h1>
              <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Jenis Poli</label>
              <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="@php
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
          @endphp" />
              <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Dokter</label>
              <p class="{{ !empty($item->dokter) && !empty($item->dokter->nama_dokter) ? 'bg-green' : 'bg-red' }}">@if(!empty($item->dokter) && !empty($item->dokter->nama_dokter))
                {{ $item->dokter->nama_dokter }}
            @else
                Menunggu konfirmasi Pegawai
            @endif</p>
              <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Nama Pasien</label>
              <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="{{ $item->pasien->nama_pasien }}" />
              <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Status</label>
              <p class="info_status_antrian">{{ $item->status }}</p>
            </div>
            
          </div>
          <div class="modal-footer">
            <form action="/cetakantrians/{{ $item->id }}" method="POST" target="_blank">
            @csrf
            @method('put')
            <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Print</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach 
  </div>
    
    <div class="modal fade" id="caripasien" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel2">Pilih Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-nowrap table-responsive p-3"">
              <table id="myTable" class="table border-top table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NO rm</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>NIK</th>
                    <th>TTL</th>
                    <th>Aksi</th>
                    
                  </tr>
                </thead>
                <tbody>
                  
          @foreach ($Pasienakun as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->no_rm }}</td>
            <td>{{ $item->nama_pasien }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->usia }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->pekerjaan }}</td>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->tempat_lahir }},  {{ $item->tanggal_lahir }}</td>
            <td >
              <button type="button " class="btn btn-warning" data-bs-target="#tambah_antrian" data-bs-toggle="modal" onclick="pilihPasien('{{ $item->id }}','{{ $item->nama_pasien }}' ,'{{ $item->id }}' ,'{{ $item->no_rm }}')">Pilih Pasien</button>
            
            </td>
            
          </tr>
          
        @endforeach
          </tbody>
        </table>
              
          </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tambah_antrian" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">Tambah No Antrian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/user/no_antrian/tambah" method="POST">
          @csrf
          <div class="modal-body">
            <div class="dua_label">
              <label for="input_id_pasien" class="form-label label_setengah">ID pasien</label>
              <label for="input_norm" class="form-label label_setengah">No RM</label>
              </div>
              <div class="dua_input">
                
              <input type="text" class="form-control input_plus_button" readonly id="input_id_pasien" name="input_id_pasien" placeholder="Masukan id Pasien" aria-describedby="defaultFormControlHelp" />
              <button type="button" class="btn btn-primary pilih_pasien" data-bs-toggle="modal" data-bs-target="#caripasien">Pilih Pasien</button>
              <input type="text" class="form-control input_setengah"readonly id="input_norm" name="input_norm" placeholder="Masukkan No RM" aria-describedby="defaultFormControlHelp" />
              </div>
              <div class="dua_label">
                <label for="input_nama_pasien" class="form-label label_setengah">Nama Pasien</label>
                <label for="input_jam" class="form-label label_setengah">Jam</label>
              </div>
              
              <div class="dua_input">
                <input type="text" class="form-control input_setengah_awal" readonly id="input_nama_pasien" name="input_nama_pasien" placeholder="Masukan Nama Pasien" aria-describedby="defaultFormControlHelp" />
                <input type="text" class="form-control input_setengah" readonly id="input_jam" name="input_jam" placeholder="Masukan Jam" aria-describedby="defaultFormControlHelp" />
              </div>
              <div class="dua_label" id="inputdokter">
                <label for="defaultSelect" class="form-label label_setengah">Pilih Poli</label>
                <label for="input_tanggal" class="form-label label_setengah">Tanggal</label>
              </div>

              <div class="dua_input"> 
                
                <div class=" input_setengahs">
                  <select id="select_poli" name="select_poli" class="form-select ">
                    <option>Default select</option>
                    <option value="Poli Umum">Poli Umum</option>
                    <option value="Poli Gigi">Poli Gigi</option>
                    <option value="Poli Kia">Poli Kia</option>
                  </select>
                </div>
                <input type="date" class="form-control input_setengahss" readonly id="input_tanggal" name="input_tanggal" placeholder="Masukkan Tanggal" aria-describedby="defaultFormControlHelp" />
                </div>


                NB = Dokter akan dipilihkan oleh pegawai pendaftaran
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Tambah No Antrian</button>
            </div>
          </form>
          </div>
          
        </div>
      </div>

      





    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {
     // Pengubahan warna latar belakang elemen dengan kelas .status_antrian
     const statusElements = document.querySelectorAll('.info_status_antrian');
     
     statusElements.forEach((statusElement) => {
         const statusText = statusElement.textContent.trim();

         if (statusText === 'menunggu') {
             statusElement.style.backgroundColor = '#FF1E1E'; // Warna merah
         } else if (statusText === 'bersiap') {
             statusElement.style.backgroundColor = '#D5E42C'; // Warna kuning
         } else if (statusText === 'masuk') {
             statusElement.style.backgroundColor = '#45E02C'; // Warna hijau
         }
     });

     // Inisialisasi DataTable
     let table = new DataTable('#halo');
 });
</script>


<script>
  let table = new DataTable('#halo');
</script>


<script>
    @if(Session::has('berhasil_login'))
  
    Swal.fire({
      title: 'Berhasil Login',
      text: 'Anda telah berhasil Login...',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('success_message'))
    Swal.fire({
      title: 'Berhasil',
      text: 'Data antrian berhasil ditambahkan tunggu konfirmasi dokter ya',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('pasien_sudah_daftar'))
  
    Swal.fire({
      title: 'Gagal tambah antrian',
      text: 'Setiap pasien hanya boleh mendaftar 1 kali sehari',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
    @endif
    </script>

<script>
  function pilihPasien(id,namaPasien, id_Pasien, No_rm) {
  document.getElementById("input_nama_pasien").value = namaPasien;
  document.getElementById("input_id_pasien").value = id_Pasien;
  document.getElementById("input_norm").value = No_rm;
  document.getElementById("id_pasien").value = id;
}
</script>

<script>
  function updateJam() {
  // Mendapatkan waktu saat ini
  var waktuSaatIni = new Date();

  // Mengambil jam, menit, dan detik
  var jam = waktuSaatIni.getHours();
  var menit = waktuSaatIni.getMinutes();
  var detik = waktuSaatIni.getSeconds();

  // Format waktu ke dalam bentuk hh:mm:ss
  var waktuFormat = pad(jam, 2) + ":" + pad(menit, 2) + ":" + pad(detik, 2);

  // Menetapkan nilai waktu ke input
  document.getElementById("input_jam").value = waktuFormat;
}

// Memanggil fungsi updateJam() setiap detik
setInterval(updateJam, 900);

// Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
function pad(number, length) {
  var str = '' + number;
  while (str.length < length) {
      str = '0' + str;
  }
  return str;
}
</script>

<script>
var tanggalSaatIni = new Date();

// Mengambil tahun, bulan, dan tanggal
var tahun = tanggalSaatIni.getFullYear();
var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
var tanggal = tanggalSaatIni.getDate();

// Format tanggal ke dalam bentuk yyyy-mm-dd
var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);

// Menetapkan nilai tanggal ke input
document.getElementById("input_tanggal").value = tanggalFormat;

// Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}
</script>
@endsection