<?php include "include/header.php"; ?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
   .payment{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 50px;}
   .payment h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}
   .payment a{background: #ff0000 none repeat scroll 0 0; border-radius: 3px; color: #fff; font-size: 25px; padding: 5px 30px;}
</style>
<div class="main">
<div class="content">
<div class="section group">
    <div class="payment">
    <h2>Choose Payment Option</h2>
        <a href="offline.php">Offline Payment</a>
        <a href="online.php">Online Payment</a>
    </div>


</div>
</div>
</div>
<?php include "include/footer.php"; ?>