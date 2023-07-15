<?php
 
session_start();
include "../../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn=$GLOBALS["con"];    

$bookingRefNo = $_GET["number"];

$query = "SELECT * FROM customer WHERE bookingRefNo = '$bookingRefNo'";

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
            <th class="text-center filter-false sorter-false">status</th>
            <th class="text-center filter-false sorter-false">Assigned By</th>
            <th class="text-center filter-false sorter-false">actions</th>
        </tr>
    </thead>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tbody class="text-center">
            <tr id="<?= $row["bookingRefNo"] ?>">
                <td><?= $row["bookingRefNo"] ?></td>
                <td><?= $row["customerName"] ?></td>
                <td><?= $row["phoneNumber"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["type_service"] ?></td>
                
                <td><?= $row["status"] ?></td>
                <td><?= $row["assignedBy"] ?></td>

                <?php if ($row['status'] == "Assigned") : ?>
                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btn-primary disabled" role="button" aria-disabled="true"><i class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></td>
                <?php else : ?>
                    <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btn-primary" role="button" onClick="updateAssignCab('<?= $row["bookingRefNo"] ?>')"><i class="far fa-paper-plane"></i>&nbsp;ASSIGN</a></td>
                <?php endif; ?>

            </tr>
        </tbody>

    <?php } ?>

    <?php
// Frees up the memory, after using the result pointer
mysqli_free_result($result);

// Close Connection
mysqli_close($conn);?>