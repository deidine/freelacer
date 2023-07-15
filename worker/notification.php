<?php
session_start();

define('MY_CONSTANT', 1);
// require dirname(__FILE__) . "/includes/backend/settings.php";
// include "mvc/dbConnetion.php";
include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn=$GLOBALS["con"];    

    // session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Notification System in PHP and MySql</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<?php include "frontend/header.php";?>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        .content-header-title {
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 100px;
            margin-bottom: 20px;
            letter-spacing: 1px;
            color: #1B2942;
        }
        
        .icon-large {
            font-size: 3em;
        }
        
        .text-stat {
            font-family: Roboto, sans-serif;
        }
    </style>

</head>

<body>
    
    <?php
    //   include "frontend/nav.php";?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="btn btn-primary mx-1 mb-2" role="button" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">عرض&nbsp;طلبات&nbsp; جديدة
                    <?php
                    $serv =  $_SESSION["type_service"];
                    $username =  $_SESSION["username"];
                    $query2 = "SELECT * from `customer` where `status2` = 'unread' and type_service='$serv' order by `date` DESC";
                    $res =  mysqli_query($conn, $query2);
                    if (mysqli_num_rows($res) > 0) {
                    ?>
                        <span class="badge badge-dark"><?php echo mysqli_num_rows($res); ?></span>
                    <?php
                    } else echo "0";
                    ?>

                </a>
                <a class="btn btn-primary mx-1 mb-2" role="button" href="./" id="dropdown01" aria-haspopup="true" aria-expanded="false">&nbsp;عودة
                </a>
                <div class="dropdown-menu" style="overflow-y:scroll;overflow-x:scroll; max-height:300px;max-width:500px;" aria-labelledby="dropdown01">
                    <?php
                    $query3 = "SELECT * from `customer` where type_service='$serv'   order by `date` DESC";
                    $res3 =  mysqli_query($conn, $query3);

                    if (mysqli_num_rows($res3) > 0) {
                        while ($row = mysqli_fetch_assoc($res3)) {
                    ?>
                            <a style="<?php
                                        if ($row['status2'] == 'unread') {
                                            echo "font-weight:bold;";
                                        }
                                        ?>
                             " class="dropdown-item" href="view-not.php?id=<?php echo $row['bookingRefNo'] ?>">
                                <small><i><?php echo date('F j, Y, g:i a', strtotime($row['date'])) ?></i></small><br />
                               <div class="mx-auto d-block mb-2 float-md-left mr-md-4 img-thumbnail"> <?php

                                if ($row['type_service'] == $serv) {
                                    echo $row['customerName'] . " Send you  post.\n you can search he is number is  " . $row['bookingRefNo'];
                                } else if ($row['type_service'] == 'like') {
                                    echo ucfirst($row['customerName']) . " liked your post.";
                                }

                                ?></div>
                            </a>
                            <div class="dropdown-divider"></div>
                    <?php
                        }
                    } else {
                        echo "No Records yet.";
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary mx-1 mb-2" role="button" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">عرض&nbsp;رسائل&nbsp; جديدة</a>


                <div class="dropdown-menu" style="overflow-y:scroll;overflow-x:scroll; max-height:300px;max-width:500px;" aria-labelledby="dropdown02">
                    <?php
                    $query33 = "SELECT * from `message`   WHERE receiver='$username' ORDER BY timestamp DESC";
                    $res33 =  mysqli_query($conn, $query33);

                    if (mysqli_num_rows($res33) > 0) {
                        while ($row3 = mysqli_fetch_assoc($res33)) {
                    ?>
                            <div style=" font-weight:bold;     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                        transition: 0.3s;
                                        width: 100%;
                                        padding: 20px;
                                        ">
                         
                                <?php
                                echo $row3['sender'] . " Send you " . $row3['msg'];
                                ?>
                            <a href="sendMessage.php?to=<?php echo $username;?>">    <button class="btn btn-primary">رد</button></a>
                            </div>
                            <div class="dropdown-divider"></div>
                    <?php
                        }
                    } else {
                        echo "No Records yet.";
                    }
                    ?>
                </div>
            </li>
        </ul>

    </div>
</nav>
<br>
<br>
<br>
<br>

<?php
$conx = mysqli_connect("localhost", "root", "", "futlead");

$res  = mysqli_query($conx, "Select  count(*) as total from worker  ");
$res2  = mysqli_query($conx, "Select  count(type_service)  as total,bookdate from customer where type_service='$serv' and  bookdate=CURRENT_DATE()  ");
$res3  = mysqli_query($conx, "Select  count(username) as total,type_service from worker where type_service='$serv' ");
$row = mysqli_fetch_assoc($res);
$row2 = mysqli_fetch_assoc($res2);
$row3 = mysqli_fetch_assoc($res3);

?>

<main>

    <div class="container">
        <h3 class="content-header-title">الاحصائيات</h3>
        <div class="row">


            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-cart-plus icon-large float-left" style="color: #006db6;">
                                </i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="text-stat"><?php echo $row2['total']; ?></h3>
                                <span class="text-stat">طالبي الخدمة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="align-self-center">
                                <i class="fa fa-users icon-large float-left" style="color: #006db6;">
                                </i>
                            </div>
                            <div class="media-body text-right">
                                <h3 class="text-stat"><?php echo $row3['total']; ?></h3>
                                <span class="text-stat">
                                    <?php echo $serv; ?>عدد العمال للخدمة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-header text-center" style="font-size: 24px">الاحصائيات</div>
            <div class="card-body">
                <div id="container1" style="margin: 0 auto"></div>
            </div>
        </div>

    </div>
</main>

<!--- FOOTER -->
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="assets/js/export-data.js"></script>
<script src="assets/js/series-label.js"></script>
<script src="assets/js/data.js"></script>
<script src="assets/js/drilldown.js"></script>

<?php $res21  = mysqli_query($conx, "Select  count(*) as statWork,status from worker where status='Assigned'   ");
$row21 = mysqli_fetch_assoc($res21);
$res22  = mysqli_query($conx, "Select  count(username) as statWork from 	worker where username='$username' ");
$row22 = mysqli_fetch_assoc($res22);
$res23  = mysqli_query($conx, "Select  count(username) as statWork from 	worker where username='$username' ");
$row23 = mysqli_fetch_assoc($res23);

$res24  = mysqli_query($conx, "Select  count(username) as statWork from 	worker where username='$username' ");
$row24 = mysqli_fetch_assoc($res24);
$res25  = mysqli_query($conx, "Select  count(username) as statWork from 	worker where username='$username' ");
$row25 = mysqli_fetch_assoc($res25);
?>

<script>
    // Create the chart
    Highcharts.chart('container1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Requests per Cell'
        },
        subtitle: {
            text: 'Statistics'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'number of requests'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> L<br/>'
        },

        "series": [{
            "name": "Browsers",
            "colorByPoint": true,
            "data": [{
                    "name": "essoufflement",
                    "y": <?php echo $row21['statWork']; ?>,
                },
                {
                    "name": "toux-seche",
                    "y": <?php echo $row22['statWork'] ?>,
                },
                {
                    "name": "troubles cardiaques",
                    "y": <?php echo $row23['statWork'] ?>,
                },
                {
                    "name": "maladie héréditaire",
                    "y": <?php echo $row25['statWork'] ?>,
                },
                {
                    "name": "maladies du cœur",
                    "y": <?php echo $row24['statWork'] ?>,
                }
            ]
        }],
        "drilldown": {
            "series": [{
                    "name": "Chrome",
                    "id": "Chrome",
                    "data": [
                        [
                            "v65.0",
                            0.1
                        ],
                        [
                            "v64.0",
                            1.3
                        ],
                        [
                            "v63.0",
                            53.02
                        ],
                        [
                            "v62.0",
                            1.4
                        ],
                        [
                            "v61.0",
                            0.88
                        ],
                        [
                            "v60.0",
                            0.56
                        ],
                        [
                            "v59.0",
                            0.45
                        ],
                        [
                            "v58.0",
                            0.49
                        ],
                        [
                            "v57.0",
                            0.32
                        ],
                        [
                            "v56.0",
                            0.29
                        ],
                        [
                            "v55.0",
                            0.79
                        ],
                        [
                            "v54.0",
                            0.18
                        ],
                        [
                            "v51.0",
                            0.13
                        ],
                        [
                            "v49.0",
                            2.16
                        ],
                        [
                            "v48.0",
                            0.13
                        ],
                        [
                            "v47.0",
                            0.11
                        ],
                        [
                            "v43.0",
                            0.17
                        ],
                        [
                            "v29.0",
                            0.26
                        ]
                    ]
                },
                {
                    "name": "Firefox",
                    "id": "Firefox",
                    "data": [
                        [
                            "v58.0",
                            1.02
                        ],
                        [
                            "v57.0",
                            7.36
                        ],
                        [
                            "v56.0",
                            0.35
                        ],
                        [
                            "v55.0",
                            0.11
                        ],
                        [
                            "v54.0",
                            0.1
                        ],
                        [
                            "v52.0",
                            0.95
                        ],
                        [
                            "v51.0",
                            0.15
                        ],
                        [
                            "v50.0",
                            0.1
                        ],
                        [
                            "v48.0",
                            0.31
                        ],
                        [
                            "v47.0",
                            0.12
                        ]
                    ]
                },
                {
                    "name": "Internet Explorer",
                    "id": "Internet Explorer",
                    "data": [
                        [
                            "v11.0",
                            6.2
                        ],
                        [
                            "v10.0",
                            0.29
                        ],
                        [
                            "v9.0",
                            0.27
                        ],
                        [
                            "v8.0",
                            0.47
                        ]
                    ]
                },
                {
                    "name": "Safari",
                    "id": "Safari",
                    "data": [
                        [
                            "v11.0",
                            3.39
                        ],
                        [
                            "v10.1",
                            0.96
                        ],
                        [
                            "v10.0",
                            0.36
                        ],
                        [
                            "v9.1",
                            0.54
                        ],
                        [
                            "v9.0",
                            0.13
                        ],
                        [
                            "v5.1",
                            0.2
                        ]
                    ]
                },
                {
                    "name": "Edge",
                    "id": "Edge",
                    "data": [
                        [
                            "v16",
                            2.6
                        ],
                        [
                            "v15",
                            0.92
                        ],
                        [
                            "v14",
                            0.4
                        ],
                        [
                            "v13",
                            0.1
                        ]
                    ]
                },
                {
                    "name": "Opera",
                    "id": "Opera",
                    "data": [
                        [
                            "v50.0",
                            0.96
                        ],
                        [
                            "v49.0",
                            0.82
                        ],
                        [
                            "v12.1",
                            0.14
                        ]
                    ]
                }
            ]
        }
    });
</script>



Statitique
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>