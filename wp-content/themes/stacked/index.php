<?php get_header(); ?>
<?php /* Get author data */
	if(get_query_var('author_name')) :
	$curauth = get_userdatabylogin(get_query_var('author_name'));
	else :
	$curauth = get_userdata(get_query_var('author'));
	endif;
?>
	

			<!--BEGIN .page-bg-->
            <div class="page-bg clearfix">
            
                <!--BEGIN #primary .hfeed-->
                <div id="primary" class="hfeed">

                <?php if (have_posts()) : ?>			
	
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                <?php /* If this is a category archive */ if (is_category()) { ?>
                    <h1 class="page-title"><?php printf(__('All posts in %s', 'framework'), single_cat_title('',false)); ?></h1>
                <?php /* If this is a search */ } elseif (is_search()) { ?>
                    <h1 class="page-title"><?php _e('Search Results:', 'framework'); ?> "<?php echo $_GET['s']; ?>"</h1>
                <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    <h1 class="page-title"><?php printf(__('All posts tagged %s', 'framework'), single_tag_title('',false)); ?></h1>
                <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('F jS, Y'); ?></h1>
                 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('F, Y'); ?></h1>
                <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    <h1 class="page-title"><?php _e('Archive for', 'framework') ?> <?php the_time('Y'); ?></h1>
                <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    <h1 class="page-title"><?php _e('All posts by', 'framework') ?> <?php echo $curauth->display_name; ?></h1>
                <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    <h1 class="page-title"><?php _e('Blog Archives', 'framework') ?></h1>
                <?php } ?>
        
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!--BEGIN .hentry -->
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    	
                        <!--BEGIN .title-wrap -->
                    	<div class="title-wrap">
                    
                            <div class="author-avatar">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php echo get_avatar( get_the_author_meta('email'), '30' ); ?></a>
                            </div>
                                    
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><span><?php the_title(); ?></span></a>
                            </h2>
                            
                            <!--BEGIN .entry-meta .entry-header-->
                            <span class="entry-meta entry-header">
                            
                                <span class="author">
                                    <?php _e('Posted by', 'framework') ?> <?php the_author_posts_link(); ?>
                                </span>
                                
                                <span class="published">
                                    <?php _e('on', 'framework') ?> <?php the_time( get_option('date_format') ); ?>
                                </span>
                                
                            <!--END .entry-meta entry-header -->
                            </span>
                        
                        <!--END .title-wrap -->
                        </div>

                        <!--BEGIN .entry-content -->
                        <div class="entry-content">
                        
                        	<?php /* if the post has a WP 2.9+ Thumbnail */
							if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
							<div class="post-thumb clearfix">
								<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive-thumb'); /* post thumbnail settings configured in functions.php */ ?></a>
							</div>
							<?php } ?>
                        
                            <?php the_content(__('Read more...', 'framework')); ?>
                            
                        <!--END .entry-content -->
                        </div>
                        
                        
                        <!--BEGIN .entry-meta .entry-footer-->
                        <div class="entry-meta entry-footer clearfix">
                        
                            <span class="entry-comments">
								<?php _e('Comments: ', 'framework') ?>
                                <a href="<?php comments_link(); ?> "><?php comments_number( '0', '1', '%' ); ?> </a>
                                
                            </span>
                            
                            <?php if(has_tag()) : ?>
                            <span class="entry-tags">
								<?php the_tags(__('Tags:', 'framework').' ', ', ', ''); ?>
                            </span>
                            <?php endif; ?>
                            
                            <?php
							
							$facebook = get_option('tz_post_facebook');
							$twitter = get_option('tz_post_twitter');
							
							?>

                            <?php if($twitter == 'true') : ?> 
                            <span class="entry-twitter">
                            	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                                <a href="http://twitter.com/share" class="twitter-share-button"
                                    data-url="<?php the_permalink(); ?>"
                                    data-via="<?php bloginfo('name'); ?>"
                                    data-text="<?php the_title(); ?>"
                                    data-related="<?php bloginfo('name'); ?>"
                                    data-count="horizontal">Tweet
                                </a>
                            </span>
                            <?php endif; ?>
                            
                            <?php if($facebook == 'true') : ?> 
                            <span class="entry-facebook-like">
                            	<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink(get_The_ID())); ?>&amp;layout=button_count&amp;show_faces=false&amp;&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </span>
                            <?php endif; ?>
                            
                        <!--END .entry-meta .entry-footer-->
                        </div>
                    
                    <!--END .hentry-->  
                    </div>
    
                    <?php endwhile; ?>

    
                <?php else : ?>
                
                	<!--BEGIN #post-0-->
                    <div id="post-0" <?php post_class(); ?>>
                    
                    	<h2 class="page-title">
                    	    <?php if( is_search() ) {
                    	        printf( __('No Search Results for: &ldquo;%s&rdquo;', 'framework'), get_search_query());
                    	    } else { 
                    	        _e('Error 404 - Not Found', 'framework'); 
                    	    } ?>
                    	</h2>
                
						<?php if(is_search()) : ?>
                        
                            <!--BEGIN .entry-content-->
                            <div class="entry-content">
                                <p><?php _e('Suggestions:','framework') ?></p>
                                <ul>
                                    <li><?php _e('Make sure all words are spelled correctly.', 'framework') ?></li>
                                    <li><?php _e('Try different keywords.', 'framework') ?></li>
                                    <li><?php _e('Try more general keywords.', 'framework') ?></li>
                                </ul>
                            <!--END .entry-content-->
                            </div>
                        
                        <?php else: ?>
    
                            <!--BEGIN .entry-content-->
                            <div class="entry-content">
                                <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                            <!--END .entry-content-->
                            </div>
 
                        <?php endif; ?>
                    
                    <!--END #post-0-->
                    </div>
    
                <?php endif; ?>
                
                    <!--BEGIN .navigation .page-navigation -->
                    <div class="navigation page-navigation">
                        <div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'framework')) ?></div>
                        <div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'framework')) ?></div>
                    <!--END .navigation .page-navigation -->
                    </div>
                
                <!--END #primary .hfeed-->
                </div>
                
                <?php get_sidebar(); ?>
                
            </div>
            <!--END .page-bg-->
            
            <div class="page-bottom"></div>
            
            <?php 

			$callout = get_option('tz_callout');
			if($callout == 'true') { get_template_part('includes/callout'); }
			
			?>

<?php get_footer(); ?>