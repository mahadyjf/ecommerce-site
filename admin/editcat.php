<?php include "../Classes/Category.php"; ?>
<?php 
if (!isset($_GET['editid']) || $_GET['editid'] == null) {
   header('Location: catlist.php');
}else{
    $editid = $_GET['editid'];
}
?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];

        $catUpdate = $cat->catUpdate($catName, $editid);
    }
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                
               <div class="block copyblock"> 
                   <?php
                    $getCat = $cat->showCatById($editid);
                    if ($getCat) {
                        while($row = $getCat->fetch_assoc()){
                    
                   ?>
                 <form action="" method="POST">
                 <?php
                if(isset($catUpdate)){
                echo $catUpdate;
                }?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $row['catName']?>" class="medium" />
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