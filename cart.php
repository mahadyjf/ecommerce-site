<?php include "include/header.php"?>
<?php
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$delcart = $ct->delCart($delid);
}
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$quantity = $_POST['quantity'];
		$cartId = $_POST['cartId'];
		$UpdateCart = $ct->UpdateToCart($quantity, $cartId);
		if($quantity <= 0){
			$delcart = $ct->delCart($cartId);
		}
	}
?>



 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
					<h2>Your Cart</h2>
					<?php if(isset($UpdateCart)){echo $UpdateCart;}?>
					<?php if(isset($delcart)){echo $delcart;}?>
						<table class="tblone">
							<tr>
								<th width="5%">SL.</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
							$getPro = $ct->getCartProducr();
							if($getPro){
								$i = 0;
								$sum = 0;
								while($result = $getPro->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. <?php
								$total = $result['price'] * $result['quantity'];
								
								echo $total;
								?></td>
								<td><a onclick="return confirm('Are you sure to remove?');" href="?delid=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							<?php
							 $sum = $sum+$total; 
							 Session::set("SUM", $sum);
							?>
							
						<?php }}?>
							
						</table>
						<?php
								$getdata = $ct->checkCartTb();
								if($getdata){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>$ <?php
								$vat = $sum*0.1;
								$gtotal = $sum + $vat;
								echo $gtotal;
								?></td>
							</tr>
					   </table>
					   <?php
								}else{
									header('Location: index.php');
								}  
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include "include/footer.php"?>