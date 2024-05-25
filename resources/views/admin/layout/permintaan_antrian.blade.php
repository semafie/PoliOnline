@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card data_dokter">
        <div class="text-nowrap table-responsive p-3">
            <table id="myTable" class="table border-top table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>No Rm</th>
                  <th>Nama Pasien</th>
                  <th>nama_dokter</th>
                  <th>jam</th>
                  <th>tanggal</th>
                  <th>Tujuan Poli</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($Antrian as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_antrian }}</td>
                    <td>{{ $item->pasien->nama_pasien }}</td>
                    <td>@if (!empty($item->dokter->nama_dokter))
                      {{ $item->dokter->nama_dokter }}
                  @else
                      Belum Ada Dokter
                  @endif</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>@php
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
                  @endphp</td>
                    <td><p class="status_antrian">{{ $item->status }}</p>
                      {{-- <div class="btn-group "> --}}
                        
                      {{-- </div> --}}
                    </td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihdokter{{ $item->id }}">Pilih Dokter</button></td>
                  </tr>
                  <div class="modal fade" id="pilihdokter{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Pilih dokter</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin/permintaan_antrian/edit_dokter/{{ $item->id }}" method="POST">
                        @csrf
                        @method('put')
                        
                        <div class="modal-body">
                          <div class="dua_label">
                            <label for="input_id" class="form-label label_setengah">Jenis POli</label>
                            <label for="input_alamat" class="form-label label_setengah">NAma Dokter</label>
                        </div>
            
                        <div class="dua_input">
                          <input type="text" class="form-control input_setengah" readonly id="input_nama_poli1" name="input_alamat" placeholder="Masukkan Jenis Poli" aria-describedby="defaultFormControlHelp" value="@php
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
                          <select id="selectdokter" name="selectdokter" class="form-select">
                            
                            {{-- @php 
                            $firstChar = strtoupper(substr($item->no_antrian, 0, 1))
                            $poli = '';
                            switch ($firstChar) {
                                case 'A':
                                    $poli = 'Poli Umum';
                                    break;
                                case 'B':
                                    $poli = 'Poli Mata';
                                    break;
                                case 'C':
                                    $poli = 'Poli Kia';
                                    break;
                                default:
                                    $poli = 'Tidak Diketahui';
                            }
                             
                            @endphp --}}
                            @foreach ($Dokter as $dokter)
                            @if ($dokter->nama_poli === $poli )
                                <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }} </option> 
                                
                            @endif
                              
                            @endforeach

                          </select>
                            
                        </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                          
                          <button type="submit" class="btn btn-primary" data-bs-target="#ambildokter" data-bs-toggle="modal" data-bs-dismiss="modal">Pilih Dokter</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  {{-- <div class="modal fade" id="ambildokter{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Ambil dokter</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                  
                          <div class="text-nowrap table-responsive p-3">
                            <table id="tabeldokter" class="datatables-basic table border-top">
                              <thead>
                                <input type="text" class="form-control input_setengah" disabled id="input_nama_poli2" placeholder="Masukkan Nama Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->pasien->nama_pasien }}" />
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
                                  <td><button>pilih</button></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                        </div>
                      </div>
                    </div>
                  </div> --}}
                @endforeach
                
              </tbody>
            </table>
        </div>
    </div>
</div>


{{-- <script>
  // document.addEventListener('DOMContentLoaded', function () {
    // Temukan tombol "Cari Dokter"
    var buttonCariDokter = document.getElementById('haloooo');
    
    // Tambahkan event listener untuk klik tombol
    buttonCariDokter.addEventListener('click', function () {
        // Temukan input_nama_poli1 dan input_nama_poli2
        var inputPoli1 = document.getElementById('input_nama_poli1');
        var inputPoli2 = document.getElementById('input_nama_poli2');
        
        // Salin nilai dari input_nama_poli1 ke input_nama_poli2
        inputPoli2.value = inputPoli1.value;
    });
// });
</script> --}}

{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Temukan input untuk pencarian
    var searchInput = document.getElementById('input_nama_poli2');

    // Temukan tabel yang akan disaring
    var dataTable = document.getElementById('tabeldokter');

    // Tambahkan event listener untuk input pencarian (event input atau keyup)
    searchInput.addEventListener('input', function () {
      // Periksa apakah nilai input tidak kosong sebelum memicu pencarian
      if (searchInput.value.trim() !== '') {
        filterTable(searchInput.value.toLowerCase());
      } else {
        // Jika nilai input kosong, tampilkan kembali semua baris tabel
        resetTable();
      }
    });

    function filterTable(filter) {
      var rows = dataTable.getElementsByTagName('tr');

      // Loop melalui semua baris tabel
      for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var cellValue = cells[5].textContent || cells[5].innerText; // Mengambil nilai dari kolom ke-6

        // Periksa apakah nilai dalam kolom ke-6 cocok dengan nilai input pencarian
        if (cellValue.toLowerCase().indexOf(filter) > -1) {
          rows[i].style.display = '';
        } else {
          rows[i].style.display = 'none';
        }
      }
    }

    function resetTable() {
      var rows = dataTable.getElementsByTagName('tr');

      // Loop melalui semua baris tabel
      for (var i = 0; i < rows.length; i++) {
        rows[i].style.display = ''; // Tampilkan kembali semua baris tabel
      }
    }
  });
</script> --}}

<script>
  let table = new DataTable('#myTable');
  let table1 = new DataTable('#tabeldokter');
  </script>

<script>
  @if(Session::has('success_message'))

  Swal.fire({
    title: 'Berhasil ',
    text: 'Data dokter telah ditambahkan...',
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

  @elseif(Session::has('success_delete'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil di Dihapus',
    icon: 'success',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>
@endsection