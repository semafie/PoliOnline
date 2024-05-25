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
                <h1>Daftar No Antrian rumah sakit dengan <span>Poli</span>Online.</h1>
                <div class="description">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim praesentium, asperiores perspiciatis
                        ab ipsa optio reprehenderit itaque pariatur voluptatibus minima sit earum tempore quae
                        necessitatibus nesciunt assumenda culpa non temporibus.</p>
                </div>
                <div class="btn">
                    <button class="btn-daftar-no-antrian">Daftar No Antrian?</button>
                    <button class="btn-liat-no-antrian">Lihat No antrian?</button>
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
    <div class="template-section-2">
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
                        <h1>Lorem ipsum</h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque aliquid saepe aut officia nostrum
                        illo
                        dignissimos placeat ducimus magnam. Soluta fugit libero expedita odit quis consequuntur sunt at
                        nulla
                        mollitia velit sit beatae voluptatum quae molestias inventore eaque asperiores molestiae nihil rerum
                        dignissimos, iste, aperiam maiores vero quod. Voluptas nobis iure est nulla, quidem illum impedit
                        nesciunt quae officia. Aliquid!</p>
                </div>
                <div class="side-right">
                    <h1>Lorem ipsum</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque aliquid saepe aut officia nostrum
                        illo
                        dignissimos placeat ducimus magnam. Soluta fugit libero expedita odit quis consequuntur sunt at
                        nulla
                        mollitia velit sit beatae voluptatum quae molestias inventore eaque asperiores molestiae nihil rerum
                        dignissimos, iste, aperiam maiores vero quod. Voluptas nobis iure est nulla, quidem illum impedit
                        nesciunt quae officia. Aliquid!</p>
                </div>
            </div>

        </div>

    </div>
    {{-- end section 2 tentang sistem --}}

    {{-- start section 3 cara menggunakan --}}
    <div class="template-section">
        <div class="container-section-3">
            <div class="top-container-3">
                <div class="box-number-title-3">
                    <div class="number">{{-- flex --}}
                        <div class="box-no">
                            <span class="no">1</span>
                        </div>
                        <span class="step">Step 1</span>
                    </div>
                    <div class="box-title">{{-- flex --}}
                        <h1 class="title">Cara Menggunakan</h1>
                        <div class="box-icon">
                            <img src="{{ asset('img/icon-cara-menggunakan.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus deleniti enim rem modi, quasi facilis
                    adipisci iste? Ut sequi sunt assumenda quasi neque iusto sit animi quibusdam accusantium distinctio
                    natus libero ea voluptatum nihil, possimus facilis? Aspernatur sequi sint rerum! Lorem ipsum dolor, sit
                    amet consectetur adipisicing elit. Facilis non blanditiis exercitationem fuga porro sint natus nostrum.
                    Sint, quam accusamus?</p>
            </div>
            <div class="side-container-section-3">
                <div class="side-left-3">
                    <div class="top-side-left-container-3">{{-- flex --}}
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">2</span>
                            </div>
                            <span class="step">Step 2</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi fugit, sapiente, atque
                                incidunt eos dolores tempora debitis ullam voluptas, veritatis cupiditate quisquam totam
                                cumque nulla?
                            </p>
                        </div>
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">3</span>
                            </div>
                            <span class="step">Step 3</span>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam amet atque odit aut. Esse
                                vero, quis quod nostrum reiciendis iusto obcaecati aspernatur eius eum dicta.eius eum dicta.
                            </p>
                        </div>

                    </div>
                    <div class="bottom-side-left-container-3">{{-- flex --}}
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">4</span>
                            </div>
                            <span class="step">Step 4</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum itaque, impedit cupiditate
                                eligendi nemo harum reiciendis velit accusantium eius fugiat totam, libero quia. Reiciendis,
                                natus.
                            </p>
                        </div>
                        <div class="container-box-step">
                            <div class="box-number">
                                <span class="number">5</span>
                            </div>
                            <span class="step">Step 5</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis odit nesciunt est,
                                voluptas officia aliquam, sit consectetur reiciendis hic, earum quidem perferendis explicabo
                                excepturi magni.
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
    <div class="template-section">
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
                        <button class="btn  dropdown-toggle fs-5"
                            style="border-color: #BDBDBD; color: #787878; width: 180px" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Poli Umum
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fs-5" style="color: #787878; width: 180px" href="#">Poli
                                    Umum</a></li>
                            <li><a class="dropdown-item fs-5" style="color: #787878;width: 180px" href="#">Poli
                                    Gigi</a></li>
                            <li><a class="dropdown-item fs-5" style="color: #787878;width: 180px" href="#">Ambil
                                    Obat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-no-antrian">
                <div class="left-side-4">
                    <div class="container-left-side-top-4">
                        <div class="container-box-no-antrian-1">
                            <div class="inside-box-no-antrian-1">{{-- flex --}}{{-- space between --}}
                                <h1>A23</h1>
                                <h2>Masuk</h2>
                            </div>
                        </div>
                    </div>
                    <div class="container-left-side-bottom-4">{{-- flex --}}
                        <div class="container-box-no-antrian-2">
                            <div class="inside-box-no-antrian-2">{{-- block --}}
                                <h1>A21</h1>
                                <h2>Masuk</h2>
                            </div>
                        </div>
                        <div class="container-box-no-antrian-2">
                            <div class="inside-box-no-antrian-2">{{-- block --}}
                                <h1>A21</h1>
                                <h2>Masuk</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-side-4">
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                    <div class="container-box-bersiap-dipanggil">
                        <div class="inside-box-bersiap-dipanggil">
                            <div class="inside-left-bersiap-dipanggil">
                                <div class="box-icon"></div>
                                <h2>Bersiap Dipanggil</h2>
                            </div>
                            <h1>A22</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-jeruk">
                <img src="{{ asset('img/jeruk.png') }}" alt="">
            </div>
        </div>
    </div>
    @include('leanding-page.template.footer-leading-page')
@endsection
