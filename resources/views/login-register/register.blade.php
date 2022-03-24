<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="/register" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name"
                                        class="@error('name') is-invalid @enderror form-control form-control-user"
                                        id="name" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="number_id"
                                        class="@error('number_id') is-invalid @enderror form-control form-control-user"
                                        id="number_id" placeholder="Number Id" value="{{ old('number_id') }}">
                                    @error('number_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-groupform-group">
                                    <select name="school_class" class="form-select form-control-user" id="school_class">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($class as $item)
                                            @if (old('school_class') == $item->class_name)
                                                <option value="{{ $item->class_name }}" selected>
                                                    {{ $item->class_name }}</option>
                                            @else
                                                <option value="{{ $item->class_name }}">{{ $item->class_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> </br>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="@error('password') is-invalid @enderror form-control form-control-user"
                                        id="password" placeholder="Password" value="{{ old('password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" id="image">
                                </div>
                                <input type="hidden" name="role" value="Student">
                                <button class="btn btn-primary btn-user btn-block"> Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
