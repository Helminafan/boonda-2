@extends('kolaborator.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>E-commerce</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">E-commerce</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{ $event->nama_event }}</h3>
                            <div class="col-12">
                                <img src="{{ asset('storage/' . $event->gambar) }}" class="product-image"
                                    alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $event->nama_event }}</h3>
                            <p>
                                {!! $event->deskripsi_event !!}
                            </p>

                            <hr>
                            <h4>Tanggal Mulai</h4>
                            <p>
                                Tanggal: {{ $event->tanggal }}<br>
                                Waktu: {{ $event->waktu_mulai }} - Selesai
                            </p>
                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    Rp. {{ number_format($event->harga, 0, ',', '.') }} IDR
                                </h2>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Daftar Harga</a>

                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active  " id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab">
                                <div class="row">
                                    @foreach ($hargaevent as $hargaeve)
                                        <div class="col" style="width: 200px; min-width: 200px;">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ $hargaeve->nama_harga }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    Rp. {{ number_format($hargaeve->harga, 0, ',', '.') }} IDR
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                            

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
