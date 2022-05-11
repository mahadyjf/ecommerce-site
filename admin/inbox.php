<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../classes/Cart.php");
$ct = new Cart();
$fm = new Format();
?>
<?php
	if (isset($_GET['shiftid'])) {
		$id = $_GET['shiftid'];
		$date = $_GET['date'];
		$price = $_GET['price'];
		$shift = $ct->productShifted($id, $date, $price);
	}


	if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$date = $_GET['date'];
		$price = $_GET['price'];
		$delorder = $ct->productDelid($id, $date, $price);
	}
?>
<div class="grid_10">
<div class="box round first grid">
	<h2>Inbox</h2>
	<?php 
	if (isset($shift)) {
	echo $shift;
	}
	if (isset($delorder)) {
		echo $delorder;
		}
	?>
	<div class="block">        
		<table class="data display datatable" id="example">
		<thead>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$getOrder = $ct->gerAllorderPro();
			if ($getOrder) {
				while($row = $getOrder ->fetch_assoc()){
			?>
			<tr class="odd gradeX">
				<td><?php echo $row['orderId'];?></td>
				<td><?php echo $fm->formatDate($row['date']);?></td>
				<td><?php echo $row['productName'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><a href="customer.php?custid=<?php echo $row['cmrId'];?>">View Details</a></td>
				<td>
					<?php 
					if ($row['status'] == '0') {?>
						<a href="?shiftid=<?php echo $row['cmrId'];?>&&price=<?php echo $row['price'];?>&&date=<?php echo $row['date'];?>">Shifted</a>
				<?php }else{?>
					<a href="?delid=<?php echo $row['cmrId'];?>&&price=<?php echo $row['price'];?>&&date=<?php echo $row['date'];?>">Remove</a>
				<?php }?>
				</td>
			</tr>
				<?php }} ?>
			
		</tbody>
	</table>
	</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
setupLeftMenu();

$('.datatable').dataTable();
setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>
