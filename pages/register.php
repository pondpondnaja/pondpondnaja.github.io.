<?php
    session_start();
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/80c31a4196.js" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <title>Register</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animelist.php">Anime Sub-thai</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right mt-2 mt-lg-0">
                <?php
                if (!empty($_SESSION['user_name']) and $_SESSION['status'] == 'Admin') {
                    $name = $_SESSION['user_name'];
                    echo "
                    <div class='dropdown'>
                        <button class='btn btn-outline-light' id='dropdownMenu2' 
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'
                                style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                            <i class='fas fa-sign-in-alt pr-2'></i>$name
                        </button>
                        <form class='dropdown-menu dropdown-menu-right' id='detail-form'>
                            <div class='form-group text-center'>
                                <span class='dropdown-header font-weight-bold'
                                      style='color: #000000; background-color: #ffa1f7;
                                      font-size: 1.5rem;'>
                                    Welcome back
                                </span>
                            </div>
                            <div class='p-3'>
                                <div class='form-group mt-3'>
                                    <button id='logout_btn' class='btn btn-primary form-control'
                                            style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                                        Log out
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>";
                } else if (!empty($_SESSION['user_name']) and $_SESSION['status'] == 'User') {
                    $name = $_SESSION['user_name'];
                    echo "
                    <div class='dropdown'>
                        <button class='btn btn-outline-light' id='dropdownMenu2' 
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'
                                style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                            <i class='fas fa-sign-in-alt pr-2'></i>$name
                        </button>
                        <form class='dropdown-menu dropdown-menu-right' id='detail-form'>
                            <div class='form-group text-center'>
                                <span class='dropdown-header font-weight-bold'
                                      style='color: #000000; background-color: #ffa1f7;
                                      font-size: 1rem;'>
                                    Welcome back
                                </span>
                            </div>
                            <div class='p-3'>
                                <div class='form-group text-center'>
                                    <span class='' style='color: #000000;'>
                                        $name
                                    </span>
                                </div>
                                <div class='form-group mt-3'>
                                    <a class='btn btn-primary form-control'
                                            style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                                        Edit profile
                                    </a>
                                </div>
                                <div class='form-group mt-3'>
                                    <button  id='logout_btn' class='btn btn-primary form-control'
                                            style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                                        Log out
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>";
                } else {
                    echo "
                    <div class='dropdown'>
                        <button class='btn btn-outline-light' id='dropdownMenu2' 
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'
                                style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                            <i class='fas fa-sign-in-alt pr-2'></i>Log in
                        </button>
                        <form class='dropdown-menu dropdown-menu-right'
                              action=''
                              method='POST'
                              id='login-form'>
                            <div class='form-group text-center'>
                                <span class='dropdown-header font-weight-bold'
                                      style='color: #000000; background-color: #ffa1f7;
                                      font-size: 1.5rem;'>
                                    Log in
                                </span>
                            </div>
                            <!-- json response will be here -->
                            <div id='errorDiv'></div>
                            <!-- json response will be here -->
                            <div class='p-3'>
                                <div class='form-group'>
                                    <label for='exampleDropdownFormEmail2'>Email address</label>
                                    <input type='email' class='form-control' id='exampleDropdownFormEmail2' placeholder='email@example.com' name='user'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleDropdownFormPassword2'>Password</label>
                                    <input type='password' class='form-control' id='exampleDropdownFormPassword2' placeholder='Password' name='pass'>
                                </div>
                                <div class='form-check'>
                                    <input type='checkbox' class='form-check-input' id='dropdownCheck2'>
                                    <label class='form-check-label' for='dropdownCheck2'>
                                        Remember me
                                    </label>
                                </div>
                                <div class='form-group mt-3'>
                                    <button type='submit' class='btn btn-primary form-control' name='login_button' id='login_button'
                                            style='background-color: #ffa1f7; border-color: #ffa1f7;'>
                                        Log in
                                    </button>
                                </div>
                                <div class='form-group row'>
                                    <div class='col-12 col-md-12 col-lg-12 text-center'>
                                        <span>Don't have an account ? <a href='register.php'>Register</a></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>";
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- Nav Bar -->
    <div class="signup-form-container">
        <!-- form start -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card mt-5 mb-5">
                        <div class="card-header text-uppercase text-center">
                            <h4 class="card-title mt-2 text-uppercase">Sign up</h4>
                        </div>
                        <form method="POST" role="form" id="register-form" autocomplete="off" class="card-body">
                            <div class="form-body">
                                <!-- json response will be here -->
                                <div id="errorDiv"></div>
                                <!-- json response will be here -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="name" type="text" id="name" class="form-control" placeholder="Name"
                                            maxlength="40" autofocus="true">
                                    </div>
                                    <span class="help-block text-danger" id="error"></span>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="email" id="email" type="text" class="form-control"
                                            placeholder="Email" maxlength="50">
                                    </div>
                                    <span class="help-block text-danger" id="error"></span>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <input name="password" id="password" type="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <span class="help-block text-danger" id="error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <div class="input-group">
                                            <input name="cpassword" type="password" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>
                                        <span class="help-block text-danger" id="error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary text-uppercase form-control"
                                    id="btn-signup"
                                    style="background-color: #ffa1f7; border-color: #ffa1f7; color:black;">
                                    signup
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-8 col-lg-8">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
                    <div style="margin-bottom:20px;overflow-x:hidden;">
                        <div class="fb-page" data-href="https://www.facebook.com/utgfansub/" data-tabs="timeline"
                            data-width="500" data-height="70" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/utgfansub/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/utgfansub/">UTG
                                    Fansub</a></blockquote>
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
    <script src="../assets/js/jquery-1.12.4-jquery.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/ajax-login_logout.js"></script>
    <script src="../assets/js/ajax-register.js"></script>
</body>


</html>