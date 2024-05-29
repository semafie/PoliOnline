@extends('admin.template.template-header-poli')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card dashboard">
    <div class="container">
      <img style="filter: blur(0.8px); width: 300px; height: 300px;" src="{{ asset('img/logo_si.png') }}" alt="">
    </div>
    
  </div>
</div>


  <script>
    @if(Session::has('success_message'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Anda telah berhasil Login...',
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