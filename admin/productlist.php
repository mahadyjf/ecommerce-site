<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/Product.php"; ?>
	<?php 
	$pd = new Product();
	$fm = new Format();
	?>
	<?php 
	if (isset($_GET['delid'])) {
		$id=$_GET['delid'];
		$delete=$pd->delProById($id);
	}
	?>
<div class="grid_10">
    <div class="box round first grid">
		<h2>Post List</h2>
		<?php if (isset($delete)) {
			echo $delete;
		}?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
				<th width="5%">SL</th>
					<th width="15%">Product Name</th>
					<th width="10%">Category</th>
					<th width="10%">Brand</th>
					<th width="20%">Description</th>
					<th width="5%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Type</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
			$getProduct = $pd->getAllproduct();
				if($getProduct){
					$i = 0;
					while($row=$getProduct->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
				<td><?php echo $i;?></td>
					<td><?php echo $row['productName'];?></td>
					<td><?php echo $row['catName'];?></td>
					<td><?php echo $row['brandName'];?></td>
					<td><?php echo $fm->textShorten($row['body'], 50);?></td>
					<td>$<?php echo $row['price'];?></td>
					<td><img src="<?php echo $row['image'];?>" height="50px" width="60px"></td>
					<td><?php 
					if($row['type'] == 0){
						echo "Featured";
					}else{
						echo "Non-Featured";
					}?>
					<td><a href="editproduct.php?editid=<?php echo $row['productId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete ?');" href="?delid=<?php echo $row['productId'];?>">Delete</a></td>
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
