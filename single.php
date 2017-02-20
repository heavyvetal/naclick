<?php get_header(); ?>
<body>
	<header class="blog-header">
		<a href="<?php echo get_site_url();?>"><img id="logo" src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="Logo"></a>
			<div id="phones">
			<p>(050) 805 08 04</p>
			<p>(067) 637 28 48</p>
			<p>(093) 907 57 55</p>
		</div>
	</header>
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<footer class="blogofooter">
	<div class="wrapper">
		<div class="left"><img src="<?php echo get_template_directory_uri();?>/images/skype.png" alt="">igornazim</div>
		<div class="center"><img src="<?php echo get_template_directory_uri();?>/images/mail.png" alt="">igor.mainevent@gmail.com</div>
		<div class="right"><img src="<?php echo get_template_directory_uri();?>/images/phone.png" alt="">050 805 08 04</div>
		<div style="clear: both"></div>
	</div>
</footer>
<?php get_footer(); ?>