<?php
    session_start();
?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/80c31a4196.js" crossorigin="anonymous"></script>
    <title>UTG</title>
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffa1f7;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand font-weight-bold" href="index.php">UTG Fansub</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/animelist.php">Anime Sub-thai</a>
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
                                        <span>Don't have an account ? <a href='pages/register.php'>Register</a></span>
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
    <div>
        <div class="col-12">
            <div class="row">
                <div class="container">
                    <div class="row mt-3 mb-4">
                        <div id="list_data" class="col-12 col-md-8 col-lg-8">
                            <div class="row">
                                <?php
                                require("assets/config/config.php");
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $limit = 6;
                                $adjacents = 2;

                                $sql = "SELECT COUNT(*) 'total_rows' FROM `animelist`";
                                $res = mysqli_fetch_object(mysqli_query($conn, $sql));
                                $total_rows = $res->total_rows;

                                /*Get the total number of pages.*/
                                $total_pages = ceil($total_rows / $limit);

                                if (isset($_GET['page']) && $_GET['page'] != "") {
                                    $page = $_GET['page'];
                                    $offset = $limit * ($page - 1);
                                } else {
                                    $page = 1;
                                    $offset = 0;
                                }

                                $query  = "SELECT * FROM `animelist` LIMIT $offset, $limit";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_object($result)) {
                                        echo "
                                                <div class='col-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center w-100'
                                                     style='padding: 0px 0px !important;'>
                                                    <div class='card'>
                                                        <img class='card-img-top img-fluid' src = 'http://placehold.it/230x150' 
                                                             alt = '$row->name'/>
                                                        <div class='card-body' style='height: 3rem;'>
                                                            <div class='text-center'>
                                                                <a class ='text-uppercase font-weight-bold' href='pages/animeinfo.php?id=$row->id'>More info</a>
                                                            </div>
                                                            <h5 class='card-title text-center'>$row->name</h5>
                                                        </div>
                                                        <div class='card-body mb-1' style='height: 3rem;'>
                                                            <p class='card-text text-center'>$row->description</p>
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }

                                //Checking if the adjacent plus current page number is less than the total page number.
                                //If small then page link start showing from page 1 to upto last page.

                                if ($total_pages <= (1 + ($adjacents * 2))) {
                                    $start = 1;
                                    $end   = $total_pages;
                                } else {
                                    if (($page - $adjacents) > 1) {                   //Checking if the current page minus adjacent is greateer than one.
                                        if (($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
                                            $start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
                                            $end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
                                        } else {                                   //If current page plus adjacents is greater than total pages.
                                            $start = ($total_pages - (1 + ($adjacents * 2)));  //then the page range will start from total pages minus 1+($adjacents*2)
                                            $end   = $total_pages;                           //and the end will be the last page number that is total pages number.
                                        }
                                    } else {                                       //If the current page minus adjacent is less than one.
                                        $start = 1;                                //then start will be start from page number 1
                                        $end   = (1 + ($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
                                    }
                                }
                                ?>
                            </div>
                            <?php mysqli_close($conn); ?>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="input-group">
                                        <input id="keyword" type="text" class="form-control cus-outline" placeholder="Search...."
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" id="button-addon2" disabled>
                                                <i class="fas fa-search-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <header class="card-header text-center"
                                            style="background-color: #ffa1f7; border-color: #ffa1f7; color: #ffffff;">
                                            <span class="text-uppercase font-weight-bold">Recently Release</span>
                                        </header>
                                        <div class="card-body" style="border-color: #ffa1f7;">
                                            <?php
                                            require("assets/config/config.php");
                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12 col-md-12 col-lg-12 text-center">
                                    <div class="mb-2 text-center">
                                        <span class="text-uppercase font-weight-bold">
                                            <i class="fas fa-bell pr-2"></i>
                                            subscribe us
                                            <i class="fas fa-bell pl-2"></i>
                                        </span>
                                    </div>
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous"
                                        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
                                    <div style="margin-bottom:20px;overflow-x:hidden;">
                                        <div class="fb-page" data-href="https://www.facebook.com/utgfansub/"
                                            data-tabs="timeline" data-width="" data-height="70"
                                            data-small-header="false" data-adapt-container-width="true"
                                            data-hide-cover="false" data-show-facepile="false">
                                            <blockquote cite="https://www.facebook.com/utgfansub/"
                                                class="fb-xfbml-parse-ignore"><a
                                                    href="https://www.facebook.com/utgfansub/">UTG
                                                    Fansub</a></blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <span><i class="fas fa-medal pr-2"></i>Archive</span>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="accordian">
                                <ul style="padding: 0;">
                                    <?php
                                        require("assets/config/config.php");
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        $query  = "SELECT * FROM `animelist` WHERE `status` = 'end'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_object($result)) {
                                               echo "
                                                    <li>
                                                        <div class='image_title'>
                                                            <a href='pages/animeinfo.php?id=$row->id'>
                                                                $row->name
                                                            </a>
                                                        </div>
                                                        <a href='pages/animeinfo.php?id=$row->id'>
                                                            <img src='http://thecodeplayer.com/uploads/media/3yiC6Yq.jpg'/>
                                                        </a>
                                                    </li>"; 
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="sticky-footer" class="py-4 text-black-100" style="background-color: #ffa1f7;">
        <div class="container text-center">
            <small>Copyright &copy; UTG Fansub</small>
            <small class="ml-2">From 2016 to <?php echo date("Y  H:i:s"); ?></small>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="assets/js/jquery-1.12.4-jquery.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            load_data();
            $('#login-form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'querys/ajax-login.php',
                    data: $('#login-form').serialize(),
                    success: function(data){
                        if(data.status === 'success') {
                            //alert(data.message);
                            //window.location = "index.php";
                            document.location.reload(true);
                        }
                        else {
                            window.location = "pages/login.php";
                        }
                    }
                });
            });

            $('#logout_btn').click(function(){
                console.log('logout btn has been click');
                $.ajax({
                    type: 'POST',
                    url: 'querys/ajax-logout.php',
                    success: function(respond){
                        if(respond.status === 'success'){
                            //alert(respond.message);
                            //window.location = "index.php";
                            document.location.reload(true);
                        }
                    }
                });
            });

            function load_data(page){  
                var searchtext = $('#keyword').val();  
                console.log("Keyword from page : "+searchtext);
                $.ajax({  
                    url:"querys/ajax-search.php",  
                    method:"POST",  
                    data:{page:page, query:searchtext , home:true},  
                    success:function(data){  
                        $('#list_data').html(data);  
                    }  
                })
            }  

            $(document).on('click', '.pagination_link', function(){  
                var page = $(this).attr("id"); 
                console.log("page id: "+page); 
                load_data(page);  
            });  
       
            $('#keyword').keyup(function(){
                var txt = $(this).val();
                console.log("Keyword from type : "+txt);
                if(txt != ''){
                    $.ajax({  
                        url:"querys/ajax-search.php",  
                        method:"POST",  
                        data:{query:txt , home:true},  
                        success:function(data){  
                            $('#list_data').html(data);  
                        }  
                    });  
                }else{
                    console.log("No keyword");
                    load_data();
                }
            });
        });
    </script>
</body>

</html>