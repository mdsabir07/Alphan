<?php
/*
* Template Name: About Page Template
*/
get_header(); 
?>
<body <?php body_class(); ?>>
<?php get_template_part( '/template-parts/about-page/hero-page' ); ?>
<div class="posts">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <p>
                        <strong><?php the_author(); ?></strong><br/>
                        <?php echo get_the_date(); ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <p>
                        <?php 
                        if(has_post_thumbnail()) : 
                            //$thumbnail_url = get_the_post_thumbnail_url( null, 'large' );
                            //printf('<a href="%s" data-featherlight="image">', $thumbnail_url); this line same as printf
                            //echo '<a href="'.$thumbnail_url.'" data-featherlight="image">'; 
                            // just use by jquery
                            echo '<a class="popup-img" href="#" data-featherlight="image">'; 
                            the_post_thumbnail( 'large', array('class' => 'img-fluid') ); 
                            echo '</a>';
                        endif; ?>
	                    <?php 
	                        the_content(); 

	                        next_post_link();
	                        echo "</br>";
	                        previous_post_link();
	                    ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <div class="container post-navigation">
    	<div class="row">
    		<div class="col-mg-4"></div>
    		<div class="col-mg-8">
    			<?php 
    			the_posts_pagination( array(
    				"screen_reader_text" => '',
    				"prev_text"	=> "New Posts",
    				"next_text"	=> "Next Posts"
    			) );
    			?>
    		</div>
    	</div>
    </div>
</div>
<?php get_footer(); ?>