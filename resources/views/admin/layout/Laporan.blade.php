@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card data_dokter">
      <button type="button " class="btn mb-1 btn-primary btn_tambah" data-bs-toggle="modal" data-bs-target="#tambahdokter">Print</button>
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
                @foreach ($Antrian as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->no_antrian }}</td>
                    <td>{{ $item->pasien->nama_pasien }}</td>
                    <td>{{ $item->dokter->nama_dokter }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->dokter->nama_poli }}</td>
                    <td><p class="status_antrian">{{ $item->status }}</p></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

<script>
  let table = new DataTable('#halo');
</script>


@endsection