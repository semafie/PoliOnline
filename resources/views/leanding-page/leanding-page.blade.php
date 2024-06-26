@extends('leanding-page.template.header-leading-page')
<title>leanding page</title>
{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/leanding-page.css') }}">
@section('leanding-page')
    <div class="header">
        <img class="img-cloud" src="{{ asset('img/cloud.png') }}" alt="">
    </div>

    {{-- start section bagian 1 --}}
    <div class="all-section-1">
        <div class="container-section-1">
            <div class="side-left">
                <h1>Daftar No Antrian Puskesmas dengan <span>Sip</span>PH.</h1>
                <div class="description">
                    <div class="jadi_satu">
                        <p>(Sistem Informasi Puskesmas Pelita Harapan)</p>
                    <p>"Cukup Daftar Online dari rumah untuk periksa hari ini, besok atau lusa."</p>
                    </div>
                    
                </div>
                <div class="btn">
                    <a href="{{ route('sign-in') }}"><button  class="btn-daftar-no-antrian">Daftar No Antrian?</button></a>
                    <button onclick="scrollToTarget_lihatantrian()" class="btn-liat-no-antrian">Lihat No antrian?</button>
                </div>
            </div>
            <div class="side-right">
                <div class="overlay">
                    <div class="bg-overlay"></div>
                    <img src="{{ asset('img/img-section-1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    {{-- end section bagian 1 --}}

    {{-- start section 2 tentang sistem --}}
    <div id="tentang" class="template-section-2">
        <div class="container-section-2">
            <div class="container-title-2">
                <div class="box-icon-info">
                    <img src="{{ asset('img/icon-info.png') }}" alt="">
                </div>
                <h1>Tentang Sistem Informasi</h1>
            </div>
            <div class="overlay-container-side-2">
                <div class="side-left">
                    <div class="support-title">
                        <img src="{{ asset('img/icon-support.png') }}" alt="">
                        <h1>Deskripsi</h1>
                    </div>
                    <p>Puskesmas Pelita Harapan merupakan fasilitas pelayanan kesehatan yang berkomitmen untuk memberikan pelayanan 
                        kesehatan yang lebih cepat, tepat, dan merata, serta meningkatkan kualitas hidup masyarakat melalui pelayanan 
                        kesehatan primer yang berkualitas. 
                        Aplikasi ini dirancang untuk mendukung pasien dan tenaga medis dalam menyediakan layanan yang optimal dan efisien.</p>
                </div>
                <div class="side-right">
                    <h1>Pelayanan</h1>
                    <div class="sidep">
                        <p>Puskesmas Pelita Harapan menyediakan Jenis Pelayanan Kesehatan :
                        
                        
                        
                        </p>
                        <br><p>1. Poli Umum</p>
                        <br><p>2. Poli Gigi</p>
                        <br><p>3. Poli KIA</p>
                        <br><p>Layanan untuk Mempermudah Mendaftar Puskemas Dimana Saja.</p>
                    </div>
                    

                </div>
            </div>

        </div>

    </div>
    {{-- end section 2 tentang sistem --}}

    {{-- start section 3 cara menggunakan --}}
    <div id="cara_menggunakan" class="template-section">
        <div class="container-section-3">
            <div class="top-container-3">
                <div class="box-number-title-3">
                    <div class="number">{{-- flex --}}
                        <div class="box-no">
                            <span class="no">1</span>
                        </div>
                        <span class="step">Daftar</span>
                    </div>
                    <div class="box-title">{{-- flex --}}
                        <h1 class="title">Cara Menggunakan</h1>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon-cara-menggunakan.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <p>Daftar dengan email atau akun Google yang sudah ada untuk mulai menggunakan layanan kami. Pilihan ini memudahkan Anda untuk langsung memulai tanpa perlu membuat akun baru secara terpisah. Dengan opsi ini, proses pendaftaran menjadi lebih cepat dan efisien.</p>
            </div>
            <div class="side-container-section-3">
                <div class="side-left-3">
                    <div class="top-side-left-container-3">{{-- flex --}}
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">2</span>
                            </div>
                            <span class="step">Login</span>
                            <p class="sasasa">Untuk memulai, Anda dapat masukkan email dan password Anda. Atau, alternatifnya, Anda bisa login menggunakan akun Google. Setelah itu, cukup klik tombol login untuk melanjutkan ke langkah selanjutnya.
                            </p>
                        </div>
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">3</span>
                            </div>
                            <span class="step">Daftar Antrean</span>
                            <p class="sasasa">Langkah selanjutnya adalah memasukkan data pasien dan memilih poli tujuan. Setelah Anda selesai memasukkan data, Anda dapat mencetak antrian untuk memproses kunjungan ke puskesmas dengan lebih cepat.
                            </p>
                        </div>

                    </div>
                    <div class="bottom-side-left-container-3">{{-- flex --}}
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">4</span>
                            </div>
                            <span class="step">Pemanggilan Antrean</span>
                            <p>Setelah Anda selesai mencetak antrian, Anda perlu menunggu konfirmasi dari petugas untuk memilih dokter yang akan Anda temui. Setelah itu, Anda hanya perlu menunggu pemanggilan nomor antrian Anda sebelum Anda dapat dilayani oleh dokter yang telah dipilih.
                            </p>
                        </div>
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">5</span>
                            </div>
                            <span class="step">Logout</span>
                            <p>Terakhir, jangan lupa untuk keluar dari akun Anda saat Anda selesai menggunakan platform kami. Dengan melakukan logout, Anda akan menjaga keamanan akun Anda dan melindungi informasi pribadi Anda. Ini adalah langkah yang penting untuk menjaga privasi dan keamanan data Anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="side-right-3">
                    <div class="overlay">
                        <div class="bg-overlay"></div>
                        <img src="{{ asset('img/img-section-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end section 3 cara menggunakan --}}
    <div class="template-section" id="target-element">
        <div class="container-section-4">
            <div class="top-section-4">
                <div class="top-left-4">{{-- flex --}}
                    <div class="box-icon">
                        <img src="{{ asset('img/icon-info.png') }}" alt="">
                    </div>
                    <h1>No Antrian Berjalan</h1>
                </div>
                <div class="top-right-4">
                    <div class="dropdown">
                        {{-- <button class="btn  dropdown-toggle fs-5"
                            style="border-color: #BDBDBD; color: #787878; width: 180px" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Poli Umum
                        </button> --}}
                        <div class="">
                            {{-- <label for="largeSelect" class="form-label">Large select</label> --}}
                            <select id="select_poli" class="form-select form-select-lg">
                              <option value="Poli Umum">Poli Umum</option>
                              <option value="Poli Gigi">Poli Gigi</option>
                              <option value="Poli Kia">Poli Kia</option>
                            </select>
                          </div>
                    </div>
                </div>
            </div>
            <div class="container-no-antrian">
                <div class="left-side-4">

                    <div class="container-left-side-top-4">
                        <div class="container-box-no-antrian-1">
                            <div class="inside-box-no-antrian-1 halo"  id="Poli-Umum">{{-- flex --}}{{-- space between --}}
                                {{-- <div id="Poli-Umum" style="display: flex; width: 100%;"> --}}
                                <h1>{{ $antrianpertamaumum->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianpertamaumum->status ?? 'kosong' }}</h2>
                                {{-- </div> --}}
                            </div>
                            <div class="inside-box-no-antrian-1" id="Poli-Gigi">
                                <h1>{{ $antrianpertamagigi->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianpertamagigi->status ?? 'kosong' }}</h2>
                            </div>
                            <div class="inside-box-no-antrian-1" id="Poli-Kia">
                                <h1>{{ $antrianpertamakia->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianpertamakia->status ?? 'kosong' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-left-side-bottom-4">{{-- flex --}}
                        <div class="container-box-no-antrian-2">
                            <div class="inside-box-no-antrian-2" id="Poli-Umums">
                                <h1>{{ $antriankeduaumum->no_antrian ?? '-'}}</h1>
                                <h2>{{ $antriankeduaumum->status ?? 'kosong' }}</h2>
                            </div>
                            <div class="inside-box-no-antrian-2" id="Poli-Gigis">
                                <h1>{{ $antriankeduagigi->no_antrian ?? '-'}}</h1>
                                <h2>{{ $antriankeduagigi->status ?? 'kosong' }}</h2>
                            </div>
                            <div class="inside-box-no-antrian-2" id="Poli-Kias">
                                <h1>{{ $antriankeduakia->no_antrian ?? '-'}}</h1>
                                <h2>{{ $antriankeduakia->status ?? 'kosong' }}</h2>
                            </div>
                        </div>
                        <div class="container-box-no-antrian-2">
                            <div class="inside-box-no-antrian-2" id="Poli-Umumss">
                                <h1>{{ $antrianketigaumum->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianketigaumum->status ?? 'kosong' }}</h2>
                            </div>
                            <div class="inside-box-no-antrian-2" id="Poli-Gigiss">
                                <h1>{{ $antrianketigagigi->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianketigagigi->status ?? 'kosong' }}</h2>
                            </div>
                            <div class="inside-box-no-antrian-2" id="Poli-Kiass">
                                <h1>{{ $antrianketigakia->no_antrian ?? '-' }}</h1>
                                <h2>{{ $antrianketigakia->status ?? 'kosong' }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-side-4" id="Poli-Umumsss">
                    @foreach ($Antrianumum as $item)
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>{{ $item->status }} Dipanggil</h2>
                            </div>
                            <h1>{{ $item->no_antrian }}</h1>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="right-side-4" id="Poli-Gigisss">
                    @foreach ($Antriangigi as $item)
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>{{ $item->status }} Dipanggil</h2>
                            </div>
                            <h1>{{ $item->no_antrian }}</h1>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="right-side-4" id="Poli-Kiasss">
                    @foreach ($Antriankia as $item)
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>{{ $item->status }} Dipanggil</h2>
                            </div>
                            <h1>{{ $item->no_antrian }}</h1>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="img-jeruk">
                {{-- <img src="{{ asset('img/jeruk.png') }}" alt=""> --}}
                <iframe src="https://assets.pinterest.com/ext/embed.html?id=823032900682318177" height="445" width="345" frameborder="0" scrolling="no" ></iframe>
            </div>
        </div>
    </div>

    <script>
        function scrollToTarget_lihatantrian() {
            var targetElement = document.getElementById('target-element');
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
        function scrollToTarget_caramenggunakan() {
            var targetElement = document.getElementById('cara_menggunakan');
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
        function scrollToTarget_tentang() {
            var targetElement = document.getElementById('tentang');
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
        function scrollToTargetkemabali() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            var selectElement = document.getElementById('select_poli');
            function checkValue() {
                if (selectElement.value === 'Poli Umum') {
                    document.getElementById('Poli-Umum').style.display = 'flex';
                    document.getElementById('Poli-Gigi').style.display = 'none';
                    document.getElementById('Poli-Kia').style.display = 'none';
                    document.getElementById('Poli-Umums').style.display = 'block';
                    document.getElementById('Poli-Gigis').style.display = 'none';
                    document.getElementById('Poli-Kias').style.display = 'none';
                    document.getElementById('Poli-Umumss').style.display = 'block';
                    document.getElementById('Poli-Gigiss').style.display = 'none';
                    document.getElementById('Poli-Kiass').style.display = 'none';
                    document.getElementById('Poli-Umumsss').style.display = 'block';
                    document.getElementById('Poli-Gigisss').style.display = 'none';
                    document.getElementById('Poli-Kiasss').style.display = 'none';
                } else if(selectElement.value === 'Poli Gigi') {
                    document.getElementById('Poli-Umum').style.display = 'none';
                    document.getElementById('Poli-Gigi').style.display = 'flex';
                    document.getElementById('Poli-Kia').style.display = 'none';
                    document.getElementById('Poli-Umums').style.display = 'none';
                    document.getElementById('Poli-Gigis').style.display = 'block';
                    document.getElementById('Poli-Kias').style.display = 'none';
                    document.getElementById('Poli-Umumss').style.display = 'none';
                    document.getElementById('Poli-Gigiss').style.display = 'block';
                    document.getElementById('Poli-Kiass').style.display = 'none';
                    document.getElementById('Poli-Umumsss').style.display = 'none';
                    document.getElementById('Poli-Gigisss').style.display = 'block';
                    document.getElementById('Poli-Kiasss').style.display = 'none';
                } else{
                    document.getElementById('Poli-Umum').style.display = 'none';
                    document.getElementById('Poli-Gigi').style.display = 'none';
                    document.getElementById('Poli-Kia').style.display = 'flex';
                    document.getElementById('Poli-Umums').style.display = 'none';
                    document.getElementById('Poli-Gigis').style.display = 'none';
                    document.getElementById('Poli-Kias').style.display = 'block';
                    document.getElementById('Poli-Umumss').style.display = 'none';
                    document.getElementById('Poli-Gigiss').style.display = 'none';
                    document.getElementById('Poli-Kiass').style.display = 'block';
                    document.getElementById('Poli-Umumsss').style.display = 'none';
                    document.getElementById('Poli-Gigisss').style.display = 'none';
                    document.getElementById('Poli-Kiasss').style.display = 'block';
                }
            }

            // Check the initial value
            checkValue();

            // Add event listener for changes
            selectElement.addEventListener('change', checkValue);
        });
</script>
    @include('leanding-page.template.footer-leading-page')
@endsection
