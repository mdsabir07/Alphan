<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( '/template-parts/common/hero' ); ?>

<div class="posts text-center">
	<!-- Display current tag title -->
	<h1 class="post-tag-title">Post Under: <?php single_tag_title(); ?></h1>
	<!-- Display current tag title -->

	<?php 
    while(have_posts()) : the_post(); ?>
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php endwhile;  ?>
</div>
<?php get_footer(); ?>