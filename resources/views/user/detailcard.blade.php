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
        <div class="container mt-5 pt-5">
            <div class="text-left mb-2">
                <a href="javascript:history.back()" class="btn rounded">
                    <i class="bi bi-box-arrow-left"></i>
                </a>
            </div>
            <div class="row">
                <!-- Image Column -->
                <div class="col-6">
                    <div class="position-relative">
                        <img style="width:100%; border-radius: 10px;" src="{{ asset('storage/' . $event->gambar) }}"
                            alt="Storytelling Event" class="card-img">
                    </div>
                    <span class="badge-online">{{ $event->status }}</span>
                </div>


                <!-- Content Column -->
                <div class="col-6 card-body "style="padding-left: 80px;">
                    <div class="event-details">
                        <h3 class="text-left custom-awaldetail">{{ $event->nama_event }}!</h3>

                        <ul class="list-unstyled">
                            <li><i
                                    class="bi bi-calendar mr-1 "style="color: rgba(255, 106, 138, 1);font-size: 16px;"></i>
                                {{ $event->tanggal }}</li>
                            <li><i class="bi bi-clock mr-1"style="color: rgba(255, 106, 138, 1);font-size: 16px;"></i>
                                {{ $event->waktu_mulai }} - selesai </li>
                            <li><i class="bi bi-people mr-1"style="color: rgba(255, 106, 138, 1);font-size: 16px;"></i>
                                Kuota {{ $event->kuota }} anak</li>
                        </ul>
                        <div class="text-left"style="font-size: 10px; font-weight: bold;">
                            {!! $event->deskripsi_event !!}
                        </div>

                        {{-- <h5 class="card-title custom-detail text-left ">Fasilitas</h5>
                        <ul class="list-unstyled facilities-list">
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Modul materi</li>
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Dance and fun game</li>
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Free boneka tangan</li>
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Goodie bag and snack</li>
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Sesi foto</li>
                            <li><i class="bi bi-circle-fill icon-small mr-1"></i>Sertifikat</li>
                        </ul> --}}

                        <h5 class="card-title custom-detail text-left">Kolaborator</h5>
                        <div class="d-flex align-items-center collaborator-section">
                            <img src="{{ asset('storage/' . $event->kolaborator->profile_photo_path) }}"
                                alt="Kak Ale and Friend" style="width: 50px; height: 50px; margin-right: 10px;">
                            <div class="text-left" style="margin: 0;">
                                <div style="font-size: 14px; color: #555;">{{ $event->kolaborator->name }}</div>
                                <a href="{{ route('user.kolaborator', $event->kolaborator->id) }}"
                                    class="text-primary mr-2"
                                    style="text-decoration: none; display: block; font-size: 12px;">Lihat Profile</a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="maps" class="section ">
        <div class="container text-left">
            <h5 class="card-title custom-detail ">Lokasi</h5>
            <ul class="list-unstyled">
                <li><i class="bi bi-geo-alt mr-1"style="color: rgba(255, 106, 138, 1);"></i>{{ $event->lokasi }}</li>
            </ul>
            @if ($event->status == 'offline')
                <div class="map-responsive">
                    {!! $event->maps !!}
                </div>
            @endif
        </div>
        </div>
        @if ($pemesanan->isEmpty())
            <section id="Pay" class="section ">
                <div class="container-detailcard mt-5">
                    <div class="title">Daftar Harga</div>
                    <div class="grid">
                        <div class="itemdetail">
                            <div class="item-text">
                                <p>Early Bird</p>
                                <div class="item-price">
                                    <p>Rp {{ number_format($event->harga, 0, ',', '.') }}</p>

                                </div>

                            </div>
                            @auth
                                <!-- Sudah login -->
                                <button class="btn-card btn-primary rounded-pill"
                                    onclick="bayar({{ $event->harga }}, {{ $event->id }}, '{{ addslashes('Early Bird') }}')">
                                    Pesan
                                </button>
                            @else
                                <!-- Belum login -->
                                <a href="{{ route('login') }}" class="btn-card text-center btn-primary rounded-pill">
                                    Pesan
                                </a>
                            @endauth


                        </div>

                        @foreach ($hargaevent as $itemharga)
                            <div class="itemdetail">
                                <div class="item-text">
                                    <p>{{ $itemharga->nama_harga }}</p>
                                    <div class="item-price">
                                        <p>Rp. {{ number_format($itemharga->harga, 0, ',', '.') }}</p>

                                    </div>

                                </div>
                                @auth

                                    <button class="btn-card btn-primary rounded-pill"
                                        onclick="bayar({{ $itemharga->harga }}, {{ $event->id }}, '{{ addslashes($itemharga->nama_harga) }}')">Pesan</button>
                                @else
                                    <!-- Belum login -->
                                    <a href="{{ route('login') }}" class="btn-card text-center btn-primary rounded-pill">
                                        Pesan
                                    </a>
                                @endauth


                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

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
<script>
    function bayar(harga, id_event = null, jenis_tiket = null) {
        fetch("{{ route('pembayaranevent') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    harga
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    snap.pay(data.token, {
                        onSuccess: function(result) {
                            alert("Pembayaran berhasil!");
                            sendResponForm(id_event, harga, jenis_tiket);
                        },
                        onPending: function(result) {
                            alert("Menunggu pembayaran.");
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal.");
                        },
                        onClose: function() {
                            alert("Anda menutup popup pembayaran.");
                        }
                    });
                } else {
                    alert("Gagal mendapatkan token pembayaran.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat memproses pembayaran.");
            });
    }

    function sendResponForm(id_event, harga, jenis_tiket) {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('pemesanan') }}";

        let csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = "{{ csrf_token() }}";
        form.appendChild(csrf);

        let input1 = document.createElement('input');
        input1.type = 'hidden';
        input1.name = 'id_event';
        input1.value = id_event;
        form.appendChild(input1);

        let input2 = document.createElement('input');
        input2.type = 'hidden';
        input2.name = 'harga';
        input2.value = harga;
        form.appendChild(input2);

        let input3 = document.createElement('input');
        input3.type = 'hidden';
        input3.name = 'jenis_tiket';
        input3.value = jenis_tiket;
        form.appendChild(input3);

        document.body.appendChild(form);
        form.submit();
    }
</script>

</html>
