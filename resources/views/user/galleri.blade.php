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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo&display=swap" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="pay">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-warning" data-spy="affix" data-offset-top="0">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="user/imgs/logoboonda.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/') }}#home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:history.back()" class="btn btn-primary rounded">Kembali</a>
                    </li>
                    
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
    <

    
<section id="galeri" class="section">
    <div class="container text-center">
        <h6 class="custom-titlegal">Gallery</h6>
    </div>
    <div class="container text-center">
        <!-- Button Group -->
        <div class="mb-4 d-flex justify-content-between flex-wrap">
            @foreach ($years as $year)
                <button class="btn btn-primary btn-sm rounded-pill flex-fill mx-1" onclick="filterImages({{ $year->tahun }})">{{ $year->tahun }}</button>
            @endforeach        
        
            <!-- Dropdown Button -->
            <div class="dropdown flex-fill mx-1">
                <button class="btn btn-primary btn-sm rounded-pill dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pilih Tahun
                </button>
                <div class="dropdown-menu primary w-100 rounded-lg" aria-labelledby="dropdownMenuButton">
                    @foreach ($years2 as $year)
                        <a class="dropdown-item" href="#" onclick="filterImages({{ $year->tahun }})">{{ $year->tahun }}</a>
                    @endforeach
                </div>
            </div>
        </div>        

        <!-- Galeri Foto -->
        <div class="gallery">
            @foreach ($images as $image)
                <div class="gallery-item p-2">
                    <img src="{{ asset('storage/' . $image->foto) }}" alt="Foto {{ $loop->iteration }}">
                </div>
            @endforeach

            <!-- Button to add images -->
            
        </div>
        <a class="btn btn-primary add-image-btn rounded-pill  mt-3" href="{{ route('images.index') }}">Tambah Gambar</a>
    </div>
</section>

<script>
function filterImages(year) {
    window.location.href = "{{ route('user.galleri') }}?year=" + year;

    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.classList.remove('show'); 
    });
    
    setTimeout(() => {
        galleryItems.forEach(item => {
            item.classList.add('show');
        });
    }, 100);
}
</script>


@push('js')
@endpush


  
    <!-- JavaScript -->
    <script>
        let isLightboxOpen = false;

        function toggleLightbox(imgElement) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');

            if (isLightboxOpen) {
                lightbox.style.display = 'none';
                isLightboxOpen = false;
            } else {
                lightbox.style.display = 'flex';
                lightboxImage.src = imgElement.src;
                isLightboxOpen = true;
            }
        }

        function closeLightbox() {
            if (isLightboxOpen) {
                const lightbox = document.getElementById('lightbox');
                lightbox.style.display = 'none';
                isLightboxOpen = false;
            }
        }
    </script>
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


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

