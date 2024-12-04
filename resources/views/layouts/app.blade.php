<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Aplikasi Generate Surat - Buat surat resmi dengan mudah dan cepat" />
    <meta name="author" content="Your Company Name" />
    <title>Aplikasi Generate Surat - Buat Surat dengan Mudah</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets-fe/favicon.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets-fe/css/styles.css')}}" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Aplikasi Generate Surat</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="#templates">Template</a></li>
                <li class="nav-item"><a class="nav-link" href="#how-it-works">Cara Kerja</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('auth.index')}}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Buat Surat Resmi dengan Mudah dan Cepat</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Aplikasi Generate Surat membantu Anda membuat surat resmi dan profesional dalam hitungan menit. Pilih template, isi data, dan surat Anda siap!</p>
                <a class="btn btn-primary btn-xl" href="#features">Mulai Sekarang</a>
            </div>
        </div>
    </div>
</header>

<!-- Features Section-->
<section class="page-section bg-light" id="features">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center text-dark mt-0">Fitur Unggulan</h2>
        <hr class="divider divider-light" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-file-earmark-text fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2 text-dark">Beragam Template</h3>
                    <p class="text-dark-50 mb-0">Pilihan template surat untuk berbagai keperluan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-pencil-square fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2 text-dark">Mudah Disesuaikan</h3>
                    <p class="text-dark-50 mb-0">Edit dan sesuaikan surat sesuai kebutuhan Anda</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-cloud-download fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2 text-dark">Ekspor PDF</h3>
                    <p class="text-dark-50 mb-0">Unduh surat dalam format PDF siap cetak</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-shield-check fs-1 text-dark"></i></div>
                    <h3 class="h4 mb-2 text-dark">Aman & Terpercaya</h3>
                    <p class="text-dark-50 mb-0">Data Anda selalu aman dan terlindungi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Templates Section -->
<section class="page-section" id="templates">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Template Surat</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <img src="{{asset('assets-fe/img/templates/surat-lamaran.jpg')}}" alt="Surat Lamaran Kerja" class="img-fluid rounded mb-3">
                    <h3 class="h4 mb-2">Surat Lamaran Kerja</h3>
                    <p class="text-muted mb-0">Template profesional untuk melamar pekerjaan</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <img src="{{asset('assets-fe/img/templates/surat-resmi.jpg')}}" alt="Surat Resmi" class="img-fluid rounded mb-3">
                    <h3 class="h4 mb-2">Surat Resmi</h3>
                    <p class="text-muted mb-0">Format standar untuk surat resmi instansi</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="mt-5">
                    <img src="{{asset('assets-fe/img/templates/surat-pribadi.jpg')}}" alt="Surat Pribadi" class="img-fluid rounded mb-3">
                    <h3 class="h4 mb-2">Surat Pribadi</h3>
                    <p class="text-muted mb-0">Template surat untuk keperluan pribadi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="page-section bg-secondary text-white" id="how-it-works">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Cara Kerja</h2>
        <hr class="divider divider-light" />
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item bg-transparent text-white border-0">Pilih template surat yang sesuai dengan kebutuhan Anda</li>
                    <li class="list-group-item bg-transparent text-white border-0">Isi informasi yang diperlukan pada form yang tersedia</li>
                    <li class="list-group-item bg-transparent text-white border-0">Preview surat dan lakukan penyesuaian jika diperlukan</li>
                    <li class="list-group-item bg-transparent text-white border-0">Unduh surat dalam format PDF siap cetak</li>
                </ol>
                <a class="btn btn-light btn-xl mt-4" href="#templates">Coba Sekarang</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">
            Copyright &copy; 2023 - Aplikasi Generate Surat
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('assets-fe/js/scripts.js')}}"></script>
</body>
</html>
