<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( '/template-parts/common/hero' ); ?>

<div class="posts text-center">
	<!-- Display current tag title -->
	<h1 class="post-tag-title">Post Under: <?php single_cat_title(); ?></h1>
	<!-- Display current tag title -->

	<?php 
    while(have_posts()) : the_post(); ?>
    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php endwhile; ?>

    <div class="container post-pagination">
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-8">
    			<?php 
    			the_posts_pagination( array(
    				'screen_reader_text' => ' ',
    				'prev_post' 		 => 'New posts',
    				'next_post' 		 => 'Old posts',
    			) );
    			?>
    		</div>
    	</div>
    </div>
    
</div>
<?php get_footer(); ?>