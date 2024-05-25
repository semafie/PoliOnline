@extends('admin.template.template-header-poli');
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="text-nowrap table-responsive p-3">
      <table id="keke" class="table border-top table-hover">
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
          @foreach ($Antrian_masuk as $items)
                  <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->no_antrian }}</td>
                    <td>{{ $items->pasien->nama_pasien }}</td>
                    <td>{{ $items->dokter->nama_dokter }}</td>
                    <td>{{ $items->jam }}</td>
                    <td>{{ $items->tanggal }}</td>
                    <td>{{ $items->dokter->nama_poli }}</td>
                    <td><button type="button" class="btn status_antrians dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ $items->status }}</button>
                      <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#status_masuk{{ $items->id }}">Ganti status</a> </li>
                      </ul></td>
                  </tr>
                  <div class="modal fade" id="status_masuk{{ $items->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Edit Status</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin_poli/edit/{{ $items->id }}" method="POST">
                          @csrf
                          @method('PUT')
                        <div class="modal-body">
                          <input type="hidden" class="form-control input_setengah" id="input_poli" name="input_poli"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $items->dokter->nama_poli }}" />
                          <input type="hidden" class="form-control input_setengah" id="input_status" name="input_status"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $items->status }}" />
                          <select id="select_status" name="select_status" class="form-select select_setengah">
                            
                            <option value="selesai" {{ $items->status == 'masuk' ? 'selected' : '' }}>selesai</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Edit status</button>
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

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="text-nowrap table-responsive p-3">
      <table id="keke" class="table border-top table-hover">
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
          @foreach ($Antrian_bersiap as $itemss)
                  <tr>
                    <td>{{ $itemss->id }}</td>
                    <td>{{ $itemss->no_antrian }}</td>
                    <td>{{ $itemss->pasien->nama_pasien }}</td>
                    <td>{{ $itemss->dokter->nama_dokter }}</td>
                    <td>{{ $itemss->jam }}</td>
                    <td>{{ $itemss->tanggal }}</td>
                    <td>{{ $itemss->dokter->nama_poli }}</td>
                    <td><button type="button" class="btn status_antrians dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ $itemss->status }}</button>
                      <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#status_bersiap{{ $itemss->id }}">Ganti status</a> </li>
                      </ul></td>
                  </tr>
                  <div class="modal fade" id="status_bersiap{{ $itemss->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Edit Status</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin_poli/edit/{{ $itemss->id }}" method="POST">
                          @csrf
                          @method('PUT')
                        <div class="modal-body">
                          <input type="hidden" class="form-control input_setengah" id="input_poli" name="input_poli"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $itemss->dokter->nama_poli }}" />
                          <input type="hidden" class="form-control input_setengah" id="input_status" name="input_status"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $itemss->status }}" />
                          <select id="select_status" name="select_status" class="form-select select_setengah">
                            
                            <option value="masuk" {{ $itemss->status == 'bersiap' ? 'selected' : '' }}>masuk </option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Edit status</button>
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
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="text-nowrap table-responsive p-3">
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
                @foreach ($Antrian_menunggu as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_antrian }}</td>
                    <td>{{ $item->pasien->nama_pasien }}</td>
                    <td>{{ $item->dokter->nama_dokter }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->dokter->nama_poli }}</td>
                    <td><button type="button" class="btn status_antrians dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->status }}</button>
                      <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#status_menunggu{{ $item->id }}">Ganti status</a> </li>
                      </ul></td>
                  </tr>
                  <div class="modal fade" id="status_menunggu{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Edit Status</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin_poli/edit/{{ $item->id }}" method="POST">
                          @csrf
                          @method('PUT')
                        <div class="modal-body">
                          <input type="hidden" class="form-control input_setengah" id="input_poli" name="input_poli"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->dokter->nama_poli }}" />
                          <input type="hidden" class="form-control input_setengah" id="input_status" name="input_status"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->status }}" />
                          <select id="select_status" name="select_status" class="form-select select_setengah">
                            
                            <option value="bersiap" {{ $item->status == 'menunggu' ? 'selected' : '' }}>bersiap</option>
                            <option value="masuk" {{ $item->status == 'masuk' ? 'selected' : '' }}>masuk </option>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Edit status</button>
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
  document.addEventListener('DOMContentLoaded', (event) => {
      const statusElements = document.querySelectorAll('.status_antrians');
      
      statusElements.forEach((statusElement) => {
          const statusText = statusElement.textContent.trim();

          if (statusText === 'menunggu') {
              statusElement.style.backgroundColor = '#D6542B'; // Warna merah
          } else if (statusText === 'bersiap') {
              statusElement.style.backgroundColor = '#D5E42C'; // Warna kuning
          } else if (statusText === 'masuk') {
              statusElement.style.backgroundColor = '#45E02C'; // Warna hijau
          }
      });
  });
</script>
<script>
    let table = new DataTable('#halo');
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

  @elseif(Session::has('success_delete'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil di Dihapus',
    icon: 'success',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('gagal_edit'))

  Swal.fire({
    title: 'Gagal',
    text: 'Data gagal di ubah karena sudah ada 3 data di tabel',
    icon: 'error',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>
@endsection