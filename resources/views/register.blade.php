<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <form action="{{ route('register.proccess') }}" method="POST" class="card p-4 bg-light border-0 rounded-5 col-10 col-lg-5 m-auto">
            @csrf
            <h3 class="text-center mb-3">Silahkan Isi Data Customer</h3>
            <div class="mb-3">
                <input class="form-control rounded-4 p-2 ps-3" placeholder="Your Name..." type="text" required name="name">
            </div>
            <div class="mb-3">
                <input class="form-control rounded-4 p-2 ps-3" placeholder="Your Username..." type="text" required name="username" id="inputUsername">
            </div>
            <div class="mb-3">
                <input class="form-control rounded-4 p-2 ps-3" placeholder="Your Password" type="password" name="password" required id="inputPassword">
            </div>
            <button type="submit" class="btn btn-success rounded-4 p-2 ps-3">Sign Up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
