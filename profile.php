<?php include "include/header.php"; ?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
    .tblone{width: 550; margin: 0 auto; border: 2px solid #ddd;}
    .tblone tr td{text-align: center;}
</style>
<div class="main">
<div class="content">
<div class="section group">
    <?php
    $id = Session::get("cmrid");
    $getData = $cmr->getcmarData($id);
    if ($getData) {
       while($row = $getData->fetch_assoc()){
    ?>
    <table class="tblone">
        <tr><td colspan="3"><h2>Your Porofile Details</h2></td></tr>
        <tr>
            <td width="20%">Name</td>
            <td width="5%">:</td>
            <td><?php echo $row['name'];?></td>
        </tr>

        <tr>
            <td>Phone</td>
            <td>:</td>
            <td><?php echo $row['phone'];?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $row['email'];?></td>
        </tr>

        <tr>
            <td>Address</td>
            <td>:</td>
            <td><?php echo $row['address'];?></td>
        </tr>

        <tr>
            <td>City</td>
            <td>:</td>
            <td><?php echo $row['city'];?></td>
        </tr>

        <tr>
            <td>Zip-code</td>
            <td>:</td>
            <td><?php echo $row['zip'];?></td>
        </tr>

        <tr>
            <td>Country</td>
            <td>:</td>
            <td><?php echo $row['country'];?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><a href="editprofile.php">Update Details</a></td>
        </tr>

    </table>
       <?php }} ?>

</div>
</div>
</div>
<?php include "include/footer.php"; ?>