<?php
	// Modify the values in $options to fit your company/organization.
	$options = array(
		'company_name' => 'Assurant',
		'company_url'  => 'https://assurant.com', 
		'email_domain' => 'assurant.com', // Do not prepend with http://
		'logo_url'     => 'https://www.assurant.com/images/assurant/nextgen/assurant-logo.png',  // Must be an absolute path
		'colors'       => array(
			'primary'   => '#646464', // Name, emal address, phone and address
			'secondary' => '#0066cc', // Title/position
			'tertiary'  => '#b4b4b4'  // Horizontal border
		),
		'image_urls' => array(
			'great_place'  => array(
				'https://www.greatplacetowork.com/certified-company/1205926', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image002.jpg'  // Must be an absolute path
			),
			'careers'   => array(
				'https://www.myworkday.com/assurant/d/task/1422$80.htmld', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image003.png'  // Must be an absolute path
			),
			'awards' => array(
				'https://jobs.assurant.com/awards/?source=emailsignature', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image004.png'  // Must be an absolute path
			),
			'dei'     => array(
				'https://www.assurant.com/our-story/diversity?utm_source=outlook&utm_medium=email&utm_campaign=signature&utm_content=click', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image005.png'  // Must be an absolute path
			),
			'we_care'  => array(
				'https://www.assurant.com/our-story/social-responsibility?utm_source=outlook&utm_medium=email&utm_campaign=signature&utm_content=click', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image006.png'  // Must be an absolute path
			),
			'referrals'  => array(
				'https://assurantconnects.sharepoint.com/teams/learning/MyHRWD/Workday%20Job%20Aids/EmpRefJobSrch-JA.pdf', // Hide by setting this to an empty string
				'https://raw.githubusercontent.com/jonochocki/Assurant-Email-Signature-Generator/main/images/thumbnail_image007.png'  // Must be an absolute path
			)
		),
		'address_list' => array(
			array( 'United States', '88 Colin P Kelly Jr St, San Francisco, CA 94107, USA' ),
			array( 'Australia', 'Homemaker City, Castlereagh Street, Sydney NSW 2000, Australia' ),
			array( 'Japan', '1-10-５ Akasaka, Minato, Tokyo 107-0052, Japan' ),
			array( 'United Kingdom', '24 Grosvenor Square, London W1A 2LQ, United Kingdom' )
		),
		'hide_address_field' => true,
		'sample_data' => array(
			'full_name' => 'John Doe',
			'position'  => 'Talent Acquisition',
			'email_address'  => 'john.doe@assurant.com',
			'phone_number'  => '111.111.1111'
		)
	);
?>

<?php if( $_POST['create-signature'] ) : 

	$full_name = $_POST['full-name'];
	$position = $_POST['position'];
	$country = $_POST['country'];
	$address = $_POST['mailing-address'];
	$email_address = $_POST['email'];
	$primary_number_prefix = $_POST['primary-number-type'];
	$secondary_number_prefix = $_POST['secondary-number-type'];
	$primary_number = $_POST['primary-number'];
	$secondary_number = $_POST['secondary-number'];
?>

<!-- EMAIL SIGNATURE OUTPUT -->
<table style="width:550px; font-size:11px; font-family:'Open Sans',  Helvetica, Arial, sans-serif; margin:0; padding:0;">
	<tr>
		<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
			<h2 id="full-name" style="font:bold 18px/22px 'Open Sans',  Helvetica, Arial, sans-serif; letter-spacing:-1px; text-transform:capitalize; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $full_name; ?></h2>
			<h3 id="position" style="font:normal 14px/16px 'Open Sans',  Helvetica, Arial, sans-serif; text-transform:capitalize; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding-top:8px;"><?php echo $position; ?></h3>
            <h3 style="font:normal 14px/16px 'Open Sans',  Helvetica, Arial, sans-serif; text-transform:capitalize; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding-top:1px;"><a href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>"><?php echo $options['company_name']; ?></a></h3>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<address id="email-address" style="font: normal 14px/16px 'Open Sans', Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($email_address != ''){
						$print = 'Email: <a href="mailto:'.$email_address.'@'. $options['email_domain'] .'" target="_blank" style="color:'. $options['colors']['primary'] .'; text-decoration:none;">'.$email_address.'@'. $options['email_domain'] .'</a>';
						echo $print;
					}
				?>
			</address>
			<address style="font: normal 14px/16px 'Open Sans', Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($secondary_number != ''){
						$print = $primary_number_prefix.': '.$primary_number.' | '.$secondary_number_prefix.': '.$secondary_number;
					}
					else{
						$print = $primary_number_prefix.': '.$primary_number;
					}
					echo $print;
				?>
			</address>
			<?php if( !$options['hide_address_field'] ) : ?>
				<address style="font: normal 14px/16px 'Open Sans', Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
					<?php 
						if($address != ''){
							echo $address;
						}
					?>
				</address>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td>
			<a style="width:180px; margin:16px 0 8px; display:block;" href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>">
				<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="180px;" />
			</a>
		</td>
	</tr>
	<tr>
		<td style="padding-top: 10px;">
			<?php if( $options['image_urls']['great_place'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['great_place'][0]; ?>" target="_blank" title="great_place" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['great_place'][1]; ?>" alt="great_place" width="80px" />
				</a>
			<?php endif; ?>
			<?php if( $options['image_urls']['careers'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['careers'][0]; ?>" target="_blank" title="careers" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['careers'][1]; ?>" alt="careers" width="80px" />
				</a>
			<?php endif; ?>
			<?php if( $options['image_urls']['awards'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['awards'][0]; ?>" target="_blank" title="awards" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['awards'][1]; ?>" alt="awards" width="80px" />
				</a>
			<?php endif; ?>
			<?php if( $options['image_urls']['dei'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['dei'][0]; ?>" target="_blank" title="dei" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['dei'][1]; ?>" alt="dei" width="80px" />
				</a>
			<?php endif; ?>
			<?php if( $options['image_urls']['we_care'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['we_care'][0]; ?>" target="_blank" title="we_care" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['we_care'][1]; ?>" alt="we_care" width="80px" />
				</a>
			<?php endif; ?>
			<?php if( $options['image_urls']['referrals'][0] != '' ) : ?>
				<a href="<?php echo $options['image_urls']['referrals'][0]; ?>" target="_blank" title="referrals" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['image_urls']['referrals'][1]; ?>" alt="we_care" width="80px" />
				</a>
			<?php endif; ?>
		</td>
	</tr>
</table>

<?php else : ?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Email Signature Generator</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div class="page-header">
		<h1>Email Signature Generator</h1>
	</div>

	<!-- EMAIL SIGNATURE DETAILS -->
	<form id="email-signature-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" target="_blank" autocomplete="off">
		<br>
		<p>Please use the form below to create your email signature. Follow the instructions at the bottom of this page to add the signature into your email client. The <strong>*</strong> symbol denotes a required field.</p><br>

		<table class="contact-details" width="100%" cellspacing="8" style="margin: 0 auto;">
			<tr>
				<td width="200px"><label for="full-name">Full Name *</label></td>
				<td colspan="2"><input type="text" name="full-name" /></td>
			</tr>
			<tr>
				<td><label for="position">Title/Position *</label></td>
				<td colspan="2"><input type="text" name="position" /></td>
			</tr>
			<?php if( !$options['hide_address_field'] ) : ?>
				<tr>
					<td><label for="country">Country *</label></td>
					<td colspan="2">
						<select name="country">
							<option selected disabled>-- Select --</option>
							<?php foreach( $options['address_list'] as $address ) : ?>
								<option value="<?php echo $address[0]; ?>"><?php echo $address[0]; ?></option>
							<?php endforeach; ?>
						</select>
						<input name="mailing-address" type="hidden" value="" />
					</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td><label for="email">Email Address *</label></td>
				<td colspan="2">
					<input class="email-user" type="text" name="email" maxlength="50" />
					<span class="email-domain">@<?php echo $options['email_domain']; ?></span>
				</td>
			</tr>
			<tr>
				<td><label for="primary-number">Primary Phone *</label></td>
				<td width="95px">
					<select name="primary-number-type" style="background-position: 92% center;">
						<option value="T" selected>Phone</option>
						<option value="C">Cell Phone</option>
					</select>
				</td>
				<td><input type="text" name="primary-number" /></td>
			</tr>
			<tr>
				<td><label for="secondary-number">Secondary Phone</label></td>
				<td width="95px">
					<select name="secondary-number-type" style="background-position: 92% center;">
						<option value="T">Phone</option>
						<option value="C" selected>Cell Phone</option>
					</select>
				</td>
				<td><input type="text" name="secondary-number" maxlength="30" /></td>
			</tr>
		</table>

		<!-- EMAIL SIGNATURE PREVIEW -->
		<div class="signature-preview">
			<table style="width:100%;">
				<tr>
					<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
						<h2 id="full-name" style="font:bold 18px/22px 'Open Sans', Helvetica, Arial, sans-serif; letter-spacing:-1px; text-transform:capitalize; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['full_name']; ?></h2>
						<h3 id="position" style="font:normal 14px/16px 'Open Sans', Helvetica, Arial, sans-serif; letter-spacing:-1px; text-transform:capitalize; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding-top:5px;"><?php echo $options['sample_data']['position']; ?></h3>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<address id="email-address" style="font: normal 14px/16px 'Open Sans',  Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Email: ' . $options['sample_data']['email_address']; ?>
						</address>
						<address id="phone-number" style="font: normal 14px/16px 'Open Sans',  Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Phone: ' . $options['sample_data']['phone_number']; ?>
						</address>
						<?php if( !$options['hide_address_field'] ) : ?>
							<address id="address" style="font: normal 14px/16px 'Open Sans',  Helvetica, Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>">
								<?php echo $options['address_list'][0][1]; ?>
							</address>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>
						<a style="width:180px; margin:16px 0 8px; display:block;" href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>">
							<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="180px" />
						</a>
					</td>
				</tr>
				<tr>
					<td style="padding-top: 10px;">
						<?php if( $options['image_urls']['great_place'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['great_place'][0]; ?>" target="_blank" title="great_place" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['great_place'][1]; ?>" alt="great_place" width="80px" />
							</a>
						<?php endif; ?>
						<?php if( $options['image_urls']['careers'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['careers'][0]; ?>" target="_blank" title="careers" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['careers'][1]; ?>" alt="careers" width="80px" />
							</a>
						<?php endif; ?>
						<?php if( $options['image_urls']['awards'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['awards'][0]; ?>" target="_blank" title="awards" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['awards'][1]; ?>" alt="awards" width="80px" />
							</a>
						<?php endif; ?>
						<?php if( $options['image_urls']['dei'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['dei'][0]; ?>" target="_blank" title="dei" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['dei'][1]; ?>" alt="dei" width="80px" />
							</a>
						<?php endif; ?>
						<?php if( $options['image_urls']['we_care'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['we_care'][0]; ?>" target="_blank" title="we_care" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['we_care'][1]; ?>" alt="we_care" width="80px" />
							</a>
						<?php endif; ?>
						<?php if( $options['image_urls']['referrals'][0] != '' ) : ?>
							<a href="<?php echo $options['image_urls']['referrals'][0]; ?>" target="_blank" title="referrals" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['image_urls']['referrals'][1]; ?>" alt="we_care" width="80px" />
							</a>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>

		<table width="100%" cellspacing="8" style="padding-top:20px;">
			<tr>
				<td width="65%">
					<p>In the new window, press <strong>CTL + A</strong> (Windows) or <strong>CMD + A</strong> (Mac) to select the content. <strong>Copy/paste</strong> this content into your email client using one of the links listed below.<p>
				</td>
				<td width="35%">
					<input type="submit" name="create-signature" value="Create Signature" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br><br>
					<ul class="client-links">
						<li><a href="http://mydesignpad.com/how-to-install-html-email-signature-for-google-gmail/" target="_blank">Gmail</a></li>
						<li><a href="http://mydesignpad.com/how-to-install-html-email-signature-for-microsoft-outlook-2010-windows/" target="_blank">Outlook</a></li>
						<li><a href="http://mydesignpad.com/create-a-html-email-signature-for-mac-os-x-mountain-lion-10-8/" target="_blank">Mac Mail</a></li>
						<li><a href="http://mydesignpad.com/how-to-create-complex-html-email-signatures-for-mozilla-thunderbird/" target="_blank">Thunderbird</a></li>
					</ul>
				</td>
			</tr>
		</table>
	</form>
</body>

<!-- JavaScript Files Go Here -->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
	$(function(){

		//FORM SUBMISSION
		$('#email-signature-form').submit(function(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position = $('#email-signature-form input[name="position"]').val();

			<?php if( !$options['hide_address_field'] ) : ?>
			var country = $('#email-signature-form select[name="country"]').val();
			<?php endif; ?>

			var email_address = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number = $('#email-signature-form input[name="secondary-number"]').val();

			if(full_name != '' && position != ''){
				if(country != null){
					if(email_address != ''){
						if(primary_number != ''){
							if(secondary_number == ''){
								return true;
							}
							else{
								if(primary_number_prefix != secondary_number_prefix && primary_number != secondary_number){
									return true;
								}
								else{
									alert('You may not use the same phone number/type twice.');
									return false;
								}
							}
						}
						else{
							alert('Please enter a primary phone number.');
							return false;
						}
					}
					else{
						alert('Please enter an email address.');
						return false;
					}
				}
				else{
					alert('Please select a country.');
					return false;
				}
			}
			else{
				alert('Please fill in your name and job title/position.');
				return false;
			}
		});

		// SIGNATURE PREVIEW LISTENER
		$('input[name="full-name"], input[name="position"], input[name="address"], input[name="email"], input[name="primary-number"], input[name="secondary-number"]').keyup(function(){
			input_field_callback();
		});

		$('select[name="country"], select[name="primary-number-type"], select[name="secondary-number-type"]').change(function(){
			input_field_callback();
		});

		function input_field_callback(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position = $('#email-signature-form input[name="position"]').val();
			
			<?php if( !$options['hide_address_field'] ) : ?>
			var country = $('#email-signature-form select[name="country"]').val();
			<?php endif; ?>

			var email_address = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number = $('#email-signature-form input[name="secondary-number"]').val();

			var email_domain = '<?php echo $options['email_domain']; ?>';

			if(full_name != ''){
				$('#full-name').text(full_name);
			}
			else{
				$('#full-name').text('<?php echo $options['sample_data']['full_name']; ?>');
			}

			if(position != ''){
				$('#position').text(position);
			}
			else{
				$('#position').text('<?php echo $options['sample_data']['position']; ?>');
			}

			<?php if( !$options['hide_address_field'] ) : ?>
				<?php foreach( $options['address_list'] as $address ) : ?>

					if(country == '<?php echo $address[0]; ?>'){
						mailing_address = '<?php echo $address[1]; ?>';
						$('#address').text(mailing_address);
						$('#email-signature-form input[name="mailing-address"]').val(mailing_address);
					}

				<?php endforeach; ?>
			<?php endif; ?>


			if(email_address != ''){
				$('#email-address').html('Email: <a href="mailto:' + email_address + '@'+ email_domain +'" target="_blank">' + email_address + '@'+ email_domain +'</a>');
			}
			else{
				$('#email-address').html('<?php echo "Email: " . $options["sample_data"]["email_address"]; ?>');
			}

			if(primary_number != ''){
				if(secondary_number != ''){
					$('#phone-number').html(primary_number_prefix + ': ' + primary_number + ' | ' + secondary_number_prefix + ': ' + secondary_number);
				}
				else{
					$('#phone-number').text(primary_number_prefix + ': ' + primary_number);
				}
			}
			else{
				$('#phone-number').html('<?php echo "T: " . $options["sample_data"]["phone_number"]; ?>');
			}
		}
	});
</script>
</html>
<?php endif; ?>
