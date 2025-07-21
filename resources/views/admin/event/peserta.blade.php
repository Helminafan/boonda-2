@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Peserta</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">event</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">DataTable Peserta</h3>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Peserta</th>
                                            <th>No Tiket</th>
                                            <th>Tanggal</th>
                                            <th>Waktu Mulai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peserta as $item)
                                            @php
                                                $tanggal = $item->created_at->format('Ymd');
                                                $idFormatted = str_pad($item->id, 5, '0', STR_PAD_LEFT);
                                                $kode_tiket = "$tanggal-$idFormatted";
                                            @endphp
                                            <tr>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $kode_tiket }}</td>
                                                <td>{{ $item->event->tanggal }}</td>
                                                <td>{{ $item->event->waktu_mulai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
