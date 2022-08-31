<?php
require 'dbh.php';  //using the $conn variable
$Order_Name = $_POST['OrderName'];
$Order_Quantity = $_POST['OrderQuantity'];
$_ID = $_POST['I_D'];
echo $Order_Name;
echo $Order_Quantity;
echo $_ID;

if (isset($_POST["edit"])) //checking if came here from click submit
{
?>
    <section>
    <h1>Edit Order</h1>
    <div class="wrapper">
        <h2>Edit your order here</h2>
        <!-- pull the data from sql -->
        <form action="changecart.php" method="POST">
            <p>Key in the recycle items name that need to be added.</p>
            <select id="OrderName" name="OrderName">
                <option value="paper" <?php if ($Order_Name = 'Paper') {echo 'selected';}?>>Paper</option>
                <option value="plastic" <?php if ($Order_Name = 'Plastic') {echo 'selected';}?>>Plastic</option>
                <option value="metal" <?php if ($Order_Name = 'Metal') {echo 'selected';}?>>Metal</option>
                <option value="glass" <?php if ($Order_Name = 'Glass') {echo 'selected';}?>>Glass</option>
            </select>
            <p>
            <p>Key in the quantity in KG that need to be added.</p>
                <input id="OrderQuantity" name="OrderQuantity" type="number" value="<?php echo $Order_Quantity; ?>" required>
            <p></p>
            <button type="submit" name="Editing">Edit</button>
        </form>
        <!-- End Of sql -->
        <?php
          if (isset($_POST['Editing'])) 
          {
            echo '<p class="">successfully edited</p>'; //temp
          }
        ?>
    </section>
  </div>
<?php
}
else if (isset($_POST["delete"]))
{
?>
    <section>
    <h1>Delete Order</h1>
    <div class="wrapper">
        <h2>Edit your order here</h2>
        <!-- pull the data from sql -->
        <form action="changecart.php" method="POST">
            <p>Key in the recycle items name that need to be added.</p>
            <select id="OrderName" name="OrderName">
                <option value="paper" <?php if ($Order_Name = 'Paper') {echo 'selected';}?>>Paper</option>
                <option value="plastic" <?php if ($Order_Name = 'Plastic') {echo 'selected';}?>>Plastic</option>
                <option value="metal" <?php if ($Order_Name = 'Metal') {echo 'selected';}?>>Metal</option>
                <option value="glass" <?php if ($Order_Name = 'Glass') {echo 'selected';}?>>Glass</option>
            </select>
            <p>
            <p>Key in the quantity in KG that need to be added.</p>
                <input id="OrderQuantity" name="OrderQuantity" type="number" value="<?php echo $Order_Quantity; ?>" required>
            <p></p>
            <button type="submit" name="Editing">Edit</button>
        </form>
        <!-- End Of sql -->
        <?php
          if (isset($_POST['Editing'])) 
          {
            echo '<p class="">successfully edited</p>'; //temp
          }
        ?>
    </section>
  </div>
<?php    
}
else
{
    header("Location: ../cart.php"); //if user didnt come from 'submit', return to cart
    exit();
}

?>

