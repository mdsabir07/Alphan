<?php 
$alphan_layout_class = 'col-md-8';
$alphan_text_class = '';
if(!is_active_sidebar( 'sidebar-1' )) {
    $alphan_layout_class = 'col-md-10 offset-md-1';
    $alphan_text_class = 'text-center';
}
?>

<?php get_header(); ?>
<body <?php body_class(array('single-aside', 'single-post-new')); ?>>
<?php get_template_part( '/template-parts/common/hero' ); ?>
<div class="container">
    <div class="row">
            <div class="<?php echo $alphan_layout_class; ?>">

            <div class="posts">
                <?php while(have_posts()) : the_post(); ?>
                <div <?php post_class(array('aside-post', 'aside-new-post')); ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 <?php echo $alphan_text_class; ?>">
                                <h2 class="post-title"><?php the_title(); ?></h2>
                                <p>
                                    <strong><?php the_author(); ?></strong><br/>
                                    <?php echo get_the_date(); ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                </p>
                                <?php 
                                    the_content(); 
                                    
                                    wp_link_pages();

                                    next_post_link();
                                    echo "</br>";
                                    previous_post_link();
                                ?>


                            </div>

                            <div class="author-section">
                                <div class="row">
                                    <div class="col-md-2 author-img">
                                        <?php echo get_avatar( get_the_author_meta( 'id' ) ); ?>
                                    </div>
                                    <div class="col-md-10 author-meta">
                                        <h4><?php echo get_the_author_meta( 'display_name' ); ?></h4>
                                        <p><?php echo get_the_author_meta( 'description' ); ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php if(comments_open()) : ?>
                                <div class="col-md-10 offset-md-1">
                                    <?php comments_template(); ?>
                                </div>
                            <?php endif; ?>
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
                            "prev_text" => "New Posts",
                            "next_text" => "Next Posts"
                        ) );
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php if(is_active_sidebar( 'sidebar-1' )) : ?>
        <div class="col-md-4">
            <?php if(is_active_sidebar( 'sidebar-1' )) : dynamic_sidebar('sidebar-1'); endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>