<!DOCTYPE html>
<html>
<head>
    <title>Upload File Dengan Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-5">Upload File Dengan Laravel</h2>
            <div class="col-lg-8 mx-auto my-5">
                <!-- Peringatan Jika Error -->
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('upload.proses') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <b>File Gambar</b><br/>
                        <input type="file" name="file">
                    </div>

                    <div class="form-group">
                        <b>Keterangan</b>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>

                    <input type="submit" value="Upload" class="btn btn-primary">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close text-decoration-none"
                        data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('success') }}

                    </div>

                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close text-decoration-none"
                        data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('error') }}
                    </div>

                    @endif
                    <form action="{{ route('upload.proses') }}" method="POST"
                     enctype="multipart/form-data">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
