
<?php include "include/header.php"?>
<?php
	$login = Session::get("cuslogin");
	if ($login == true) {
		header("Location:order.php");
	}
?>

<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['login']))  {
			$customerlogin = $cmr->customerlogin($_POST);
		}
		?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<?php 
			if (isset($customerlogin)) {
				echo $customerlogin;
			}
			?>
        	<form action="" method="post" id="member">
                	<input name="email" type="text" placeholder="Email" class="fuild">
					<input name="pass" type="password" placeholder="Password" >
					<div class="buttons"><div><button class="grey" name="login">Login</button></div></div>
					</div>
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey">Sign In</button></div></div>
                    </div>
    	<div class="register_account">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['register']))  {
			$customerReg = $cmr->customerRegi($_POST);
		}
		?>
			<h3>Register New Account</h3>
			<?php 
			if (isset($customerReg)) {
				echo $customerReg;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input name="name" type="text" placeholder="Name"/>
							</div>
							
							<div>
							<input name="city" type="text" placeholder="City"/>
							</div>
							
							<div>
							<input name="zip" type="text" placeholder="Zip-code"/>
							</div>
							<div>
							<input name="email" type="text" placeholder="email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
						<input name="address" type="text" placeholder="Address"/>
						</div>
		    		<div>
					<input name="country" type="text" placeholder="Country"/>
				 </div>		        
	
		           <div>
				   <input name="phone" type="text" placeholder="Phone"/>
		          </div>
				  
				  <div>
				  <input name="pass" type="text" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include "include/footer.php"?>