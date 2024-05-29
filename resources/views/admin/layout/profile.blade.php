@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card admin_profile">
        <div class="profile">
            <img
             @if(empty($getRecord->image))
            src="{{ asset('/assets/img/avatars/1.png') }}"
        @else
            src="{{ asset('storage/img/'. $getRecord->image ) }}"
        @endif  
        alt="">
            <div class="isi">
                
                <label for="input_id" class="form_label">Nama Akun</label>
                <input type="text" class="form-control input_setengah" id="nama" disabled aria-describedby="defaultFormControlHelp" value="{{ $getRecord->name }}" />
                <label for="" class="form_label">email</label>
                <input type="text" class="form-control input_setengah" id="email" disabled aria-describedby="defaultFormControlHelp" value="{{ $getRecord->email }}" />
                <label for="" class="form_label">image</label>
                <input type="text" class="form-control input_setengah" id="image" disabled aria-describedby="defaultFormControlHelp" @if(empty($getRecord->image))
                value="-"
            @else
                value="{{ $getRecord->image }}"
            @endif/>
                <label for="" class="form_label">no_telp</label>
                <input type="text" class="form-control input_setengah" id="no_telp" disabled aria-describedby="defaultFormControlHelp" @if(empty($getRecord->image))
                value="-"
            @else
                value="{{ $getRecord->no_telp }}"
            @endif />
                <div class="isi_btn">
                    <button type="button " class="btn tambah_pasien btn-primary " data-bs-toggle="modal" data-bs-target="#editprofile">Edit Profile</button>
                </div>

                <div class="modal fade" id="editprofile" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Edit Profile</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="dua_label">
                                <label for="name" class="form-label label_setengah">nama</label>
                                <label for="email" class="form-label label_setengah">email</label>
                            </div>
                            <form action="/admin/profile/edit/{{ $getRecord->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="dua_input">
                                <input type="text" class="form-control input_setengah" id="name" name="name" placeholder="Otomatis dibuat sistem" aria-describedby="defaultFormControlHelp" value="{{ $getRecord->name }}" />
                                <input type="text" class="form-control input_setengah" id="email" name="email"  placeholder="Masukkan alamat" aria-describedby="defaultFormControlHelp"  value="{{ $getRecord->email }}" />
                            </div>
                            <div class="dua_label">
                                <label for="no_telp" class="form-label label_setengah">gambar</label>
                                <label for="image" class="form-label label_setengah">no_telp</label>
                            </div>
                
                            <div class="dua_input">
                                <input class="form-control" type="file" id="image" name="image" />
                                <input type="text" class="form-control input_setengah"id="no_telp" name="no_telp" placeholder="Otomatis dibuat sistem" aria-describedby="defaultFormControlHelp" @if(empty($getRecord->image))
                                value="-"
                            @else
                                value="{{ $getRecord->no_telp }}"
                            @endif />
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal">Edit Profile</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                
            </div>
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
@endsection