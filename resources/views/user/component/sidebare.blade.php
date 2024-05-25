<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    

    
    
    

    
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <link rel="stylesheet" href="{{ asset('css/sidebar_user.css') }}">

    <title>User | no antrian</title>
</head>
<body>
    <div class="dashboard_user">
        <div class="sidebar">
            <a href=""><h1 class="logos">Poli<span>Online.</span></h1></a>
            <div class="garis"></div>
            <div class="menus">
                <a href="{{ route('user_antrians') }} " class="@active('user_antrians')"><i class="bx bxs-add-to-queue"></i>No Antrianmu</a>
                <a href="{{ route('user_antrianberjalan') }}" class="@active('user_antrianberjalan')"><i class='bx bx-walk' ></i>No Antrian Berjalan</a>
                <a href="{{ route('user_riwayatantrian') }}" class="@active('user_riwayatantrian')"><i class='bx bx-history' ></i>Riwayat No Antrian</a>
                <a href="{{ route('user_pasien') }}" class="@active('user_pasien')"><i class='bx bxs-user-account' ></i>Data Pasien</a>
            </div>
            <div class="garis"></div>
            <div class="tulisan_bawah">
                <h2>Welcome, <span>{{ $getRecord->name }}</span></h2>
                <p>PASIEN</p>
            </div>
            
            <div class="menu_bawah">
                
                <a href="/logout"><button>Logout</button></a>
            </div>
            
            
        </div>
        <div class="content">
            <div class="title">
                <h1>{{ $title }}</h1>
                <p>{{ $subtitle }}</p>
            </div>
        
    @yield('content')
        </div>
    </div>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>