<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../Classes/Category.php"; ?>
<?php 
	$cat = new Category();
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
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$showCat = $cat->showAllCat();
						if ($showCat) {
							$i = 0;
							while($result = $showCat->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="editcat.php?editid=<?php echo $result['catId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete ?');" href="?delid=<?php echo $result['catId'];?>">Delete</a></td>
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

