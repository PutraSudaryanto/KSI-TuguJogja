<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Ommu-KSI-TuguJogja already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ommu_tugujogja
 * @since Ommu-KSI-TuguJogja 5.0.3
 */
 
$arrAttr = explode('/', $wp->request); 
$class = $arrAttr[0];

get_header(); ?>

<div id="blog" class="body single-page">
	<div class="container clearfix">
		<div class="before"></div>
		<div class="after"></div>
		<div class="content" id="<?php echo $class;?>">    
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<ul class="breadcrumbs">','</ul>'); } ?>

			<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'ommu_tugujogja' ), '<span>' . get_the_date() . '</span>' );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'ommu_tugujogja' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ommu_tugujogja' ) ) . '</span>' );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'ommu_tugujogja' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ommu_tugujogja' ) ) . '</span>' );
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'ommu_tugujogja' );
							
						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audio', 'ommu_tugujogja' );
							
						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'ommu_tugujogja' );						
							
						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'ommu_tugujogja' );
							
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'ommu_tugujogja' );						
							
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'ommu_tugujogja' );																
							
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'ommu_tugujogja' );
							
						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Status', 'ommu_tugujogja' );												

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'ommu_tugujogja' );
							
						else :
							_e( 'Archives', 'ommu_tugujogja' );
						endif;
					?>				
				</h1>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/* Include the post format-specific template for the content. If you want to
					 * this in a child theme then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;

				ommu_content_nav( 'nav-below' );
				?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>
		
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>