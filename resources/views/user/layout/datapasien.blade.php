@extends('user.component.sidebare')
@section('content')
<div class="data_pasien">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">Tambah Pasien</button>
    <div class="text-nowrap table-responsive pt-0">
        <table id="halo" class="table border-top table-hover">
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
                      <td><button type="button " class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#editpasien{{ $item->id }}">Edit</button>
                      </td>
                    </tr>

                    <div class="modal fade" id="editpasien{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalToggleLabel">Edit Data Pasien</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="/user/pasien/edit/{{ $item->id }}" method="POST">
                            @csrf
                            @method('PUT')
                          <div class="modal-body">
                              <div class="dua_label">
                                  <label for="input_id" class="form-label label_setengah">ID Pasien</label>
                                  <label for="input_alamat" class="form-label label_setengah">alamat</label>
                              </div>
                  
                              <div class="dua_input">
                                  <input type="text" class="form-control input_setengah" id="input_id" disabled aria-describedby="defaultFormControlHelp" value="{{ $item->id }}" />
                                  <input type="text" class="form-control input_setengah" id="input_alamat" name="input_alamat" placeholder="Masukkan No RM" aria-describedby="defaultFormControlHelp" value="{{ $item->alamat }}" />
                              </div>
                              
                              <div class="dua_label">
                                  <label for="input_nama" class="form-label label_setengah">Nama Pasien</label>
                                  <label for="select_kelamin" class="form-label label_setengah">Jenis_kelamin</label>
                              </div>
                  
                              <div class="dua_input">
                                  <input type="text" class="form-control input_setengah" id="input_nama" name="input_nama" placeholder="Masukan id Pasien" aria-describedby="defaultFormControlHelp " value="{{ $item->nama_pasien }}" />
                                  <select id="select_kelamin" name="select_kelamin" class="form-select select_setengah">
                                    <option>Default select</option>
                                    <option value="Laki - Laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki - Laki</option>
                                    <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                  </select>
                              </div>
          
                              <div class="dua_label">
                                  <label for="input_nik" class="form-label label_setengah">NIK</label>
                                  <label for="input_pekerjaan" class="form-label label_setengah">Pekerjaan</label>
                              </div>
                  
                              <div class="dua_input">
                                  <input type="text" class="form-control input_setengah" id="input_nik" name="input_nik" placeholder="Masukan id Pasien" aria-describedby="defaultFormControlHelp" value="{{ $item->nik }}" />
                                  <input type="text" class="form-control input_setengah" id="input_pekerjaan" name="input_pekerjaan" placeholder="Masukkan No RM" aria-describedby="defaultFormControlHelp" value="{{ $item->pekerjaan }}" />
                              </div>
                  
                              <div class="dua_label">
                                  <label for="input_usias" class="form-label label_setengah">usia</label>
                                  <label for="input_tanggal_lahirs" class="form-label label_setengah">Tanggal Lahir</label>
                              </div>
                  
                              <div class="dua_input">
                                  <input type="text" class="form-control input_setengah" readonly id="input_usias" name="input_usias" placeholder="Masukan id Pasien" aria-describedby="defaultFormControlHelp" value="{{ $item->usia }}"/>
                                      <input class="form-control input_setengah" id="input_tanggal_lahirs" name="input_tanggal_lahirs" onchange="hitungUsias()" type="date" id="input_tanggal" value="{{ $item->tanggal_lahir }}" />
                              </div>
          
                              <div class="satu_input_ditengah">
                                <label for="input_tempat_lahirs" class="form-label">Tempat LAhir</label>
                              </div>
          
                              <div class="satu_input_ditengah">
                                
                                
                                <input type="text" class="form-control input_setengah" id="input_tempat_lahirs" name="input_tempat_lahirs"  placeholder="Masukan id Pasien" aria-describedby="defaultFormControlHelp" value="{{ $item->tempat_lahir }}"/>
                              </div>

                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#modalToggle2">Edit Data Pasien</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">Tambah Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="button_pasiennik">
              {{-- <form action="/user/pasien/carinik" method="POST">
                @csrf --}}
                <input type="text" class="form-control input_nik" id="input_niks" name="input_niks" placeholder="Masukkan NIK" aria-describedby="defaultFormControlHelp" value="" />
                <button onclick="searchByNIK()" type="submit" id="carinikbtn" class="btn btn-primary" disabled>Cari NIK</button>
              {{-- </form>       --}}
              <button class="btn btn-primary" data-bs-target="#tambahpasien" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah Pasien Baru</button>
              
            </div>
            <p id="resultMessage" class="hidden">data tidak ditemukan</p>
            <div class="hidden" id="tabel_opo">
              <div class="text-nowrap table-responsive p-3">
                <table id="tabel_nik_tercari" class="table border-top table-hover">
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
                      <th>aksi</th>
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
                      <td>
                        <form action="/user/pasien/ambil_pasien/{{ $item->id }}" method="post">
                          @csrf
                          @method('put')
                        <button type="submit" class="btn btn-success" >Ambil Pasien</button>
                        <input type="text" class="form-control input_nik" hidden id="input_user_id" name="input_user_id" placeholder="Masukkan ID" aria-describedby="defaultFormControlHelp" value="{{ $getRecord->id }}" />
                      </form>
                      </td>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
            
          </div>
          <div class="modal-footer">
              
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tambahpasien" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">Tambah Data Pasien Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('user_tambah_pasien') }}" method="POST">
            @csrf
          <div class="modal-body">
              <div class="dua_label">
                  <label for="input_id" class="form-label label_setengah">NO rm</label>
                  <label for="input_alamat" class="form-label label_setengah">alamat</label>
              </div>
  
              <div class="dua_input">
                  <input type="text" class="form-control input_setengah" disabled id="input_id" name="input_id" placeholder="Otomatis dibuat sistem" aria-describedby="defaultFormControlHelp" value="" />
                  <input type="text" class="form-control input_setengah" id="input_alamat" name="input_alamat"  placeholder="Masukkan alamat" aria-describedby="defaultFormControlHelp"  />
              </div>
              
              <div class="dua_label">
                  <label for="input_nama" class="form-label label_setengah">Nama Pasien</label>
                  <label for="select_kelamin" class="form-label label_setengah">Jenis_kelamin</label>
              </div>
  
              <div class="dua_input">
                  <input type="text" class="form-control input_setengah" id="input_nama" name="input_nama"  placeholder="Masukan nama Pasien" aria-describedby="defaultFormControlHelp" />
                  <select id="select_kelamin" name="select_kelamin" class="form-select select_setengah">
                    <option>Default select</option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
              </div>

              <div class="dua_label">
                  <label for="input_nik" class="form-label label_setengah">NIK</label>
                  <label for="input_pekerjaan" class="form-label label_setengah">Pekerjaan</label>
              </div>
  
              <div class="dua_input">
                  <input type="text" class="form-control input_setengah" id="input_niks" name="input_niks"  placeholder="Masukan nik Pasien" aria-describedby="defaultFormControlHelp" />
                  <input type="text" class="form-control input_setengah" id="input_pekerjaan" name="input_pekerjaan"  placeholder="Masukkan pekerjaan" aria-describedby="defaultFormControlHelp" />
              </div>
  
              <div class="dua_label">
                  <label for="input_usia" class="form-label label_setengah">USia</label>
                  <label for="input_tanggal_lahir" class="form-label label_setengah">Tanggal Lahir</label>
              </div>
  
              <div class="dua_input">
                  <input type="text" class="form-control input_setengah" readonly id="input_usia" name="input_usia" placeholder="Masukan usia Pasien" aria-describedby="defaultFormControlHelp" />
                      <input class="form-control input_setengah" type="date" value="" id="input_tanggal_lahir" name="input_tanggal_lahir" onchange="hitungUsia()" />
              </div>

              <div class="satu_input_ditengah">
                <label for="input_tempat_lahir" class="form-label">Tempat LAhir</label>
              </div>

              <div class="satu_input_ditengah">
                <input type="text" class="form-control input_setengah" id="input_id_user" name="input_id_user" hidden placeholder="Masukan id pasien" aria-describedby="defaultFormControlHelp" value="{{ $getRecord->id }}"/>
                <input type="text" class="form-control input_setengah" id="input_tempat_lahir" name="input_tempat_lahir" placeholder="Masukan tempat lahir" aria-describedby="defaultFormControlHelp" />
              </div>
                
              NB : usia akan otomatis terisi setelah mengisi tanggal lahir
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Tambah Pasien</button>
          </div>
        </form>
        </div>
      </div>
    </div>

      <div class="modal fade" id="caripasien" aria-hidden="true" aria-labelledby="modalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalToggleLabel2">Pasien dengan nik</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              
            </div>
            
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-dismiss="modal">Tambah Pasien ini ke akunmu</button>
            </div>
          </div>
        </div>
      </div>
</div>

<script>
    let table = new DataTable('#halo');
</script>

<script>
        // Get the input field and button
        var inputNik = document.getElementById('input_niks');
        var cariNikBtn = document.getElementById('carinikbtn');

        // Function to check input value and enable/disable button
        function checkInput() {
        if (inputNik.value.trim().length === 16) {
            cariNikBtn.disabled = false;
        } else {
            cariNikBtn.disabled = true;
        }
}

        // Add event listener to input field
        inputNik.addEventListener('input', checkInput);

        // Initial check
        checkInput();
</script>

<script>s

<script>
  function hitungUsia() {
      var inputTanggalLahir = document.getElementById("input_tanggal_lahir").value;
      var tanggalLahir = new Date(inputTanggalLahir);
      var sekarang = new Date();
      var selisihTahun = sekarang.getFullYear() - tanggalLahir.getFullYear();
      var bulanSekarang = sekarang.getMonth();
      var bulanTanggalLahir = tanggalLahir.getMonth();
  
      if (bulanSekarang < bulanTanggalLahir || (bulanSekarang === bulanTanggalLahir && sekarang.getDate() < tanggalLahir.getDate())) {
          selisihTahun--;
      }
  
      document.getElementById("input_usia").value = selisihTahun;
  }

  function hitungUsias() {
      var inputTanggalLahir = document.getElementById("input_tanggal_lahirs").value;
      var tanggalLahir = new Date(inputTanggalLahir);
      var sekarang = new Date();
      var selisihTahun = sekarang.getFullYear() - tanggalLahir.getFullYear();
      var bulanSekarang = sekarang.getMonth();
      var bulanTanggalLahir = tanggalLahir.getMonth();
  
      if (bulanSekarang < bulanTanggalLahir || (bulanSekarang === bulanTanggalLahir && sekarang.getDate() < tanggalLahir.getDate())) {
          selisihTahun--;
      }
  
      document.getElementById("input_usias").value = selisihTahun;
  }
  </script>
<script>
  @if(Session::has('gagal_diambil'))

  Swal.fire({
    title: 'Data gagal diambil',
    text: 'Data pasien tersebut sudah di klaim akun lain',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('success_edit'))
  Swal.fire({
    title: 'Berhasil',
    text: 'Data pasien tersebut berhasil di klaim',
    icon: 'success',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('pasien_banyak'))

  Swal.fire({
    title: 'Pasien terlalu Banyak',
    text: 'Setiap akun hanya boleh memiliki 5 pasien',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('tambah_pasien'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Anda Berhasil menambahkan pasien',
    icon: 'success',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('nik_ada'))

  Swal.fire({
    title: 'Gagal ',
    text: 'Nik tersebut sudah terdaftar di database',
    icon: 'error',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>


@endsection