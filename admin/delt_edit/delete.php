<?php

include('../includes/config.php');
if(isset($_GET['bid'])){
    $bid=$_GET['bid'];
    $sql = "delete from customer where bookingRefNo =:id  ";
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':id', $bid, PDO::PARAM_STR);
    $query->execute();
    header("location:../dashboard.php");
}
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $sql = "delete from tblenquiry where id =:id  ";
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':id', $pid, PDO::PARAM_STR);
    $query->execute();
    header("location:../dashboard.php");
}

if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $sql = "delete from user where id =:id  ";
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':id', $uid, PDO::PARAM_STR);
    $query->execute();
    header("location:../dashboard.php");
}

if(isset($_GET['wid'])){
    // include('../includes/config.php');
    $wid=$_GET['wid'];
    $sql = "delete from worker where id =:id  ";
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':id', $wid, PDO::PARAM_STR);
    $query->execute();
    header("location:../dashboard.php");
}

if(isset($_GET['sid'])){
    // include('../includes/config.php');
    $sid=$_GET['sid'];
    $sql = "delete from service where id =:id  ";
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':id', $sid, PDO::PARAM_STR);
    $query->execute();
    header("location:../dashboard.php");
}

?>