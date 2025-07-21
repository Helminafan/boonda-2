<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <title>BoondaChildCare</title>

    <!-- Link to Favicon -->
    <link rel="icon" href="{{ asset('user/imgs/logotabb.png') }}" type="image/x-icon">

    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('user/vendors/themify-icons/css/themify-icons.css') }}">

    <!-- Bootstrap + Steller main styles -->
    <link rel="stylesheet" href="{{ asset('user/css/user.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- font  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Baloo&display=swap" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="pay">

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
                        <a class="nav-link text-white" href="{{ url('/') }}#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#Pay">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#rekomendasi">Rekomendasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('kelasku.view') }}">Kelasku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="javascript:history.back()"
                            class="btn btn-primary rounded">Kembali</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white btn-primary rounded-pill d-flex align-items-center"
                                href="{{ Route('admin.logout') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white btn-primary rounded-pill d-flex align-items-center"
                                href="{{ Route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    // Hapus kelas 'active' dari semua elemen
                    navLinks.forEach(function(nav) {
                        nav.classList.remove('active');
                    });

                    // Tambahkan kelas 'active' ke elemen yang diklik
                    this.classList.add('active');
                });
            });
        });
    </script>
    <div class="whatsapp-popup" id="whatsappPopup">
        <img src="{{ asset('user/imgs/whatsapp.png') }}" alt="Chat with us on WhatsApp" id="whatsappIcon"
            style="cursor: pointer;">

        <!-- Hidden Popup for Numbers -->
        <div class="whatsapp-options rounded" id="whatsappOptions" style="display: none;" class="header">
            <p class="m-0 text-center"">
                Haii... PapaBoonda
                <br>
                Jangan Ragu untuk Bertanya!
            </p>
            <a href="https://wa.me/6281276001730" target="_blank"class="btn-btn-whatsapp">
                <img src="{{ asset('user/imgs/whatsapp.png') }}" alt="CS Pendaftaran" class="btn-icon"> CS Pendaftaran
            </a>
            <a href="https://wa.me/6281234474107" target="_blank"class="btn-btn-whatsapp">
                <img src="{{ asset('user/imgs/whatsapp.png') }}" alt="CS Pendaftaran" class="btn-icon"> CS Pengaduan
            </a>
        </div>
    </div>

    <!-- CSS for styling -->



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



    {{-- batas nav --}}
    <section id="pay">
        <div class="container mt-5 mb-5 pt-5">
            @foreach ($data as $item)
                <div class="card my-2">

                    <div class="row p-4 align-items-center">

                        <div class="col-3">
                            <div class="card border mb-4" style="border-radius: 20px;">

                                <img src="{{ asset('storage/' . $item->event->gambar) }}" alt="Design for Everyone"
                                    class="card-img-top w-100" style="border-radius: 20px;">
                            </div>
                        </div>
                        <!-- Content Column -->
                        <div class="col-6">
                            <div class="mb-2 p-2">
                                <div class="title">{{ $item->event->nama_event }}</div>
                                <div class="info">
                                    <i class="bi-geo-alt"></i> {{ $item->event->lokasi }}
                                    <br>
                                    <i class="bi-calendar"></i> {{ $item->event->tanggal }}
                                    <br>
                                    <i class="bi-clock"></i> {{ $item->event->waktu_mulai }}
                                </div>
                                <div class="flex-fill text-primary">Rp.
                                    {{ number_format($item->event->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="col">
                            <form action="{{route('cetak.tiket',$item->id)}}" method="GET">
                                @csrf
                                <button class="btn btn-primary">cetak tiket</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
        </div>
    </section>


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
                                <li><a href="#" style="color: #fff; text-decoration: none;">About
                                        Lift</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Environment</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Jobs</a>
                                </li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Privacy
                                        Policy</a></li>
                                <li><a href="#" style="color: #fff; text-decoration: none;">Contact
                                        Us</a></li>
                            </ul>
                        </div>

                        <!-- Section Pusat Dukungan -->
                        <div style="margin-right: 30px;">
                            <h5 class="fot-title">Pusat Dukungan</h5>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><a href="#" style="color: #fff; text-decoration: none;">Lift
                                        Tickets</a></li>
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
                                <li><a href="#" style="color: #fff; text-decoration: none;">Jl.
                                        Borobudur Agung Tim. II/2<br>Malang, Jawa Timur</a></li>
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
        </div>
        </div>
    </footer>
</body>


</html>
