<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="login profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		<input type="hidden" name="from" value="profile" />
		<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		
		<div id="other-profile">
			
			<?php if ( has_action( 'personal_options' ) ) : ?>
			<fieldset>
				<h3><?php _e( 'Personal Options' ); ?></h3>

				<table class="form-table">
				<?php do_action( 'personal_options', $profileuser ); ?>
				</table>
			</fieldset>
			<?php endif; ?>

			<fieldset class="clearfix balance">
				<?php do_action( 'profile_personal_options', $profileuser ); ?>
				<h3><?php _e( 'Name' ); ?></h3>
				<div class="left">
					<div class="clearfix">
						<label for="user_login"><?php _e( 'Username' ); ?></label>
						<div class="desc">
							<input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="span-9" />
							<span class="small-px silent"><?php _e( 'Your username cannot be changed.', 'theme-my-login' ); ?></span>
						</div>
					</div>
					<div class="clearfix">
						<label for="first_name"><?php _e( 'First Name' ); ?></label>
						<div class="desc">
							<input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ); ?>" class="span-9" />
						</div>
					</div>
					<div class="clearfix">
						<label for="last_name"><?php _e( 'Last Name' ); ?></label>
						<div class="desc">
							<input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $profileuser->last_name ); ?>" class="span-9" />
						</div>
					</div>
				</div>
				<div class="right">
					<div class="clearfix">
						<label for="nickname"><?php _e( 'Nickname' ); ?></label>
						<div class="desc">
							<input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="span-9" />
						</div>
					</div>
					<div class="clearfix">
						<label for="display_name"><?php _e( 'Display name publicly as' ); ?></label>
						<div class="desc">
							<select name="display_name" id="display_name" class="medium">
							<?php
								$public_display = array();
								$public_display['display_nickname']  = $profileuser->nickname;
								$public_display['display_username']  = $profileuser->user_login;

								if ( ! empty( $profileuser->first_name ) )
									$public_display['display_firstname'] = $profileuser->first_name;

								if ( ! empty( $profileuser->last_name ) )
									$public_display['display_lastname'] = $profileuser->last_name;

								if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
									$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
									$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
								}

								if ( ! in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
									$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

								$public_display = array_map( 'trim', $public_display );
								$public_display = array_unique( $public_display );

								foreach ( $public_display as $id => $item ) {
							?>
								<option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
							<?php
								}
							?>
							</select>					
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset class="clearfix balance">
				<h3><?php _e( 'Contact Info' ); ?></h3>
				<div class="left">
					<div class="clearfix">
						<label for="email"><?php _e( 'E-mail' ); ?></label>
						<div class="desc">
							<input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="span-9" />
						</div>
					</div>
					<div class="clearfix">
						<label for="url"><?php _e( 'Website' ); ?></label>
						<div class="desc">
							<input type="text" name="url" id="url" value="<?php echo esc_attr( $profileuser->user_url ); ?>" class="span-9 code" />
						</div>
					</div>
				</div>
				<div class="right">
					<?php
						foreach ( _wp_get_user_contactmethods() as $name => $desc ) {
					?>
					<div class="clearfix">
						<label for="<?php echo $name; ?>"><?php echo apply_filters( 'user_'.$name.'_label', $desc ); ?></label>
						<div class="desc">
							<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_attr( $profileuser->$name ); ?>" class="regular-text" />
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</fieldset>

			<fieldset class="clearfix balance">
				<h3><?php _e( 'About Yourself' ); ?></h3>
				<div class="left">
					<div class="clearfix">
						<label for="description"><?php _e( 'Biographical Info' ); ?></label>
						<div class="desc">
							<textarea name="description" id="description" rows="5" cols="30" class="span-11 medium"><?php echo esc_html( $profileuser->description ); ?></textarea>
							<span class="small-px silent"><?php _e( 'Share a little biographical information to fill out your profile. This may be shown publicly.' ); ?></span>
						</div>
					</div>
				</div>
				<div class="right">
					<?php
					$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
					if ( $show_password_fields ) :
					?>
					<div class="clearfix">
						<label for="pass1"><?php _e( 'New Password' ); ?></label>
						<div class="desc">
							<div>
								<input type="password" name="pass1" id="pass1" value="" autocomplete="off" />
								<span class="small-px silent"><?php _e( 'If you would like to change the password type a new one. Otherwise leave this blank.' ); ?></span>
							</div>
							<div>
								<input type="password" name="pass2" id="pass2" value="" autocomplete="off" />
								<span class="small-px silent"><?php _e( 'Type your new password again.' ); ?></span>
							</div>
							<span class="small-px silent"><?php _e( 'Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).' ); ?></span>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</fieldset>
			
			<input type="hidden" name="action" value="profile" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />
			<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Update Profile' ); ?>" name="submit" />
		</div>
		
		<div id="other-course">
			<?php do_action( 'show_user_profile', $profileuser ); ?>
		</div>
		
	</form>
</div>
