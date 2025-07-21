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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo&display=swap" rel="stylesheet">

    <!-- font icons -->
    <link rel="stylesheet" href="user/vendors/themify-icons/css/themify-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!--css -->
    <link rel="stylesheet" href="user/css/user.css">


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page navigation -->
    @include('user.navbar')

</body>

</html>
<!-- End of page navibation -->

<!-- HTML for WhatsApp Popup -->
<div class="whatsapp-popup" id="whatsappPopup">
    <img src="user/imgs/whatsapp.png" alt="Chat with us on WhatsApp" id="whatsappIcon" style="cursor: pointer;">

    <!-- Hidden Popup for Numbers -->
    <div class="whatsapp-options" id="whatsappOptions" style="display: none;" class="header">
        <p class="custom-wa m-0 text-center"">
            Haii... Papa Boonda
            <br>
            Jangan Ragu untuk Bertanya!
        </p>
        <hr class="separator">
        <a href="https://wa.me/6281276001730" target="_blank" class="btn-btn-whatsapp rounded">
            CS Pendaftaran
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@yield('user')
<!-- Page Header -->


<!-- Page Footer -->
@include('user.footer')

<!-- End of page footer -->



<!-- End of page footer -->

<!-- core  -->
@stack('js')

<!-- jQuery (gunakan satu sumber saja, CDN atau lokal) -->
<!-- Popper.js (Versi untuk Bootstrap 5) -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap 5.1.3 JS (Tanpa jQuery) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Steller Custom JS -->
<script src="{{ asset('user/js/steller.js') }}"></script>
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

{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Popper.js dan Bootstrap JS (pastikan versi yang sama digunakan) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Steller Custom JS -->
    <script src="{{ asset('assets/js/steller.js') }}"></script> --}}

</body>

</html>
