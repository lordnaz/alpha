
		<!-- Login Module -->
		<aside class="modal fade login-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-md-12 text-center">
                			<a class="btn btn-secondary btn-lg q-btn-secondary tr" key="continue" data-dismiss="modal"></a>
              			</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-6">
								<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="login_form" class="login-form text-center">
									<div class="form-group">
										<div class="input-group">
											<input type="email" class="form-control" maxlength="255" name="email"  placeholder="" />
										</div>
										<div class="error_wrapper">
					                    	<label class="error error_style tr" for="email"></label>
					                    </div>
						            </div>
						            <div class="form-group">
						            	<div class="input-group">
											<input type="password" class="form-control" maxlength="255" name="password" placeholder="" />
										</div>
										<div class="error_wrapper">
					                    	<label class="error error_style tr" for="password"></label>
					                    </div>
						            </div>
						            <button type="submit" class="btn btn-secondary l-btn-secondary tr" key="login">
						            	
						            </button>
						        </form>
						    </div>
						    <div class="col-sm-6 login-desc">
								<div class="roboto-black tr" key="whylogin">

								</div>
								<div class="tr" key="loginexplaination">
									
								</div>
						    </div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="registration.php" class="register-link tr" key="newregistration">
									
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<!-- Display login status -->
								<div id="status"></div>	

								<!-- Facebook login or logout button -->
								<!-- <a href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><img src="img/fb-trans.png" class="fb-button" /></a> -->

								<!-- Display user profile data -->
								<div id="userData"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</aside>
