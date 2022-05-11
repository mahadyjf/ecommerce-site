<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/Product.php"; ?>

<?php 
if (!isset($_GET['editid']) || $_GET['editid'] == null) {
   header('Location: productlist.php');
}else{
    $editid = $_GET['editid'];
}

    $pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updateProduct = $pd->productUpdate($_POST, $_FILES, $editid);
}

?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <?php
         if(isset($updateProduct)){
            echo $updateProduct;
            }?>
    
        <div class="block">  
            
        <?php
                    $getpro = $pd->showProById($editid);
                    if ($getpro) {
                        while($row = $getpro->fetch_assoc()){
                    
                   ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $row['productName']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                        <option>Select Category</option>
                        <?php
                        $db= new Database();
                        $sql = "SELECT * FROM tb_category";
                       $getcat=$db->select($sql);
                       if ($getcat) {
                           while($row1=$getcat->fetch_assoc()){
						?>
                            
                            <option 
                            <?php
                            if($row['catId'] == $row1['catId']){?>
                                selected = "selected";
                            <?php }?>
                            value="<?php echo $row1['catId'];?>"><?php echo $row1['catName'];?></option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php
                           $db= new Database();

                           $query="SELECT * FROM tb_brand";
                           $gerbrand=$db->select($query);
                           if($gerbrand){
                               while($value=$gerbrand->fetch_assoc()){
						?>
                            <option
                            <?php
                            if($row['brandId'] == $value['brandId']){?>
                                selected = "selected";
                            <?php }?>
                            value="<?php echo $value['brandId'];?>"><?php echo $value['brandName'];?></option>
                            <?php }} ?>
                           
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" class="tinymce"><?php echo $row['body']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input name="price" type="text" value="<?php echo $row['price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $row['image']?>" width="200px" height="200px" alt=""><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if($row['type'] == 0){?>
                            <option  selected = "selected" value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php }else{ ?>
                                <option value="0">Featured</option>
                            <option selected = "selected" value="1">Non-Featured</option>
                            <?php }?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
                               <?php }} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


