<?php include "include/header.php";?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>


<div class="main">
    <div class="content">
        <div class="section group">
            <div class="order">
                <h2>Your order Detalis</h2>
                <table class="tblone">
		<tr>
			<th>No</th>
			<th>Product Name</th>
			<th>Image</th> 
			<th>Quantity</th>
			<th>Price</th>
			<th>Date</th>
			<th>Status</th>
			<th>Action</th>
			
		</tr>
        <?php 
         $cmrid = Session::get('cmrid');
			$getorder = $ct->getOrderPro($cmrid);
			if ($getorder) {
				$i = 0;
				while($row = $getorder->fetch_assoc()){
					$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['proname']; ?></td>
			<td><img src="admin/<?php echo $row['image']; ?>" alt=""/></td>
			<td>$ <?php echo $row['quantity']; ?></td>
			
			<td>$ <?php
                $total = $row['price']; echo $total ; ?></td>
                
                <td><?php echo $fm->formatDate($row['date']); ?></td>

                <td><?php 
                if ($row['status'] == '0') {
                 echo "Panding";
                }else{
                    echo "Shifted";
                }
                ?></td>
                
                <?php if ( $row['status'] == '1') {?>
                    <td>
                <a onclick="return confirm('Are you Sure to Dalete?')" href="?delcart=<?php echo $row['cartid'];?>">X</a></td>
               <?php }else{?>
                <td>N/A</td>
               <?php } ?>
			
		</tr>
		
				<?php } } ?>
		
	</table>
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php";?>