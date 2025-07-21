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

     <!-- Link Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo&display=swap" rel="stylesheet">

    <!-- font icons -->
    <link rel="stylesheet" href="user/vendors/themify-icons/css/themify-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="user/css/user.css">
<head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="user/imgs/logoboonda.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- WhatsApp Popup -->
    <div class="whatsapp-popup" id="whatsappPopup">
        <img src="user/imgs/whatsapp.png" alt="Chat with us on WhatsApp" id="whatsappIcon" style="cursor: pointer;">

        <!-- Hidden Popup for Numbers -->
        <div class="whatsapp-options rounded" id="whatsappOptions" style="display: none;">
            <p class="m-0 text-center">
                Haii... PapaBoonda
                <br>
                Jangan Ragu untuk Bertanya!
            </p>
            <a href="https://wa.me/6281276001730" target="_blank" class="btn-btn-whatsapp">
                <img src="user/imgs/whatsapp.png" alt="CS Pendaftaran" class="btn-icon"> CS Pendaftaran
            </a>
            <a href="https://wa.me/6281234474107" target="_blank" class="btn-btn-whatsapp">
                <img src="user/imgs/whatsapp.png" alt="CS Pendaftaran" class="btn-icon"> CS Pengaduan
            </a>
        </div>
    </div>

    <!-- JavaScript to toggle the popup -->
    <script>
        document.getElementById("whatsappIcon").addEventListener("click", function() {
            var options = document.getElementById("whatsappOptions");
            if (options.style.display === "none" || options.style.display === "") {
                options.style.display = "block";
            } else {
                options.style.display = "none";
            }
        });

        // Close the popup when clicking outside
        window.onclick = function(event) {
            var options = document.getElementById("whatsappOptions");
            if (event.target !== document.getElementById("whatsappIcon") && options.style.display === "block") {
                options.style.display = "none";
            }
        };
    </script>

    <section id="katalog" class="section mt-5">
        <div class="container text-center">

            <h6 class="custom-titlegal ">Katalog</h6>

            <!-- Buttons and Dropdown Section -->
            
   <!-- Buttons and Dropdown Section -->
            <div class="mb-4 d-flex justify-content-between flex-wrap">

                <!-- Dropdown Kota -->
                <div class="dropdown flex-fill mx-1">
                    <button class="btn btn-katalog btn-sm rounded-pill dropdown-toggle w-100" type="button"
                        id="dropdownTempat" data-toggle="dropdown" aria-expanded="false">
                        Kota
                    </button>
                    <ul class="dropdown-menu w-100 " aria-labelledby="dropdownTempat">
                        <li><a class="dropdown-item" href="#">Malang</a></li>
                        <li><a class="dropdown-item" href="#">Surabaya</a></li>
                        <li><a class="dropdown-item" href="#">Mojokerto</a></li>
                    </ul>
                </div>
                <!-- Dropdown kolaborator -->
                <div class="dropdown flex-fill mx-1">
                    <button class="btn btn-katalog btn-sm rounded-pill dropdown-toggle w-100" type="button"
                        id="dropdownTempat" data-toggle="dropdown" aria-expanded="false">
                        Kolaborator
                    </button>
                    <ul class="dropdown-menu w-100 " aria-labelledby="dropdownTempat">
                        <li><a class="dropdown-item" href="#">Sertifikat</a></li>
                        <li><a class="dropdown-item" href="#">Non Sertifikat</a></li>
                    </ul>
                </div>
                <!-- Dropdown fasilitas -->
                <div class="dropdown flex-fill mx-1">
                    <button class="btn btn-katalog btn-sm rounded-pill dropdown-toggle w-100" type="button"
                        id="dropdownTempat" data-toggle="dropdown" aria-expanded="false">
                        fasilitas
                    </button>
                    <ul class="dropdown-menu w-100 " aria-labelledby="dropdownTempat">
                        <li><a class="dropdown-item" href="#">Sertifikat</a></li>
                        <li><a class="dropdown-item" href="#">Non Sertifikat</a></li>
                    </ul>
                </div>
                <!-- Dropdown Status -->
                <div class="dropdown flex-fill mx-1">
                    <button class="btn btn-katalog btn-sm rounded-pill dropdown-toggle w-100" type="button"
                        id="dropdownTempat" data-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu w-100 " aria-labelledby="dropdownTempat">
                        <li><a class="dropdown-item" href="#">Online</a></li>
                        <li><a class="dropdown-item" href="#">Offline</a></li>
                    </ul>
                </div>

                <!-- Dropdown rating-->
                <div class="dropdown flex-fill mx-1">
                    <button class="btn btn-katalog btn-sm rounded-pill dropdown-toggle w-100" type="button"
                        id="dropdownUsia" data-toggle="dropdown" aria-expanded="false">
                        Rating
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownUsia">
                        <li><a class="dropdown-item" href="#">bintang 1</a></li>
                        <li><a class="dropdown-item" href="#">bintang 2</a></li>
                        <li><a class="dropdown-item" href="#">bintang 3</a></li>
                        <li><a class="dropdown-item" href="#">bintang 4</a></li>
                        <li><a class="dropdown-item" href="#">bintang 5</a></li>
                    </ul>
                </div>
            </div>

            <div class="row text-left">
                <!-- Card 1 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>



                <!-- Card 2 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- Card 3 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- Card 4-->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- Card 5 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- Card 6 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>



                <!-- Card 7 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Card 8 -->
                <div class="col-md-3 p-3">
                    <div class="card border mb-4" style="border-radius: 20px;">
                        <a href="{{ url('detailcard') }}" style="text-decoration: none; color: inherit;">
                            <img src="user/imgs/blog-2.jpg" alt="Design for Everyone" class="card-img-top w-100"
                                style="border-radius: 20px;">
                            <div class="mb-2 p-2">
                                <div class="status small text-muted"><i
                                        class="bi bi-circle-fill icon-small mr-1"></i>sedang berlangsung</div>
                                <div class="title">Jadi Pendongeng? Berani Dong!</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> Mojangangu Malang
                                    <br>
                                    <i class="bi-calendar"></i> 12 Agustus 2024
                                </div>
                                <div class="flex-fill text-primary">Rp.100000</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col text-center mt-4 ">
                    <a href="/katalog"class="btn btn-primary rounded-pill">Selengkapnya ...</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
  <footer class="custom-footer">
    <div class="footer-container">
        <div class="row">
            <div class="col-sm-6 ">
                <div style="display: flex; flex-direction: column; align-items: flex-start;">
                    <!-- Teks -->
                    <div style="margin-bottom: 20px;">
                        
                         <img  src="user/imgs/boondaputih.png" alt="BoondaChildCare" style="max-width: 60%; height: auto;">
                    </div>
                    <!-- Sosial Media -->
                    <div class="socials">
                        <a href="https://boonda.id/index" style="margin-right: 20px;">
                            <i class="bi bi-google" style="font-size: 20px; color: #fff;"></i>
                        </a>
                        <a  href="https://www.instagram.com/boonda_id/" style="margin-right: 20px;">
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
                            <li><a href="#" style="color: #fff; text-decoration: none;">About Lift</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Environment</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Jobs</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Privacy Policy</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    <!-- Section Pusat Dukungan -->
                    <div style="margin-right: 30px;">
                        <h5 class="fot-title">Pusat Dukungan</h5>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li><a href="#" style="color: #fff; text-decoration: none;">Lift Tickets</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Season Passes</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">Vacation Packages</a></li>
                        </ul>
                    </div>
                    
                    <!-- Section Kantor -->
                    <div style="margin-right: 30px;">
                        <h5 class="fot-title">Kantor</h5>
                         <ul style="list-style: none; padding: 0; margin: 0;">
                           <li><a href="#" style="color: #fff; text-decoration: none;">Jl. Borobudur Agung Tim. II/2<br>Malang, Jawa Timur</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">+62 812-3447-4107</a></li>
                            <li><a href="#" style="color: #fff; text-decoration: none;">contact@boonda.id</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; color: #fff; margin-top: 50px;">
            © 2024 Boonda Childcare | All Rights Reserved
        </div>
    </div>
        </div>
    </div>
</footer>


<!-- Popper.js (Versi untuk Bootstrap 5) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap 5.1.3 JS (Tanpa jQuery) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Steller Custom JS -->
<script src="{{ asset('user/js/steller.js') }}"></script>

</body>

</html>
