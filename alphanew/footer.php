<div class="footer">
    <div class="container">
        <div class="row">
        	<?php if(is_active_sidebar( 'footer' )) : dynamic_sidebar( 'footer' ); endif; ?>
			
			<div class="footer-menu">
	        	<?php 
	        		wp_nav_menu( array(
	        			'theme_location'  => 'footermenu',
	        			'menu_class'      => 'list-inline text-right',
	        			'menu_id'         => 'footermenucontainer',
	        		) );
	        	?>
        	</div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>