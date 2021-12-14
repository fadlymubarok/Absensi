<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="assets/login/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <div class="position-absolute top-50 start-50 translate-middle col-lg-4">
            <form action="/" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please Login</h1>
                @if(session('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ session('gagal') }}
                </div>
                @endif
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" placeholder="name">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </div>
    </main>



</body>

</html>