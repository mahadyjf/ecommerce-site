<?php include "include/header.php"; ?>
<?php
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
   .success{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 20px;}
   .success h2{border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 10px;}
  .success p {line-height: 25px; font-size: 18px; text-align: left;}
</style>
<div class="main">
<div class="content">
<div class="section group">
    <div class="success">
    <h2>Success</h2>
    <?php
      $cmrid = Session::get('cmrid');
      $amount = $ct->payableAmount($cmrid);
    ?>
       <p>Total Payable Amount(Including Vat) : $
          <?php
           if ($amount) {
            $sum = 0;
            while($row = $amount->fetch_assoc()){
               $price = $row['price'];
               $sum = $sum + $price;
            
          $vat =$sum * 0.1;
          $total = $sum + $vat;
          echo $total;
            }}
            
          ?>
       </p>
       <p>Thanks for Purchase. Receive Your Order Successfully . We will contact You As soon as possival with delivery details. Here is your order details.... <a href="orderdetails.php">Visit Here...</a> </p>
    </div>


</div>
</div>
</div>
<?php include "include/footer.php"; ?>