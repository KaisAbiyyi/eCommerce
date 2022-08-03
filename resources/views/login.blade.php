<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('login') }}" method="post" class="card p-3 border-0 bg-light rounded-5 col-10 col-md-6 col-lg-4 m-auto">
            @csrf
            <h2 class="text-center mb-3">LOGIN</h2>
            @if(Session::has('status'))
            <div class="alert alert-secondary"><span>{{ Session::get('status') }}</span></div>
            @endif
            <div class="mb-3">
                <input type="text" class="form-control rounded-4 p-2 ps-3" id="usernameInput" placeholder="Your Username" required name="username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control rounded-4 p-2 ps-3" id="passwordInput" placeholder="Your Password" required name="password">

            </div>
            <button type="submit" class="btn btn-success rounded-4">Login</button>
            <a href="{{ route('register.view') }}" class="text-center text-success mt-2 ">Belum Punya Akun</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
