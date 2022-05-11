<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../Classes/Brand.php"; ?>
<?php 
	$brand = new Brand();
	if(isset($_GET['delid'])){
		$delid = $_GET['delid'];
		$delCat = $cat->delcat($delid);
	}
	
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
				<?php
                if(isset($delCat)){
                echo $delCat;
                }?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$showBrand = $brand->showAllBrand();
						if ($showBrand) {
							$i = 0;
							while($result = $showBrand->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="editbrand.php?editid=<?php echo $result['brandId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete ?');" href="?delid=<?php echo $result['brandId'];?>">Delete</a></td>
						</tr>
							<?php } }?>
					
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

