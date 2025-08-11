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
    @include('sweetalert::alert')
    <div class=" container-fluid mt-5 pt-5 ">
        <div class="text-left mb-2">
            <a href="javascript:history.back()" class="btn rounded">
                <i class="bi bi-box-arrow-left"></i>
            </a>
        </div>
        <section id="kolaborator">
            <div class="col ">
                <h5 class="card-title custom-titlefax mb-3 text-center">Edit Profile</h5>
                <div class="container  mb-5 ">
                    <div class="card">
                        <form method="POST" action="{{route('user.updateprofile', $user->id)}}">
                            @csrf
                            <div class="row p-5">
                                <div class=" mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                </div>
                                <div class=" mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email"  name="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class=" mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" value="{{$user->no_telp}}" class="form-control">
                                </div>
                                <div class=" mb-3 col-6">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" value="{{$user->alamat}}" class="form-control">
                                </div>
                              
                                <button class=" mt-3 col btn btn-primary"> Edit</button>
                        </form>
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

</body>

</html>
