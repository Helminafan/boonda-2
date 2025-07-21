@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Kolaborator</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Kolaborator</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('kolaborator.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body row">
                                    <div class="form-group col-6">
                                        <label for="name">Nama Kolaboratorr</label>
                                        <input type="text" name="name" class="form-control"
                                            id="name" placeholder="Nama Kolaborator">
                                    </div>
                                  
                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="email" placeholder="Email Kolaborator">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="no_telp">No Hp</label>
                                        <div class="custom-file">
                                            <input type="number" name="no_telp" class="form-control" placeholder="nomor hp Kolaborator">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password">Password</label>
                                        <div class="custom-file">
                                            <input type="text" name="password" class="form-control" id="password" placeholder="password untuk login Kolaborator">  
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="deskripsi">Deskripsi</label>
                                        <div class="custom-file">
                                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="name bank Kolaborator">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="photo">Foto Profile</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="form-control-file" id="photo" placeholder="nomor rekening Kolaborator"> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    no_telp: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    deskripsi: {
                        required: true
                    },
                    photo: {
                        required: true
                    },
                },
                
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
