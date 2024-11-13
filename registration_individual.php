			<!--USER-->
			<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="user_registration_form" class="form-horizontal user_registration_form collapse normal">

				<div class="user_registration_wrapper" aria-expanded="false">

<?php
	if($_SESSION["login"]==0){
?>

					<div class="row no-margin-left-right">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email" class="col-sm-4 control-label tr" key="individual1"></label>
								<div class="col-sm-8">
									<input type="email" class="form-control" name="email">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style tr" for="email"></label>
				                    </div>
				                </div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-sm-4 control-label tr" key="individual2"></label>
								<div class="col-sm-8">
									<input type="password" class="form-control password" name="password">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="password"></label>
				                    </div>
				                </div>
							</div>
							<div class="form-group">
								<label for="repassword" class="col-sm-4 control-label tr" key="individual3"></label>
								<div class="col-sm-8">
									<input type="password" id="password-individual" class="form-control" name="repassword">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="repassword"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-4 text-center">
									<div id="upload-demo-normal" class="upload-picture" style="">

									</div>
						  		</div>
						  		<label for="fullname" class="col-sm-4 control-label tr" key="individual4"></label>
								<div class="col-sm-8">
									<input type="file" id="upload" class="upload">
						  		</div>

							</div>
						</div>
					</div>

<?php
	}
?>

					<div class="clearfix">
					</div>
							
					<div class="row no-margin-left-right">

						<div class="col-sm-6">
							<div class="form-group">
								<label for="title" class="col-sm-4 control-label tr" key="individual5"></label>
								<div class="col-sm-8">								
									<select class="form-control title" name="title">
										
									</select>
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="title"> </label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="fullname" class="col-sm-4 control-label tr" key="individual6"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="fullname">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="fullname"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="mobile" class="col-sm-4 control-label tr" key="individual7"></label>
								<div class="col-sm-8">
									<input type="number" class="form-control nric" name="nric">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="nric"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="contactno" class="col-sm-4 control-label tr" key="individual8"></label>
								<div class="col-sm-8">
									<input type="number" class="form-control contactno" name="contactno">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="contactno"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>						

						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="address1" class="col-sm-4 control-label tr" key="individual9"></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="address1">
										</div>
										<div class="col-sm-8 col-sm-offset-4">
											<div class="error_wrapper">
						                    	<label class="error error_style" for="address1"></label>
						                    </div>
						                </div>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-4">
											<input type="text" class="form-control mobile-margin-top-0" name="address2">
										</div>
										<div class="col-sm-8 col-sm-offset-4">
											<div class="error_wrapper">
						                    	<label class="error error_style" for="address2"></label>
						                    </div>
						                </div>
									</div>
								</div>								
							</div>
						</div>

						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="postcode" class="col-sm-4 control-label tr" key="individual10"></label>
										<div class="col-sm-8">
											<input type="number" class="form-control postcode" name="postcode">
										</div>
										<div class="col-sm-8 col-sm-offset-4">
											<div class="error_wrapper">
						                    	<label class="error error_style" for="postcode"></label>
						                    </div>
						                </div>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<label for="city" class="col-sm-4 control-label tr" key="individual11"></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="city">
										</div>
										<div class="col-sm-8 col-sm-offset-4">
											<div class="error_wrapper">
						                    	<label class="error error_style" for="city"></label>
						                    </div>
						                </div>
									</div>
								</div>								
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="state" class="col-sm-4 control-label tr" key="individual12"></label>
								<div class="col-sm-8">
								
									<select class="form-control state" name="state">
										
									</select>
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="state"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="area" class="col-sm-4 control-label tr" key="individual13"></label>
								<div class="col-sm-8">
									<select class="area" name="area" title="">

									</select>
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="area"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="latitude" class="col-sm-4 control-label tr" key="individual14"></label>
								<div class="col-sm-8">								
									<input type="text" class="form-control" name="latitude">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="latitude"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="longitude" class="col-sm-4 control-label tr" key="individual15"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="longitude">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="longitude"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						
	
					</div>


					<div class="clearfix">
					</div>
						
					<div class="form-group blue_button_wrapper mobile-center">
						<div class="col-sm-offset-5 col-sm-2">
							<input type="submit" class="blue_button" value="Daftar">
						</div>
					</div>
				
				
				</div>
			</form>
