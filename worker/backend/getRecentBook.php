<?php

/*
|--------------------------------------------------------------------------
| Access Restriction
|--------------------------------------------------------------------------
|
| Here is the declaration that user or visitor
| can access the page
| all the define('MY_CONSTANT', 1) meaning pages that can be access.
|
*/

define('MY_CONSTANT', 1);

/*
|--------------------------------------------------------------------------
| Require dbconf/settings.php
|--------------------------------------------------------------------------
|
| include file
| dbconf/settings.php
| for connect to database
|
*/

// require dirname(__FILE__) . "/../dbconf/settings.php";

/*
|--------------------------------------------------------------------------
| Select Database
|--------------------------------------------------------------------------
|
| Make query to select
| * FROM passengers WHERE CONCAT(pickupDate, ' ', pickupTime) BETWEEN NOW() AND NOW() + INTERVAL 2 HOUR
| then display it onto the table
|
| This NOW() function will return the server time
| hence, it will compare the booking time and date with the server time
| depending where this app installed on the server is, it will make a difference
|
*/
// include "../mvc/dbConnetion.php";
include "../../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn=$GLOBALS["con"];    
    session_start();
    $serv =  $_SESSION["type_service"];
    date_default_timezone_set('UTC'); 
    $date= date("Y-m-d");
// mysqli_select_db($conn, $dbnm);
$query = "SELECT * FROM customer where type_service='$serv' and bookdate='$date'";

// $query = "SELECT * FROM customer WHERE CONCAT(pickupDate, ' ', pickupTime) BETWEEN NOW() AND NOW() + INTERVAL 2 HOUR";
// $query = "SELECT * FROM passengers WHERE CONCAT(pickupDate, ' ', pickupTime) BETWEEN NOW() AND NOW() + INTERVAL 2 HOUR";

$result = mysqli_query($conn, $query);
?> 

 
<table class="table table-striped table tablesorter" id="ipi-table">
  <thead class="thead-dark">
    <tr>
      <th class="text-center">Booking ref no</th>
      <th class="text-center">customer name</th>
      <th class="text-center">phone number</th>
      <th class="text-center filter-false sorter-false">email</th>

      <th class="text-center filter-false sorter-false">service type</th>
      <th class="text-center filter-false sorter-false">description</th>
      <th class="text-center filter-false sorter-false">status</th>
      <th class="text-center filter-false sorter-false">Assigned By</th>
      <th class="text-center filter-false sorter-false">actions</th>
    </tr>
  </thead>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <tbody class="text-center">
      <tr id="<?= $row["bookingRefNo"] ?>">
        <td width="12"><?= $row["bookingRefNo"] ?></td>
        <td width="200"><?= $row["customerName"] ?></td>
        <td width="50"><?= $row["phoneNumber"] ?></td>
        <td width="100"><?= $row["email"] ?></td>
        <td><?= $row["type_service"] ?></td>
        <td style="color: white;background: rgb(99,168,231);" width="400">
          <a href="profile-user.php?uid=<?php echo $row["bookingRefNo"] ?>"> <button class=" btn btn-primary" onclick="sweetAlertMsg();"> معرفة أكثر</button>
          </a>
        </td>

        <td width="400"><?= $row["status"] ?></td>
        <td width="400"><?= $row["assignedBy"] ?></td>

        <?php if ($row['status'] == "Assigned") : ?>
          <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btn-primary disabled" role="button" aria-disabled="true"><i class="far fa-paper-plane"></i>&nbsp;عمل الخدمة</a></td>
        <?php else : ?>
          <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btn-primary" role="button" onClick="updateAssignCab('<?= $row["bookingRefNo"] ?>')"><i class="far fa-paper-plane"></i>&nbsp;عمل الخدمة</a></td>
        <?php endif; ?>

      </tr>
    </tbody>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= $row["description"] ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php
  // Frees up the memory, after  using the result pointer
  mysqli_free_result($result);

  // Close Connection
  mysqli_close($conn); ?>
  
  