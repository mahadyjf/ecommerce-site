<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath."/../classes/Customer.php");
?>
<?php
   


    if (!isset($_GET['custid']) || $_GET['custid'] == NULL) {
        echo" <scrept>window.location = 'inbox.php';</scrept>";
    }else{
        $id = $_GET['custid'];
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo" <scrept>window.location = 'inbox.php';</scrept>";
    }
?>
<div class="grid_10">
<div class="box round first grid">
    <h2>Customer Details</h2>
    <div class="block copyblock">
        <?php if(isset($updateCat)){echo $updateCat;}?>
        <?php
         $cmr = new Customer();
        $getcmr=$cmr->getcmarData($id);
        if($getcmr){
            while($row=$getcmr->fetch_assoc()){
        
        ?>
        <form action="" method="POST">
        <table class="form">					
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['name'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>Address</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['address'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>City</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['city'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>Zip - code</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['zip'];?>" class="medium" />
                </td>
            </tr>


            <tr>
                <td>Phone</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['phone'];?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="text" readonly value="<?php echo $row['email'];?>" class="medium" />
                </td>
            </tr>

            
            <tr> 
                <td>
                    <input type="submit" name="submit" Value="Ok" />
                </td>
            </tr>
        </table>
        </form>
            <?php }} ?>
    </div>
</div>
</div>
<?php include 'inc/footer.php';?>