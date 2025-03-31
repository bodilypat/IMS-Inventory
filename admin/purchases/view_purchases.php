<?php

    include ('../includes/dbconnect.php');

    if ($_SERVER['REQUEST_METHOD'] == isset($_GET['id'])) {
        $purchase_id = $_GET['id'];

        /* Fetch order details from databasse  */
        $qPurchase = "SELECT p.purchase_id, p.purchase_date, p.unit_price, p.quantity, p.vendor_id, i.item_name, v.vendor_name
                      FROM purchases p
                      JOIN items i ON p.item_id = i.item_id
                      JOION vendors v ON p.vendor_id = v.vendor_id";
        $stmt = $db_con->query($qPurchase);
        $purchases = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Purchase</title>
        <link rel="styleshee" href="../assets/css/styles.css">
    </head>
    <body>
        <div class="container">
            <h1>Purchase Record</h1>
            <table  class="table table-purchases" >
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Item</th>
                        <th>Purchase Date</th>
                        <th>Unit Price</th>
                        <th>Quantitity</th>
                        <th>Vendor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($purchases as $purchase) : ?>
                    <tr>
                         <td><?php echo $purchase['id']);?></td>
                         <td><?php echo $purchase['iteme_name']);?></td>
                         <td><?php echo $purchase['purchase_date']);?></td>
                         <td><?php echo $purchase['unit_price']);?></td>
                         <td><?php echo $purchase['quantity']);?></td>
                         <td><?php echo $purchase['vendor_name']); ?></td>
                         <td>
                             <a href="update_purchase.php?id=<?php $purchase['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                             <a href="delete_purchase.php?id=<?php $purchase['id'];?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure? ')">Delete</a>
                         </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="add_purchase.php" class="btn btn-primary">Add New Purchase</a>
        </div>
    </body>
</html>
