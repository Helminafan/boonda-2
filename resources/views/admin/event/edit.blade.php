@extends('admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Event</h1>
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
                        <div class="card ccard card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Event</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('event.update', $event->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body row">
                                    <div class="form-group col-6">
                                        <label for="name">Nama Event</label>
                                        <input type="text" name="nama_event" value="{{$event->nama_event}}" class="form-control" id="name"
                                            placeholder="Nama Event">
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Kolaborator</label>
                                        <select name="kolaborator_id" class="form-control " style="width: 100%;">
                                            <option selected="selected" value="">Pilih Kolaborator</option>
                                            @foreach ($kolaborators as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="harga">Harga</label>
                                        <div class="custom-file">
                                            <input type="number" name="harga" class="form-control"
                                                placeholder="masukan harga">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="harga">tanggal</label>
                                        <div class="custom-file">
                                            <input type="date" name="tanggal" class="form-control"
                                                placeholder="nomor hp Event">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="waktu_mulai">Lokasi</label>
                                        <div class="custom-file">
                                            <input type="text" name="lokasi" class="form-control" 
                                                placeholder="masukan Lokasi event">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="waktu_mulai">Waktu Mulai</label>
                                        <div class="custom-file">
                                            <input type="time" name="waktu_mulai" class="form-control" id="waktu_mulai"
                                                placeholder="waktu_mulai untuk login Event">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control" id="status" style="width: 100%;">
                                            <option value="offline">Offline</option>
                                            <option value="online">Online</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6" id="lokasi-wrapper">
                                        <label for="lokasi">Maps</label>
                                        <div class="custom-file">
                                            <input type="text" name="maps" class="form-control" id="lokasi"
                                                placeholder="Masukkan lokasi maps <frame..... ">
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="waktu_mulai">kuota</label>
                                        <div class="custom-file">
                                            <input type="number" name="kuota" class="form-control" id="waktu_mulai"
                                                placeholder="masukan kouta event">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputFile">Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <div>
                                            <textarea name="deskripsi_event" id="summernote"></textarea>
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
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            const lokasiWrapper = document.getElementById('lokasi-wrapper');

            statusSelect.addEventListener('change', function() {
                if (this.value === 'online') {
                    lokasiWrapper.innerHTML = `
                    <label for="link_zoom">Link Zoom</label>
                    <div class="custom-file">
                        <input type="text" name="link_zoom" class="form-control" id="link_zoom"
                            placeholder="Masukkan link Zoom">
                    </div>
                `;
                } else {
                    lokasiWrapper.innerHTML = `
                    <label for="maps">Maps</label>
                    <div class="custom-file">
                        <input type="text" name="maps" class="form-control" id="maps"
                            placeholder="Masukkan maps <frame....">
                    </div>
                `;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $('.select2').select2()

        $(function() {
            bsCustomFileInput.init();
        });
        $(function() {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    harga: {
                        required: true
                    },
                    waktu_mulai: {
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
