<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="login" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post">
		<fieldset>
			<?php do_action( 'login_form' ); ?>
			
			<div class="clearfix">
				<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username' ); ?></label>
				<div class="desc">
					<input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="span-10" value="<?php $template->the_posted_value( 'log' ); ?>" />
				</div>
			</div>
			
			<div class="clearfix">
				<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password' ); ?></label>
				<div class="desc">
					<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="span-10" value="" />
				</div>
			</div>
			
			<div class="clearfix publish">
				<label>&nbsp;</label>
				<div class="desc">
					<input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
					<label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me' ); ?></label>
				</div>
			</div>
			
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="login" />
			
			<div class="clearfix publish">
				<label>&nbsp;</label>
				<div class="desc">
					<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In' ); ?>" />
				</div>
			</div>
			
			<?php //$template->the_action_links( array( 'login' => false ) ); ?>
			
		</fieldset>
	</form>
</div>
