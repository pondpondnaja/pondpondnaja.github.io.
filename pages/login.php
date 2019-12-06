<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/80c31a4196.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffa1f7;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand font-weight-bold" href="../index.php">UTG Fansub</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animelist.php">Anime Sub-thai</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="login.php" method="POST">
                <button class="btn btn-success my-2 my-sm-0" type="submit"
                    style="background-color: #ffa1f7; border-color: #ffa1f7;">
                    <i class="fas fa-sign-in-alt pr-2"></i>Login
                </button>
            </form>
        </div>
    </nav>
    <!-- Nav Bar -->
    <div class="login-form mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <header class="card-header text-center"
                            style="background-color: #ffa1f7; border-color: #ffa1f7; color: #ffffff;">
                            <span class="text-uppercase font-weight-bold">login</span>
                        </header>
                        <div class="card-body">
                            <form action="../querys/loginprocess.php" method="POST">
                                <div class="form-group row">
                                    <label for="user_name"
                                        class="col-12 col-md-12 col-lg-12 col-form-label text-md-left">
                                        Username / E-mail
                                    </label>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <input type="text" id="user_name" class="form-control" name="user" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_name"
                                        class="col-12 col-md-12 col-lg-12 col-form-label text-md-left">
                                        Password
                                    </label>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <input type="password" id="password" class="form-control" name="pass" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <button class="btn btn-primary text-center text-uppercase form-control"
                                            name="login" style="background-color: #ffa1f7; border-color: #ffa1f7;">
                                            login
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-12 col-md-12 col-lg-12 text-center">
                                        <p>Don't have an account ? <a href="register.php">Register</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>