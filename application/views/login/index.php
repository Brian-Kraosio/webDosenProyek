<?= form_open('login/proses_login'); ?>
<div class="container-login100" style="background-image: url(assets/images/background1.jpg)">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12 ">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<!-- form card login -->
						<!-- cek pesan -->
						<div class="limiter">
							<div class="wrap-login100">
								<form class="login100-form validate-form">
									<span class="login100-form-logo">
										<img class="login100-form-logo" src="assets/images/jti.jpg">
									</span>
									<span class="login100-form-title p-b-34 p-t-27">
										Log in
									</span>

									<div class="wrap-input100 validate-input" data-validate="Enter username">
										<input class="input100" type="text" name="username" id="username" placeholder="Username">
										<span class="focus-input100" data-placeholder="&#xf207;"></span>
									</div>

									<div class="wrap-input100 validate-input" data-validate="Enter password">
										<input class="input100" type="password" name="password" id="password" placeholder="Password">
										<span class="focus-input100" data-placeholder="&#xf191;"></span>
									</div>
									<span id="eye" onclick="change()"><i class="glyphicon glyphicon-eye-open"></i></span>
									<div class="container-login100-form-btn">
										<button class="login100-form-btn">
											Login
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /form card login -->

				</div>
			</div>
			<!--/row-->

		</div>
		<!--/col-->
	</div>
	<!--/row-->
</div>
<!--/container-->

<script>
function change()
         {
            var x = document.getElementById('password').type;

            if (x == 'password')
            {
               document.getElementById('password').type = 'text';
               document.getElementById('eye').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
            }
            else
            {
               document.getElementById('password').type = 'password';
               document.getElementById('eye').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
            }
         }
</script>
<?= form_close() ?>