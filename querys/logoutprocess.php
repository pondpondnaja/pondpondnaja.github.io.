<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Redireacting...</title>
</head>
    <?php
        session_start();
        session_destroy();
        echo "<div class='col-12 col-md-12 col-lg-12 d-flex justify-content-center my-5'>
                <div class='card border-success'>
                    <div class='card-header border-success text-center bg-success'>
                        <h5 class='card-title my-auto font-weight-bold'>
                            <i class='fa fa-sign-out pr-2' aria-hidden='true'></i>Log off complete
                        </h5>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-text text-center'>We'll redirect you to Home page in 5 second</h5>
                        <h5 class='card-text text-center'>if you're still in this page please click button down here.</h5>
                        <h5 class='card-text text-center text-success'><i class='fa fa-arrow-down' aria-hidden='true'></i></h5>
                    </div>
                    <div class='card-body border-top text-center'>
                        <a class='btn btn-outline-success' href='../index.php'>
                            <i class='fa fa-home pr-2' aria-hidden='true'></i>Home page
                        </a>
                    </div>
                </div>
            </div>";
        header("refresh: 3; url = ../index.php");
    ?>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/4283dcca0d.js"></script>
</body>

</html>