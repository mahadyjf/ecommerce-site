<?php include "../Classes/Brand.php"; ?>
<?php 
if (!isset($_GET['editid']) || $_GET['editid'] == null) {
   header('Location: brandlist.php');
}else{
    $editid = $_GET['editid'];
}
?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];

        $brandUpdate = $brand->brandUpdate($brandName, $editid);
    }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                
               <div class="block copyblock"> 
                   <?php
                    $getbrand = $brand->showBrandById($editid);
                    if ($getbrand) {
                        while($row = $getbrand->fetch_assoc()){
                    
                   ?>
                 <form action="" method="POST">
                 <?php
                if(isset($brandUpdate)){
                echo $brandUpdate;
                }?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $row['brandName']?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>