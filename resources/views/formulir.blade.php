<!DOCTYPE html>
<html>
    <head>
        <title>Request Dengan Input Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">Form Validation dengan Laravel</h1>
                    <form action="/formulir/proses" method="post">
                    @csrf
                    <label for="nama" class="control-label">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control
                    {{ $errors->has('nama') ? ' is-invalid' : '' }}"
                     placeholder="Nama Lengkap" value="{{ old('nama') }}">
                     @if ($errors->has('nama'))
                     <span class="text-danger small">
                        <p> {{ $errors->first('nama') }}</p>
                     </span>
                     @endif
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat</label>
                        <textarea rows="3" id="alamat" name="alamat" class="form-control
                        {{ $errors->has('alamat') ? ' is-ivalid' : '' }}"
                         placeholder="Alamat" value="{{ old('alamat') }}"></textarea>
                        @if ($errors->has('alamat'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('alamat') }}</p>
                        </span>
                        @endif
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    </form>
            </div>
        </div>
    </div>
    </body>
</html>
