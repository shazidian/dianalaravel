@extends('backend/layouts.templates')


@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                {{-- <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboards') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                </ol> --}}
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
        <!-- Form Validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pengalaman Kerja
                    </header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <a href="{{ route('pengalaman_kerja.create') }}"><button class="btn btn-primary"
                            type="button"><i class="fa fa-plus">Tambah</i></button></a>

                        <br><br>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="bi bi-file-earmark-person"></i> Nama Perusahaan</th>
                                    <th><i class="bi bi-briefcase-fill"></i> Jabatan</th>
                                    <th><i class="bi bi-calendar"></i> Tahun Masuk</th>
                                    <th><i class="bi bi-calendar2-check-fill"></i> Tahun Selesai</th>
                                    <th><i class="bi bi-pencil-square"></i>Action</th>
                                </tr>
                                @foreach ($pengalaman_kerja as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn_group">

                                            <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $item->id)}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <!--page end-->

    </section>
</section>
@endsection
