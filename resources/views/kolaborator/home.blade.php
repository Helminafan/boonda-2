@extends('kolaborator.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->role }}</p>

                                <p class="text-muted text-center mt-3">{{ Auth::user()->deskripsi }}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a class="nav-link active" href="#timeline"
                                            data-toggle="tab">Timeline</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- /.tab-pane -->
                                    <div class="active tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->

                                            @foreach ($events as $item)
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        {{$item->tanggal}}
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-envelope bg-primary"></i>

                                                    <div class="timeline-item">
                                                       

                                                        <h3 class="timeline-header">{{$item->nama_event}}</h3>

                                                        <div class="timeline-body">
                                                            <p> <i class="far fa-clock"> </i> {{$item->waktu_mulai}} WIB</p>
                                                            <p> <i class="fas fa-map-pin">  </i> {{$item->lokasi}}</p>
                                                            <p> <i class="fas fa-user">  </i> {{$item->kuota}} Kouta</p>
                                                            <p> {!! $item->deskripsi_event !!}</p>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- END timeline item -->
                                            <!-- timeline item -->

                                            <!-- END timeline item -->
                                            <!-- timeline item -->

                                            <!-- END timeline item -->
                                            <!-- timeline time label -->

                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route('kolaborator.editprofile', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputName"
                                                        placeholder="Name" value="{{Auth::user()->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                                        placeholder="Email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alamat" class="form-control" value="{{Auth::user()->alamat}}" id="inputName2"
                                                        placeholder="Alamat">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience"
                                                    class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="deskripsi" id="inputExperience" placeholder="Deskripsi">{{Auth::user()->deskripsi}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">No Telp</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_telp" class="form-control" id="inputSkills"
                                                       value="{{Auth::user()->no_telp}}" placeholder="Masukan No Telp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                 <label for="input foto" class="col-sm-2 col-form-label">Foto Profil</label>
                                                <div class="col-sm-0">
                                                    <input type="file" name="photo" class="form-control-file" id="input _foto" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
