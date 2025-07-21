<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <title>BoondaChildCare</title>

    <!-- Link to Favicon -->
    <link rel="icon" href="user/imgs/logotabb.png" type="image/x-icon">

    <!-- font icons -->
    <link rel="stylesheet" href="user/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="user/css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo&display=swap" rel="stylesheet">

</head>


<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="user/imgs/logoboonda.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:history.back()" class="btn btn-primary rounded">
                            Kembali</a>
                </ul>
            </div>
        </div>
    </nav>
    <div class=" container-fluid mt-5 pt-5 ">
        <div class="text-left mb-2">
            <a href="javascript:history.back()" class="btn rounded">
                <i class="bi bi-box-arrow-left"></i>
            </a>
        </div>
        <section id="kolaborator">
            <div class="col text-center">
                <h5 class="card-title custom-titlefax mb-3">Kolaborator</h5>
                <div class="row d-flex flex-column align-items-center">
                    <div class="col d-flex justify-content-center">
                        <img src="user/imgs/avatar-3.jpg" alt="Collaborator Profile" class="card-img"
                            style="width: 150px; height:150px; border-radius: 20px;"">
                    </div>
                    <div class="item-details">
                        <p><strong style="color:rgba(255, 106, 138, 1); ">Bambang Sujatmiko</strong> </p>
                        <p>Berpengalaman dalam parenting anak usia dini</p>
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <!-- Teks di atas tombol pertama -->
                            <div class="text-left mb-2">
                                <h6 style="color:rgba(255, 106, 138, 1); ">Event Selanjutnya</h6>
                                <button class=" item-kol btn  text-left"><strong style="font-size: 12px;">11 November
                                        2023</strong>
                                    <p><span>Jadi Pendongen? Berani Dong</span></p>
                                </button>
                                <button class=" item-kol btn  text-left"><strong style="font-size: 12px;">11 November
                                        2023</strong>
                                    <p><span>Jadi Pendongen? Berani Dong</span></p>
                                </button>
                                <div class="col mt-2"></div>
                                <button class=" item-kol btn  text-left"><strong style="font-size: 12px;">11 November
                                        2023</strong>
                                    <p><span>Jadi Pendongen? Berani Dong</span></p>
                                </button>
                                <button class=" item-kol btn  text-left"><strong style="font-size: 12px;">11 November
                                        2023</strong>
                                    <p><span>Jadi Pendongen? Berani Dong</span></p>
                                </button>
                            </div>
                            <div>
                                <h4 class="custom-titlefax display-5"><strong>Nama Sertifikat</strong></h4>
                                <!-- Kelas Bootstrap untuk teks besar -->
                            </div>

                            <div class="d-flex justify-content-center align-items-start mb-2">
                                <div class="col text-left mb-2" style="width: 350px; margin-left: 4px;">
                                    <h5><strong>Sertifikat</strong></h5>
                                    <p style=" text-bold opacity: 0,9; ">Badan Sertifikasi Nasional</p>
                                    <p style=" opacity: 0.6; ">ID KRIDENSIAl AKJFHSKBSCBSKCS.</p>
                                </div>
                                <div class="col text-left mb-2" style="width: 350px; margin-left: 4px;">
                                    <h5><strong>Sertifikat Lainnya</strong></h5>
                                    <p style="text-bold opacity: 0,9; ">Badan Sertifikasi Nasional</p>
                                    <p style=" opacity: 0.6; ">ID KRIDENSIAl AKJFSHSFHBVSKFV.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="ulasan" class="section">
            <div class="container text-center">
                <h6 class="custom-titlegal mt-3">Review</h6>


                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!-- Arrow buttons -->
                    <button id="prevBtn" class="btn-arrow btn-prev active">
                        <i class="bi bi-caret-left-fill"></i> <!-- Ikon untuk tombol sebelumnya -->

                    </button>
                    <button id="nextBtn" class="btn-arrow btn-next active">
                        <i class="bi bi-caret-right-fill"></i> <!-- Ikon untuk tombol berikutnya -->

                    </button>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card testmonial-card border"style=" border-radius: 20px;">
                                <div class="card-body">
                                    <img src="user/imgs/avatar-1.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum
                                        voluptates
                                        in enim vel amet?</p>
                                    <h1 class="title">Emma Re</h1>
                                    <h1 class="subtitle">Graphic Designer</h1>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card testmonial-card border"style="border-radius: 20px;">
                                <div class="card-body">
                                    <img src="user/imgs/avatar-2.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum
                                        voluptates
                                        in enim vel amet?</p>
                                    <h1 class="title">James Bert</h1>
                                    <h1 class="subtitle">Web Designer</h1>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card testmonial-card border"style="border-radius: 20px;">
                                <div class="card-body">
                                    <img src="user/imgs/blog-3.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum
                                        voluptates
                                        in enim vel amet?</p>
                                    <h1 class="title">helmi</h1>
                                    <h1 class="subtitle">Web Designer</h1>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card testmonial-card border"style="border-radius: 20px;">
                                <div class="card-body">
                                    <img src="user/imgs/blog-2.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum
                                        voluptates
                                        in enim vel amet?</p>
                                    <h1 class="title">sincan</h1>
                                    <h1 class="subtitle">Ceo</h1>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card testmonial-card "style="border-radius: 20px;">
                                <div class="card-body">
                                    <img src="user/imgs/avatar-3.jpg" alt="">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum
                                        voluptates
                                        in enim vel amet?</p>
                                    <h1 class="title">Michael Abra</h1>
                                    <h1 class="subtitle">Web Developer</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="custom-footer">
        <div class="footer-container">
            <div class="row">
                <div class="col-sm-6 ">
                    <div style="display: flex; flex-direction: column; align-items: flex-start;">
                        <!-- Teks -->
                        <div style="margin-bottom: 20px;">

                            <img src="user/imgs/boondaputih.png" alt="BoondaChildCare"
                                style="max-width: 60%; height: auto;">
                        </div>
                        <!-- Sosial Media -->
                        <div class="socials">
                            <a href="https://boonda.id/index" style="margin-right: 20px;">
                                <i class="bi bi-google" style="font-size: 20px; color: #fff;"></i>
                            </a>
                            <a href="https://www.instagram.com/boonda_id/" style="margin-right: 20px;">
                                <i class="bi bi-instagram" style="font-size: 20px; color: #fff;"></i>
                            </a>
                            <a href="https://x.com/boondaid/" style="margin-right: 20px;">
                                <i class="bi bi-twitter" style="font-size: 20px; color: #fff;"></i>
                            </a>
                            <a href="https://x.com/boondaid/" style="margin-right: 20px;">
                                <i class="bi bi-youtube" style="font-size: 20px; color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="display: flex; justify-content: space-between; color: #fff;">
                        <!-- Section Learn More -->
                        <div style="margin-right: 30px;">
                            <h5 class="fot-title">Learn More</h5>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><a href="#" style="color: #fff; text-decoration: none;">About Lift</a>
                                </li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Environment</a>
                                </li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Jobs</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Privacy
                                        Policy</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Section Pusat Dukungan -->
                        <div style="margin-right: 30px;">
                            <h5 class="fot-title">Pusat Dukungan</h5>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><a href="#" style="color: #fff; text-decoration: none;">Lift Tickets</a>
                                </li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Season
                                        Passes</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Vacation
                                        Packages</a></li>
                            </ul>
                        </div>

                        <!-- Section Kantor -->
                        <div style="margin-right: 30px;">
                            <h5 class="fot-title">Kantor</h5>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><a href="#" style="color: #fff; text-decoration: none;">Jl. Borobudur
                                        Agung Tim. II/2<br>Malang, Jawa Timur</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">+62
                                        812-3447-4107</a></li>
                                <li><a href="#"
                                        style="color: #fff; text-decoration: none;">contact@boonda.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center; color: #fff; margin-top: 50px;">
                © 2024 Boonda Childcare | All Rights Reserved
            </div>
        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <!-- Bootstrap 5.1.3 JS (Tanpa jQuery) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = document.querySelector('#carouselExampleIndicators');
            var prevBtn = document.querySelector('#prevBtn');
            var nextBtn = document.querySelector('#nextBtn');

            // Setup event listeners untuk tombol panah
            prevBtn.addEventListener('click', function() {
                // Geser carousel ke slide sebelumnya
                $(carousel).carousel('prev');
            });

            nextBtn.addEventListener('click', function() {
                // Geser carousel ke slide berikutnya
                $(carousel).carousel('next');
            });
        });
    </script>
</body>

</html>
