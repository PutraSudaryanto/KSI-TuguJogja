<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
 <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/general.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/typography.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/layout.css" />
	<?php if(is_front_page()) {?>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom/custom_maps.js"></script>
	<?php }?>
	<?php wp_head(); ?>
	<script type="text/javascript">
		var baseUrl = "<?php echo get_template_directory_uri(); ?>";
		var ntbs = jQuery.noConflict();
		ntbs(document).ready(function() {
			<?php if(is_front_page()) {?>
			initialize();
			<?php }?>
			
			ntbs('#your-profile .profile-menu ul li').live('click', function() {
				var id = ntbs(this).attr('id');
				ntbs('#your-profile .profile-menu ul li').removeClass('active');
				ntbs(this).addClass('active');
				if(id == 'profile') {
					ntbs('#your-profile #other-course').hide();
					ntbs('#your-profile #other-profile').show();
				} else {
					ntbs('#your-profile #other-profile').hide();
					ntbs('#your-profile #other-course').show();
				}
			});
		});
	</script>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
 </head>
 <body <?php body_class(); ?>>

	<?php if( get_theme_mod( 'ommu_nav_position' ) == 'top') { ?>
    	<?php get_template_part( 'content', 'nav' ); ?>
    <?php }?>
	
	<header>
		<div class="container clearfix">
			<div class="mainmenu">
				<ul class="clearfix">
					<?php if(get_theme_mod('ommu_logo')) {?>
					<li class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo get_theme_mod('ommu_logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a></li>
					<?php }?>
					<?php wp_nav_menu(array(
                        'theme_location' => 'primary',
						'container' => false,
                        'depth' => 0,
						'items_wrap'  => '%3$s',
                        'fallback_cb' => 'ommu_menu_fallback', // workaround to show a message to set up a menu
					)); ?>
				</ul>
			</div>
			<div class="usermenu">
				<?php if (is_user_logged_in()) {
					global $current_user;
					get_currentuserinfo();
				?>
				<ul class="is-login clearfix">
					<li class="menu">
						<a href="javascript:void(0);" title="Menu">Menu</a>
						<ul>
							<li class="member"><a href="javascript:void(0);" title="Member">Member</a>
								<ul>
									<li><a href="<?php echo get_permalink(13);?>" title="Your Profile">Your Profile</a></li>
									<li><a href="<?php echo get_permalink(9);?>" title="Logout">Logout</a></li>
								</ul>
							</li>
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'depth' => 0,
								'items_wrap'  => '%3$s',
								'fallback_cb' => 'ommu_menu_fallback', // workaround to show a message to set up a menu
							)); ?>
						</ul>
					</li>
					<li class="member-off <?php echo in_array($wp->request, array('your-profile')) ? 'active' : '';?>">
						<a href="<?php echo get_permalink(13);?>" title="Hi, <?php echo $current_user->user_login;?>">Hi, <?php echo $current_user->user_login;?></a>
						<ul>
							<li><?php echo get_avatar($current_user->display_name, 50);?></li>
							<li>
								<a href="<?php echo get_permalink(13);?>" title="">Your Profile</a>
								<a href="<?php echo get_permalink(9);?>" title="">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				<?php } else {?>
				<ul class="login">
					<li class="menu">
						<a href="javascript:void(0);" title="Menu">Menu</a>
						<ul>
							<li class="member"><a href="javascript:void(0);" title="Member">Member</a>
								<ul>
									<li><a href="<?php echo get_permalink(8);?>" title="Login">Login</a></li>
									<li><a href="<?php echo get_permalink(10);?>" title="Register">Register</a></li>
									<li><a href="<?php echo get_permalink(11);?>" title="Forgot your password?">Forgot your password?</a></li>
								</ul>
							</li>
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'depth' => 0,
								'items_wrap'  => '%3$s',
								'fallback_cb' => 'ommu_menu_fallback', // workaround to show a message to set up a menu
							)); ?>
						</ul>
					</li>
					<li class="member-off">
						<a href="<?php echo get_permalink(8);?>" title="Login"><span>Login</span></a>
						<form name="loginform" id="loginform" action="<?php echo get_permalink(8);?>" method="post">
						<ul>
							<li><label>Username</label><input type="text" name="log" id="user_login" class="input" value="" /></li>
							<li><label>Password</label><input type="password" name="pwd" id="user_pass" class="input" value="" /></li>
							<li class="clearfix"><input type="button" value="Sign Up" onclick="window.location='<?php echo get_permalink(10);?>'"><input type="submit" name="wp-submit" id="wp-submit" value="Log In" /></li>
							<li class="clearfix"><a href="<?php echo get_permalink(11);?>" title="Forgot your password?">Forgot your password?</a></li>
						</ul>
						<input type="hidden" name="redirect_to" value="<?php echo admin_url();?>" />
						<input type="hidden" name="instance" value="" />						
						<input type="hidden" name="action" value="login" />
						</form>
					</li>
				</ul>
				<?php }?>
			</div>
		</div>
	</header>
	
	<?php //if( get_theme_mod( 'ommu_nav_position' ) == 'normal') { 
		//get_template_part( 'content', 'nav' );
	//}?>
	
	<?php //if( get_theme_mod( 'ommu_nav_position' ) == 'sticky') {
		//get_template_part( 'content', 'nav' );
	//}?>
	
	<?php if(is_front_page()) {?>
	<div class="main home-preview-large">
		<div class="container">
			<h2>bahasa inggris itu mudah...</h2>
			<div>
			<?php if(is_user_logged_in()) {?>
			<?php } else {?>
				<a href="<?php echo get_permalink(10);?>" title="Daftar Gratis">Daftar Gratis</a>
			<?php }?>
			</div>
		</div>
	</div>
	<?php } else {
		if(!is_404()) {
		$arrAttr = explode('/', $wp->request);
		$class = $arrAttr[0]; ?>
		<div class="large-title <?php echo ($class == 'your-profile' || in_array($class, array('courses','lessons','topic'))) ? 'text-left' : ''; ?>">
			<div class="container">
				<?php if($class == 'faq') {?>
				<h2>Pahami Informasi-Informasi Penting<br/>Tentang Website Ini.</h2>
				<?php } else if($class == 'mengapa') {?>
				<h2>Alasan Kursus Bahasa Inggris<br/>di Notoboso?</h2>
				<?php } else if($class == 'fitur') {?>
				<h2>Belajar Bahasa Inggris<br/>Mudah dan Menyenangkan.</h2>
				<?php } else if($class == 'kesan') {?>
				<h2>Kesan-kesan Para Siswa dan<br/>Alumni Notoboso.</h2>
				<?php } else if($class == 'your-profile' || in_array($class, array('courses','lessons','topic'))) {?>
				<h2>"Selamat belajar."</h2>
				<h5>Upgrade akunmu untuk melanjutkan pelajaran-pelajaran<br/>di level yang lebih tinggi.</h5>
				<?php } else if($class == 'register') {?>
				<h2>Daftar Sekarang</h2>
				<?php } else if(in_array($class, array('lostpassword-2','lostpassword','login-2','login'))) {?>
				<h2><?php the_title(); ?></h2>
				<?php } else {?>
				<h2>Simak Informasi-Informasi<br/>Penting dari Kami.</h2>
				<?php }?>
			</div>
		</div>
	<?php }
	}?>