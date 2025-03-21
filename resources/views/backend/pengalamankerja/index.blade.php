@extends('backend/layouts.templates')


@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">

                <ul class="sidebar-nav" id="sidebar-nav">

                  </ul>
            </div>
        </div>
        <!-- Form Validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pengalaman Kerja
                        <br>
                    </header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <br>
                        <a href="{{ route('pengalaman_kerja.create') }}"><button class="btn btn-primary"
                            type="button"><i class="bi bi-plus-lg">Tambah</i></button></a>

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


                                            <form action="{{ route('pengalaman_kerja.destroy', $item->id)}}" method="POST">
                                                <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit', $item->id)}}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
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
