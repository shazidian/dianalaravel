@extends('backend/layouts.templates')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ul class="sidebar-nav" id="sidebar-nav">

                    <li class="nav-item">
                      <a class="nav-link " href="index.html">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                      </a>
                    </li><!-- End Dashboard Nav -->
                    <li class="nav-item">
                      <a class="nav-link " href="index.html">
                        <i class="bi bi-menu-button-wide"></i>
                        <span>Profile</span>
                      </a>
                    </li><!-- End Dashboard Nav -->

                    <li class="nav-item">
                      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
                      </a>
                      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                          <a href="{{ url('pendidikan') }}">
                            <i class="bi bi-circle"></i><span>Pendidikan</span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ url('pengalaman_kerja') }}">
                            <i class="bi bi-circle"></i><span>Pengalaman Kerja</span>
                          </a>
                        </li>
                        <li>
                      </ul>
                    </li><!-- End Forms Nav -->

                  </ul>
            </div>
        </div>
        <!-- Form validations-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pengalaman Kerja
                    </header>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="pengalaman_kerja_form" method="POST"
                            action="{{ route('pengalaman_kerja.index') }}">
                                {!! csrf_field() !!}
                                {{-- nama perusahaan --}}
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Nama Perusahaan <span
                                        class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="nama" name="nama" minlength="5" type="text"
                                        required />
                                    </div>
                                </div>
                               {{-- nama jabatan --}}
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Jabatan <span
                                        class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="jabatan" name="jabatan" minlength="2" type="text"
                                        required />
                                    </div>
                                </div>
                                {{-- tahun masuk --}}
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Tahun Masuk <span
                                        class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control"
                                        required>
                                    </div>
                                </div>
                                {{-- tahun keluar --}}
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-2">Tahun Selesai <span
                                        class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control"
                                        required>
                                    </div>
                                </div>
                                {{-- button save dan cancel --}}
                                <div class="form-group">
                                     <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn_primary" type="submit">Save</button>
                                        <a href="{{ route('pengalaman_kerja.index') }}"><button class="btn btn_default"
                                            type="button">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
{{-- page end --}}

    </section>
</section>
@endsection
@push('content-css')
<link href="{{ asset('backend/assets/css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
@endpush
@push('content-js')
    <script src="{{ asset('backend/assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $('#tahun_masuk').datepicker({
            format: "yyyy",
            viewMode = "years"
            minViewMode = "years"
        });
        $('#tahun_keluar').datepicker({
            format: "yyyy",
            viewMode = "years"
            minViewMode = "years"
        });

    </script>
@endpush
