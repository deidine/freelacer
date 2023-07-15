<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            padding: 120px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }

        .button {
            background: rgb(254,209,54);
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff; 
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {
            background-color: #3e8e41
        }

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>

<body>


    <div class="card">

        <div class="container">
            <?php
            define('MY_CONSTANT', 1);
            // require dirname(__FILE__) . "/includes/backend/settings.php";
            // include "mvc/dbConnetion.php";
include "../dbconf/dbConnetion.php";

            $dbConnObj = new dbConnetion();
            $conn=$GLOBALS["con"];    
        
if(isset($_GET['delete_id'])){
$idd=$_GET['delete_id'];

$query = "delete from `customer` SET `status2` = 'read' WHERE `bookingRefNo` = '$id'";
mysqli_query($conn, $query);

}
            $id = $_GET['id'];

            $query = "UPDATE `customer` SET `status2` = 'read' WHERE `bookingRefNo` = '$id'";
            mysqli_query($conn, $query);


            $query3 = "SELECT * from `customer` where `bookingRefNo` = '$id';";
            $res3 =  mysqli_query($conn, $query3);

            if (mysqli_num_rows($res3) > 0) {
                while ($row = mysqli_fetch_assoc($res3)) {
                    if ($row['type_service'] == 'like') {
                        echo ucfirst($row['customerName']) . " liked your post. <br/>" . $row['date'];
                    } else {
                        echo " لقد ارسل لك طلب خدمة  يمكنك ان تبحث عن رقمه و تختار زر عمل خدمة .<br/>";
                        echo $row['customerName'] . ":الاسم " . "<br>";
                        echo $row['description'] . " :معلومات عن طلب الخدمة" . "<br>";
                        echo $row['bookingRefNo'] . ":رقم العميل ";
                    }
                }
            }

            ?><br />

<a href="notification.php">
    <button class="button"> عودة
        </button></a>
        <a href="notification.php">
            <button class="button"> حذف
                </button></a>
            </div>
    </div>
</body>

</html>