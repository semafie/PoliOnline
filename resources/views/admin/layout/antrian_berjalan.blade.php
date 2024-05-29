@extends('admin/template/template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card data_dokter">
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
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Antrian as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_antrian }}</td>
                    <td>{{ $item->pasien->nama_pasien }}</td>
                    <td>{{ $item->dokter->nama_dokter }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->dokter->nama_poli }}</td>
                    <td><p class="status_antrian">{{ $item->status }}</p>
                      {{-- <div class="btn-group "> --}}
                        
                      {{-- </div> --}}
                    </td>
                    
                    <td>
                      <form action="/admin/cetakantrians/{{ $item->id }}" method="POST" target="_blank">
                        @csrf
                        @method('put')
                      <button  type="button " class="btn btn-warning ">Print</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', (event) => {
      // Pengubahan warna latar belakang elemen dengan kelas .status_antrian
      const statusElements = document.querySelectorAll('.status_antrian');
      
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

      // Inisialisasi DataTable
      let table = new DataTable('#halo');
  });
</script>
@endsection