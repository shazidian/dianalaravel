<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone PDF Upload in Laravel</h1><br>
                <form action="{{ url('/pdf/store') }}" method="post" name="file" files="true"
                 enctype="multipart/form-data" class="dropzone" id="pdf-upload">
                    @csrf
                </form>
                <button type="button" id="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#pdf-upload', {
            maxFilesize: 40,
            acceptedFiles: ".pdf",
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function () {
                // AKSI KETIKA BUTTON UPLOAD DI KLIK
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });
                this.on('sending', function(file, xhr, formData) {
            // Tambahkan semua input form ke formData Dropzone yang akan POST
            var data = $('#pdf-upload').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
        });
            }
        });
        </script>
</body>
</html>
