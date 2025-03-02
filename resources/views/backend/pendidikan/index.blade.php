@extends('backend/layouts.templates')


@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="bi bi-file-earmark-bar-graph"></i> Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li><i class="bi bi-house-door-fill"></i><a href="{{ url('dashboards') }}">Home</a></li>
                    <li><i class="bi bi-file-earmark-bar-graph"></i>Riwayat Hidup</li>
                    <li><i class="bi bi-card-list"></i>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>
       <!-- Form Validations -->
       <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pendidikan
                </header>
                <div class="panel-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <a href="{{ route('pendidikan.create') }}"><button class="btn btn-primary"
                        type="button"><i class="bi bi-plus-lg">Tambah</i></button></a>

                    <br><br>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th><i class="bi bi-file-earmark-person"></i> Nama</th>
                                <th><i class="bi bi-briefcase-fill"></i> Tingkatan</th>
                                <th><i class="bi bi-calendar"></i> Tahun Masuk</th>
                                <th><i class="bi bi-calendar2-check-fill"></i> Tahun Selesai</th>
                                <th><i class="bi bi-pencil-square"></i>Action</th>
                            </tr>
                            @foreach ($pendidikan as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if ($item->tingkatan==1)
                                        TK
                                    @elseif ($item->tingkatan==2)
                                        SD
                                    @elseif ($item->tingkatan==3)
                                        SMP
                                    @elseif ($item->tingkatan==4)
                                        SMA/SMK/MA
                                    @elseif ($item->tingkatan==5)
                                        D3
                                    @elseif ($item->tingkatan==6)
                                        D4/S1
                                    @elseif ($item->tingkatan==7)
                                        S2
                                    @elseif ($item->tingkatan==8)
                                        S3
                                    @endif
                                </td>
                                <td>{{ $item->tahun_masuk }}</td>
                                <td>{{ $item->tahun_keluar }}</td>
                                <td>
                                    <div class="btn_group">
                                        <form action="{{ route('pendidikan.destroy', $item->id)}}" method="POST">
                                            <a class="btn btn-warning" href="{{ route('pendidikan.edit', $item->id)}}">
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
