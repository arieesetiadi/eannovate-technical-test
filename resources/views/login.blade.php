<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Eannovate | Login</title>

    {{-- Styles --}}
    <link rel="stylesheet"
          href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            {{-- Brand Logo --}}
            <div class="col-12 my-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/logo/eannovate-white.png') }}"
                         alt="Innovate white logo"
                         class="img-invert">
                </div>
                <h3 class="text-center font-weight-bolder">Technical Test</h3>
            </div>

            {{-- Login Section --}}
            <div class="col-12 d-flex justify-content-center">
                <div class="card">
                    <div class="card-body shadow p-5">
                        {{-- Login Form --}}
                        <form action="{{ route('login') }}"
                              method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="label-login"
                                       for="username">🧑‍💼Username :</label>
                                <input name="username"
                                       type="text"
                                       class="form-control form-control-lg mt-1"
                                       id="username"
                                       placeholder="Masukan username">
                            </div>
                            <div class="form-group mb-4">
                                <label class="label-login"
                                       for="password">🔑Password :</label>
                                <input name="password"
                                       type="password"
                                       class="form-control form-control-lg mt-1"
                                       id="password"
                                       placeholder="Masukan password">
                            </div>
                            <button type="submit"
                                    title="Submit Login"
                                    class="btn btn-primary btn-lg w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
