

@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card data_antrian">

      <div class="modal fade" id="caripasien" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="modalToggleLabel2">Pilih Pasien</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <div class="text-nowrap table-responsive p-3">
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
                    
            @foreach ($Pasien as $item)
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
                <button type="button " class="btn btn-warning " data-bs-toggle="modal" onclick="pilihPasien('{{ $item->id }}','{{ $item->nama_pasien }}' ,'{{ $item->id }}' ,'{{ $item->no_rm }}')">Pilih Pasien</button>
              
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
      

      <div class="modal fade" id="caridokter" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalToggleLabel2">Pilih Dokter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="text-nowrap table-responsive p-3"">
                <table id="halo" class="datatables-basic table border-top">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Nama Dokter</th>
                      <th>alamat</th>
                      <th>NO HP</th>
                      <th>Jenis kelamin</th>
                      <th>Jenis Poli</th>
                      <th>Aksi</th>
        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Dokter as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->nama_dokter }}</td>
                      <td>{{ $item->alamat }}</td>
                      <td>{{ $item->no_telp }}</td>
                      <td>{{ $item->jenis_kelamin }}</td>
                      <td>{{ $item->nama_poli }}</td>
                      <td class="button_intable">
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" onclick="pilihDokter('{{ $item->id }}','{{ $item->nama_dokter }}' , '{{ $item->nama_poli }}')">Pilih Dokter</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- <table id="halo" class="datatables-basic table border-top">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Nama Dokter</th>
                      <th>alamat</th>
                      <th>NO HP</th>
                      <th>Jenis kelamin</th>
                      <th>Jenis Poli</th>
                      <th>Aksi</th>
        
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($Dokter as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_dokter }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->nama_poli }}</td>  
                <td>

                    

                </td>
              </tr>       
              @endforeach                
            </tbody>
                </table> --}}
            </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-dismiss="modal">Back to first</button>
            </div>
          </div>
        </div>
      </div>
      <form action="/admin/data_antrian/tambah" method="POST">
        @csrf
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
                          <label for="input_namadokter" class="form-label label_setengah">Nama Dokter</label>
                          <label for="input_tanggal" class="form-label label_setengah">Tanggal</label>
                        </div>

                        <div class="dua_input"> 
                          
                          <input type="text" class="form-control input_plus_button"readonly id="input_namadokter" name="input_namadokter" placeholder="Masukan Nama Dokter" />
                    
                          <button type="button" class="btn btn-primary pilih_pasien" data-bs-toggle="modal" data-bs-target="#caridokter">Pilih Dokter</button>
                          <input type="date" class="form-control input_setengah" readonly id="input_tanggal" name="input_tanggal" placeholder="Masukkan Tanggal" aria-describedby="defaultFormControlHelp" />
                          </div>

                          <div class="select_poli input_ditengah">
                            <div class="">
                              <label for="Selectpoli" class="form-label label_setengah">Pilih Poli</label>
                              <input type="text" class="form-control input_setengah" readonly id="Selectpoli" name="Selectpoli" placeholder="Masukkan Poli" aria-describedby="defaultFormControlHelp" />
                              <input type="hidden" class="form-control input_setengah" readonly id="id_dokter" name="id_dokter" placeholder="Masukkan Poli" aria-describedby="defaultFormControlHelp" />
                              <input type="hidden" class="form-control input_setengah" readonly id="id_pasien" name="id_pasien" placeholder="Masukkan Poli" aria-describedby="defaultFormControlHelp" />
                            </div> 
                          </div>

                          NB = Jenis Poli akan disesuaikan dengan dokter yang dipilih
                          
                          <div class="button_tambah"> 
                            <button type="submit" class="btn btn-primary">Tambah No Antrian</button>
                          </div>
                        </form>

    </div>
</div>

<script>
  $(document).ready(function () {
    let table = new DataTable('#myTable');
    let table1 = new DataTable('#halo');
  })
 
  
  </script>

<script>
  @if(Session::has('success_message'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data Anda telah ditambahkan...',
    icon: 'success',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('success_edit'))
  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil di edit...',
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
  @elseif(Session::has('success_delete'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil di Dihapus',
    icon: 'success',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>

  <script>
    var menuPilihanDipilih = false;

    function pilihMenu() {
    if (!menuPilihanDipilih) {
        menuPilihanDipilih = true;
        document.getElementById("Selectpoli").disabled = true;
    }
    }
  </script>

  <script>
      function pilihDokter(id,namaDokter,namaPoli) {
      document.getElementById("input_namadokter").value = namaDokter;
      document.getElementById("Selectpoli").value = namaPoli;
      document.getElementById("id_dokter").value = id;

  // document.getElementById("input_namadokter").value = namaDokter;
}
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