<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kayak classroom</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>

<body style="background: linear-gradient(90deg, hsla(284, 100%, 33%, 1) 14%, hsla(345, 74%, 58%, 1) 50%, hsla(255, 84%, 36%, 1) 100%);">
    <section class="">
        <div class="container py-5 h-100"><br>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="text-center"><b>E-Tugas</b><br>Thamsies</h3>
                                    <hr>
                                    @if (session('error'))
                                        <div class="alert alert-danger"> <b>Opps!</b>

                                            {{ session('error') }} </div>
                                    @endif
                                    <form action="{{ route('aksilogin') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email</label>

                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email" required="">

                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required="">

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">Log

                                            In</button>

                                        <hr>
                                        <p class="text-center">Belum punya akun? <a href="/register">Register</a>
                                            sekarang!</p>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
