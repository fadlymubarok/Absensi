<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Absensi</title>
</head>

<body>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle shadow w-50">
            <form action="/absensi-tidak-hadir" method="post" enctype="multipart/form-data">
                @csrf
                <div class="alert alert-light" role="alert">
                    <div class="d-grid gap-2 col-6 mx-auto py-2">
                        <div>
                            <input class="form-control" type="hidden" id="nis" name="nis" value="{{ auth()->user()->nis }}">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <select class="form-select" name="keterangan">
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Alfa">Alfa</option>
                            </select>
                            <div class="mt-2">
                                <label for="image" class="form-label">Upload Bukti</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>