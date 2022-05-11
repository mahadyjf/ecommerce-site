<?php include "include/header.php"; ?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<?php 
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $cmrid = Session::get('cmrid');
        $insertOrder = $ct->orderProduct($cmrid);
        $delData = $ct->delCmrCart();
        header("Location: success.php");
    }
?>
<style>
    .tblone{width: 550; margin: 0 auto; border: 2px solid #ddd;}
    .tblone tr td{text-align: center;}
    .division{width: 50%; float: left; }
    .ordernow{padding-bottom: 30px}
    .ordernow a{width:200px; margin: 20px auto 0; text-align: center; padding: 5px; font-size: 30px; display: block; background: #ff0000; color: #fff; border-radius:3px;}
</style>
<div class="main">
<div class="content">
<div class="section group">
    <div class="division">
    <table class="tblone">
		<tr>
			<th>No</th>
			<th>Product</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
		<?php 
			$getpro = $ct->getCartPro();
			if ($getpro) {
				$i = 0;
				$sum = 0;
				$qty=0;
				while($row = $getpro->fetch_assoc()){
					$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['productName']; ?></td>
            <td>$ <?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
			
			<td>$ <?php
                $total = $row['price'] * $row['quantity']; echo $total ; ?>
                </td>

		</tr>
		<?php 
		$qty = $qty + $row['quantity'];
		$sum= $sum + $total;
			
		?>
				<?php } } ?>
		
		
    </table>
    <?php 
		$getData = $ct->checkCartTb();
		if ($getData) {
		?>
    <table style="float:right;text-align:left;" width="40%">
		<tr>
			<th>Sub Total : </th>
			<td>$ <?php echo $sum;?></td>
		</tr>
		<tr>
			<th>VAT : </th>
			<td>10% <?php echo "(".$vat = $sum * 0.1.")"; ?></td>
		</tr>
		<tr>
			<th>Grand Total :</th>
			<td>$
				<?php
				$vat = $sum * 0.1;
				$grand = $sum + $vat;
				echo $grand;
				?>
			</td>
		</tr>
	</table>
		<?php } /*else{
				header("Location:index.php");
			}*/ ?>
    </div>


    
    <div class="division">
    <?php
    $id = Session::get("cmrid");
    $getData = $cmr->getcmarData($id);
    if ($getData) {
       while($row = $getData->fetch_assoc()){
    ?>
    <table class="tblone">
        <tr><td colspan="3"><h2>Your Porofile Details</h2></td></tr>
        <tr>
            <td width="20%">Name</td>
            <td width="5%">:</td>
            <td><?php echo $row['name'];?></td>
        </tr>

        <tr>
            <td>Phone</td>
            <td>:</td>
            <td><?php echo $row['phone'];?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $row['email'];?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td>:</td>
            <td><?php echo $row['address'];?></td>
        </tr>

        <tr>
            <td>City</td>
            <td>:</td>
            <td><?php echo $row['city'];?></td>
        </tr>

        <tr>
            <td>Zip-code</td>
            <td>:</td>
            <td><?php echo $row['zip'];?></td>
        </tr>

        <tr>
            <td>Country</td>
            <td>:</td>
            <td><?php echo $row['country'];?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><a href="editprofile.php">Update Details</a></td>
        </tr>

    </table>
       <?php }} ?>
    </div>
</div>
</div>
        <div class="ordernow"><a href="?orderid=order">Order</a></div>
</div>
<?php include "include/footer.php"; ?>