<?php include "include/header.php"; ?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<?php
    $id = Session::get("cmrid");
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit']))  {
			$updatecmr = $cmr->updateCmrData($_POST, $id);
		}
		?>
<style>
    .tblone{width: 550; margin: 0 auto; border: 2px solid #ddd;}
    .tblone tr td{text-align: center;}
</style>
<div class="main">
<div class="content">
<div class="section group">
    <?php
    $id = Session::get("cmrid");
    $getData = $cmr->getcmarData($id);
    if ($getData) {
       while($row = $getData->fetch_assoc()){
    ?>
    <form action="" method="POST">
    <table class="tblone">
        <?php if (isset($updatecmr)) {
           echo $updatecmr;
        }?>
        <tr><td colspan="3"><h2>Update Porofile Details</h2></td></tr>
        <tr>
            <td width="20%">Name</td>
            <td><input type="text" name="name" value="<?php echo $row['name'];?>"></td>
        </tr>

        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo $row['phone'];?>"></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $row['address'];?>"></td>
        </tr>

        <tr>
            <td>City</td>
            <td><input type="text" name="city" value="<?php echo $row['city'];?>"></td>
        </tr>

        <tr>
            <td>Zip-code</td>
            <td><input type="text" name="zip" value="<?php echo $row['zip'];?>"></td>
        </tr>

        <tr>
            <td>Country</td>
            <td><input type="text" name="country" value="<?php echo $row['country'];?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save"></td>
        </tr>

    </table>
    </form>
       <?php }} ?>

</div>
</div>
</div>
<?php include "include/footer.php"; ?>