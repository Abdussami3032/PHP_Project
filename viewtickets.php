<?php
session_start();
include('header.php');
include('connection.php');

$query="Select * from movies where movie_id IN (".implode(',',$_SESSION['ticket'])."),seat_detail";
$result=mysqli_query($conn,$query);
?>
<form method="post" action="saveticket.php">
    <?php echo $_SESSION['msg'];?>
<table class="table table-bordered">
    <tr>
        <th>Movie Id</th>
        <th>Movie Title</th>
        <th>Movie Cover</th>
        <th>No Of tickets</th>
        <th>Total Price</th>
        <th>Actions</th>
    </tr>
<?php
$index=0;
$total=0;
if($result)
{
while($row=mysqli_fetch_assoc($result))
{
?>
    <tr>
       <td><?php echo $row['movie_id'];?></td>
       <td><?php echo $row['movie_title'];?></td>
       <input type="hidden" name="indexes[]" value="<?php echo $index;?>"/>
       <td><input type="number" value="<?php echo $_SESSION['noofticket'][$index];?>" min=1 name="quan<?php echo $index;?>"/></td>
       <td><?php echo $row['price'];?></td>
       <td><?php echo $_SESSION['noofticket'][$index]*$row['price'];?></td>
       <td><a href="deletetickets.php?id=<?php echo $row['movie_id'];?>">Delete</a></td>
    </tr>
<?php

$total+=$_SESSION['quantity'][$index]*$row['price'];
$_SESSION['total']=$total;
$index++;
}
}else{
    echo "<h1> No Item in the Cart</h1>";
}
?>
</table>
<?php echo "<h1>".$total."</h1>";?>
<input type="submit" value="Save Cart" name="btnSave"/>
<a href="clearCart.php" class="btn btn-danger">Clear Cart</a>
<a href="checkout.php" class="btn btn-success">Checkout</a>
</form>
<?php


include('footer.php');
?>