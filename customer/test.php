<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            border: 1px solid #008080;
            border-width: 1px 0;
            box-shadow: 0px -4px 3px rgba(50, 50, 50, 0.75), 0 8px 6px -6px black;
        }

      
        .navbar-contact {
            max-height: 29px;
        }

        .bottom {
            margin-top: -30px;
        }

        /* White Angles (Common) */

        .nav:before,
        .navbar-contact:after {
            content: "";
            /* background: #fff; */
            position: absolute;
            width: 2em;
            height: 2.5em;
            transform: skew(-30deg);
        }

        /* .navbar-contact angle position */

        .navbar-contact:after {
            right: -1em;
            top: 0;
        }

        /* .nav angle position */

        .nav:before {
            left: -1em;
            top: 0;
        }

        .navbar.navbar-expand-lg {
            flex-wrap: wrap;
        }

        .navbar-toggler {
            color: rgba(0, 0, 0, .5);
            border-color: rgba(0, 0, 0, .1);
        }

        .navbar .bottom.d-flex {
            flex-wrap: wrap;
        }

        .navbar-toggler-icon {
            border: 1px solid #ddd;
            background-image: url("data:image/svg+xml,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }
    </style>
    
</head>

<body>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="top d-flex w-100">
        </div>
        </div>
        <div class="bottom d-flex w-100">
 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="../index.php">
            <img src="../assets/img/logo4.jpg" style="border-radius: 13px;" width="50px" height="50px">
            &nbsp;قادة المستقبل</a>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

                        <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary" role="button" style="background: rgba(10,9,8,0.27);" href="booking.php">حجز خدمات</a></li>
                        <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-book" role="button" href="message.php">رسائلي</a></li>
                        <li class="nav-item" style="margin-top: 10px;"> <a type="button" href="user_controler.php?status=logout" style="background: rgb(99,168,231);" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="width: 120px; height: auto; font-size: 20px; font-family: 'Nunito', sans-serif; "> خروج
                            </a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>