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
                    <a class="nav-link text-white" href="{{ url('/') }}#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/') }}#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}#katalog">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}#ulasan">Iklan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}#galeri">Gallery</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link text-white" href="{{route('kelasku.view')}}">Kelasku</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white btn-primary rounded-pill d-flex align-items-center"
                            href="{{route('user.profiluser', Auth::user()->id)}}">
                            {{Auth::user()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white btn-primary rounded-pill d-flex align-items-center"
                            href="{{ Route('admin.logout') }}">
                            Logout
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
