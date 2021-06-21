
<?= form_open('login/change_pass'); ?>
<div clas s="container-login100" style="background-image: url(assets/images/background.jpg)">
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
                        <img class="login100-form-logo" src="<?=base_url()?>assets/images/jti.jpg">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Change Pass
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Old Password">
						<input class="input100" type="password" name="old_pass" id="old_pass" placeholder="Old Pass" placeholder="Old Password">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="new_pass" id="new_pass" placeholder="New Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="login" name="change_pass">
							Change Password
                        </button><a style="font-size: 20px !important" href="<?= base_url(); ?>user/dosen" class="login100-form-btn ml-2">Go back</a>
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
<?= form_close() ?>