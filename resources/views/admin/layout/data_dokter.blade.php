@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card data_dokter">
    <button type="button " class="btn   btn-primary btn_tambah" data-bs-toggle="modal" data-bs-target="#tambahdokter">Tambah</button>
    <!-- Button trigger modal -->
  
  <!-- Modal 1-->
  <div class="modal fade" id="tambahdokter" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">Tambah Data Dokter Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('tambah_dokter') }}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="dua_label">
                <label for="input_id" class="form-label label_setengah">ID Dokter</label>
                <label for="input_alamat" class="form-label label_setengah">alamat</label>
            </div>

            <div class="dua_input">
                <input type="text" class="form-control input_setengah" id="input_id" placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" disabled value="Dibuat Otomatis" />
                <input type="text" class="form-control input_setengah" id="input_alamat" name="input_alamat" placeholder="Masukkan Alamat" aria-describedby="defaultFormControlHelp" />
            </div>
            
            <div class="dua_label">
                <label for="input_nama" class="form-label label_setengah">Nama Dokter</label>
                <label for="select_kelamin" class="form-label label_setengah">Jenis_kelamin</label>
            </div>

            <div class="dua_input">
                <input type="text" class="form-control input_setengah" id="input_nama" name="input_nama" placeholder="Masukan Nama Dokter" aria-describedby="defaultFormControlHelp" />
                <select id="select_kelamin" name="select_kelamin" class="form-select select_setengah">
                  <option>Default select</option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="dua_label">
                <label for="input_nohp" class="form-label label_setengah">NO_telp</label>
                <label for="select_poli" class="form-label label_setengah">Jenis_poli</label>
            </div>

            <div class="dua_input">
                <input type="text" class="form-control input_setengah" id="input_nohp" name="input_nohp" placeholder="Masukan No Telp" aria-describedby="defaultFormControlHelp" />
                <select id="select_poli" name="select_poli" class="form-select select_setengah">
                  <option>Default select</option>
                  <option value="Poli Umum">Poli Umum</option>
                  <option value="Poli Gigi">Poli Gigi</option>
                  <option value="Poli Kia">Poli Kia</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Tambah Dokter</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
  
  {{-- Table --}}
    <div class="card-datatable table-responsive p-3">
        <table id="myTable" class="datatables-basic table border-top">
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
                <button type="button " class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#editdokter{{ $item->id }}">Edit</button>
                <form action="/admin/data_dokter/delete/{{ $item->id }}" method="POST">
                @csrf
                @method('delete')
                
                <button type="button " class="btn btn-danger " data-bs-toggle="modal" >Hapus</button>
              </form>
              </td>
            </tr>
            <div class="modal fade" id="editdokter{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel">Edit Data Dokter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/admin/data_dokter/edit/{{ $item->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  
                  <div class="modal-body">
                      <div class="dua_label">
                          <label for="input_id" class="form-label label_setengah">ID Dokter</label>
                          <label for="input_alamat" class="form-label label_setengah">alamat</label>
                      </div>
          
                      <div class="dua_input">
                          <input type="text" class="form-control input_setengah" id="input_id" disabled placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->id }}" />
                          <input type="text" class="form-control input_setengah" id="input_alamat" name="input_alamat" value="{{ $item->alamat }}" placeholder="Masukkan Alamat" aria-describedby="defaultFormControlHelp" />
                      </div>
                      
                      <div class="dua_label">
                          <label for="input_nama" class="form-label label_setengah">Nama Dokter</label>
                          <label for="select_kelamin" class="form-label label_setengah">Jenis_kelamin</label>
                      </div>
          
                      <div class="dua_input">
                          <input type="text" class="form-control input_setengah" id="input_nama" name="input_nama" value="{{ $item->nama_dokter }}" placeholder="Masukan Nama Dokter" aria-describedby="defaultFormControlHelp" />
                          <select id="select_kelamin" name="select_kelamin" class="form-select select_setengah">
                            <option>Default select</option>
                            <option value="Laki - Laki" {{ $item->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                          </select>
                      </div>
          
                      <div class="dua_label">
                          <label for="input_nohp" class="form-label label_setengah">NO_telp</label>
                          <label for="select_poli" class="form-label label_setengah">Jenis_poli</label>
                      </div>
          
                      <div class="dua_input">
                          <input type="text" class="form-control input_setengah" id="input_nohp" name="input_nohp" value="{{ $item->no_telp }}" placeholder="Masukan NO telp" aria-describedby="defaultFormControlHelp" />
                          <select id="select_poli" name="select_poli" class="form-select select_setengah">
                            <option>Default select</option>
                            <option value="Poli Umum" {{ $item->nama_poli == 'Poli Umum' ? 'selected' : '' }} >Poli Umum</option>
                            <option value="Poli Gigi" {{ $item->nama_poli == 'Poli Gigi' ? 'selected' : '' }}>Poli Gigi</option>
                            <option value="Poli Kia" {{ $item->nama_poli == 'Poli Kia' ? 'selected' : '' }}>Poli Kia</option>
                          </select>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary">Edit data Dokter</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            @endforeach
            
          </tbody>
        </table>
      </div>
      
</div>
</div>
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
  let table = new DataTable('#myTable');
  </script>
@endsection