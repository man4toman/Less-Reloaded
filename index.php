<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		
		<div class="gravatar">
			<?php 
				// grab admin email and their photo
				$admin_email = get_option('admin_email');
				echo get_avatar( $admin_email, 100 ); 
			?>
		</div><!--/ author -->
		
		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a> &mdash; <span><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></span></h1>
		</div><!-- /brand -->
	
		<nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<div class="container">

	<div id="primary">
		<div id="content" role="main">


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Home loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_home() || is_archive() ) {
	
?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title() ?>
							</a>
						</h1>
						<div class="post-meta">
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content( __( 'Continue...', 'less-reloaded' ) ); ?>
								
								<?php wp_link_pages(); ?>
							</div>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<div class="category"><?php the_category(); ?></div>
							<div class="tags"><?php the_tags( '| &nbsp;', '&nbsp;' ); ?></div>
						</div><!-- Meta -->
						
					</article>

				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( __( 'Newer &raquo;', 'less-reloaded' ) ); ?></div>
					<div class="next-page"><?php next_posts_link( __( ' &laquo; Older', 'less-reloaded' ) ); ?></div>
				</div><!-- pagination -->


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Nothing posted yet', 'less-reloaded' ); ?></h1>
				</article>

			<?php endif; ?>

		
	<?php } //end is_home(); ?>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Single loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_single() ) {
?>


			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title"><?php the_title() ?></h1>
						<div class="post-meta">
							<?php if( comments_open() ) : ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'less-reloaded' ), __( '1 Comment', 'less-reloaded' ), __( '% Comments', 'less-reloaded' ) ); ?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<?php the_content( __( 'Continue...', 'less-reloaded' ) ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<div class="category"><?php the_category(); ?></div>
							<div class="tags"><?php the_tags( '| &nbsp;', '&nbsp;' ); ?></div>
						</div><!-- Meta -->						
						
					</article>

				<?php endwhile; ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Nothing posted yet', 'less-reloaded' ); ?></h1>
				</article>

			<?php endif; ?>


	<?php } //end is_single(); ?>
	
<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Page loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_page()) {
?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title"><?php the_title() ?></h1>
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Nothing posted yet', 'less-reloaded' ); ?></h1>
				</article>

			<?php endif; ?>

	<?php } // end is_page(); ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

</div><!-- / container-->

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Footer
	/*-----------------------------------------------------------------------------------*/
?>

<footer class="site-footer" role="contentinfo">
	<div class="site-info container">
		<?php do_action( 'break_credits' ); ?>
		<a href="https://wordpress.org/" title="<?php esc_html_e( 'A Semantic Personal Publishing Platform', 'less-reloaded'); ?>" rel="generator"><?php esc_html_e( 'Proudly powered by WordPress', 'less-reloaded'); ?></a>
		<span class="sep"> <?php esc_html_e( 'and', 'less-reloaded' ); ?> </span>
		<?php esc_html_e( 'Less Reloaded by Morteza Geransayeh', 'less-reloaded'); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
