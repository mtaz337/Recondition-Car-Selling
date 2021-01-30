<?php
include 'admin/includes/header.php';
?>


<?php
$user = new User;
//
if (isset($_POST['create'])) {

    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];
        $user->email = $_POST['email'];


$user->save_user_and_image();

echo 'Registration successful';


        }
   



//    $array = [
//        'username' => '',
//        'first_name' => '',
//        'last_name' => '',
//        'email' => '',
//        'password' => ''
//    ];
//    
//    if (strlen($username)<4){
//        $array['username']="Username needs to be atleast 4 characters ";
//    }
//      if ($username==' '){
//        $array['username']="Username cannot be empty";
//    }
////     if (username_exist($username)){
////        $array['username']="Username already exists";
////    }
//    if ($email==''){
//        $array['email']="Email cannot be empty";
//    }
////     if (email_exist($email)){
////        $array['email']="This email already exists <a href='login.php'>Please Log in</a>";
////    }
//     if ($password==''){
//        $array['password']="Password cannot be empty";
//    }
//    
//    foreach ($array as $key=>$value){
//        if(empty($value)){
//         
//            unset($array[$key]);
//        }
//    }
//
//    if (empty($array)){
//        register_user($username, $email, $password);
//        login_user($username, $password);
//    }
//
//} 

}
?>




















<?php
include 'includes/navigation.php';
?>







<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top: 20px;">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form method="post" role="form">
			<h2>Please Sign Up <small>It's free and always will be.</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="Username" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
					</div>
				</div>
				
			</div>
			<div class="row">
				
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" name="create" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
