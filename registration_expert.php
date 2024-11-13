			<!--EXPERT -->

			<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="expert_registration_form" class="form-horizontal expert_registration_form collapse expert">

				<div class="expert_registration_wrapper" aria-expanded="false">

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
									<input type="password" id="password-expert" class="form-control password" name="password">
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
									<input type="password" class="form-control" name="repassword">
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
									<div id="upload-demo-expert" class="upload-picture">

									</div>
						  		</div>
						  		<label for="fullname" class="col-sm-4 control-label tr" key="individual4"></label>
								<div class="col-sm-8">
									<input type="file" id="upload3" class="upload">									
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
									<select class="form-control title2" name="title">
										
									</select>
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="title"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="fullname" class="col-sm-4 control-label tr" key="individual6"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control fullname" name="fullname">
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
								<label for="contactno" class="col-sm-4 control-label tr" key="individual8"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="contactno">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="contactno"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="tauliah" class="col-sm-4 control-label tr" key="expert1"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="tauliah">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="tauliah"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="nric" class="col-sm-4 control-label tr" key="individual7"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nric">
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
								<label for="education" class="col-sm-4 control-label tr" key="expert2"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="education">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="education"></label>
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
								
									<select class="form-control state3" name="state">
									
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
									<select class="area3" name="area">

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
								<label for="area" class="col-sm-4 control-label tr" key="expert3"></label>
								<div class="col-sm-8">
								
									<select class="form-control bank" name="bank">
										
									</select>
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="bank"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="fullname" class="col-sm-4 control-label tr" key="expert4"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="account">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="account"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="facebook" class="col-sm-4 control-label tr" key="organization2"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="facebook">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="facebook"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="youtube" class="col-sm-4 control-label tr" key="organization3"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="youtube">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="youtube"></label>
				                    </div>
				                </div>
							</div>
						</div>

						<div class="clearfix">
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label for="instagram" class="col-sm-4 control-label tr" key="organization4"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="instagram">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="instagram"></label>
				                    </div>
				                </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="other_link" class="col-sm-4 control-label tr" key="organization5"></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="other_link">
								</div>
								<div class="col-sm-8 col-sm-offset-4">
									<div class="error_wrapper">
				                    	<label class="error error_style" for="other_link"></label>
				                    </div>
				                </div>
							</div>
						</div>		
					</div>


					<div class="clearfix">
					</div>

					<div class="col-xs-12 text-center">
						<div class="form-group no-margin-left-right tr" key="expert5">>
							
						</div>
					</div>

					<div class="clearfix">
					</div>

					<div class="col-md-6">
						<div class="form-group">

						<?php
							$max = count($service);
							$half_max = round($max/2, 0, PHP_ROUND_HALF_UP);

							$count = 0;
							while ($count<$half_max){
						?>

							<div class="checkbox col-sm-6">
								<label>
									<input type="checkbox" class="services" name="services[]" rate=<?php echo $count; ?> value="<?php echo $service[$count]['id']; ?>"><?php echo $service[$count]['service']; ?>
								</label>
							</div>

							 
							 <div class="rate rate_wrapper<?php echo $count; ?>">
								<label class="col-sm-3 col-xs-6 control-label mobile-rate-padding persession">per sesi</label>
								<div class="col-sm-2 col-xs-6">
									<input type="text" class="form-control mobile-margin-top-0" name="rate[]" placeholder="0">
								</div>
							</div>

							<div class="clearfix">
							</div>

						<?php
								$count++;

							}
						?>

						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">

						<?php


							$max = count($service);
							$half_max = round($max/2, 0, PHP_ROUND_HALF_UP);

							while ($half_max<$max){
						?>

							<div class="checkbox col-sm-6 col-md-offset-1">
								<label>
									<input type="checkbox" class="services" name="services[]" rate=<?php echo $half_max; ?> value="<?php echo $service[$half_max]['id']; ?>"><?php echo $service[$half_max]['service']; ?>
								</label>
							</div>

							 
							 <div class="rate rate_wrapper<?php echo $half_max; ?>">
								<label class="col-sm-3 col-xs-6 control-label persession">per sesi</label>
								<div class="col-sm-2 col-xs-6">
									<input type="text" class="form-control" name="rate[]" placeholder="0">
								</div>
							</div>

							<div class="clearfix">
							</div>	


						<?php
								$half_max++;

							}
						?>

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