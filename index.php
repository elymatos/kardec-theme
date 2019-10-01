<?php echo head(array('bodyid'=>'home')); ?>

	<!-- Banner -->
		<section id="banner" <?php echo 'style="background-image: url('.WEB_ROOT.'/files/theme_uploads/'.get_theme_option('banner_image').')"' ?>>
			<h2><?php echo option('site_title') ?></h2>
			<?php if (get_theme_option('Homepage Text')): ?>
			    <p><?php echo get_theme_option('Homepage Text'); ?></p>
			<?php endif; ?>
		</section>

	<!-- Main -->
		<section id="main" class="container">

            <!-- Neatline Exhibits -->
            <?php if (plugin_is_active('Neatline')): ?>

    			<section class="box special features">
    		        <?php set_loop_records('NeatlineExhibits', get_records('NeatlineExhibit')); ?>
    		        <?php $loop_index = 0; ?>
    		        <?php foreach (loop('NeatlineExhibits') as $e): ?>
    		            <?php if ($loop_index % 2 == 0): ?><div class="features-row"><?php endif ?>
        					<section>
        						<a href="<?php echo nl_getExhibitUrl($e, 'fullscreen') ?>"><h3><?php echo nl_getExhibitField('title') ?></h3></a>
    					        <p><?php echo snippet_by_word_count(strip_formatting(nl_getExhibitField('narrative')), 50, '...') ?></p>
    				        </section>
				        <?php if ($loop_index % 2 == 1): ?></div><?php endif ?>
				        <?php $loop_index++; ?>
				    <?php endforeach ?>
				    <?php if (count(get_records('NeatlineExhibit')) % 2 == 1): ?><section>&nbsp;</section></div><?php endif ?> <!-- have to add a blank section if number of neatline exhibits is odd to make the formatting consistent -->
				</section>

            <?php endif; ?>

            <!-- Configurable featured sections -->
			<div class="row">
                <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
                    <?php $feat_item = get_random_featured_items(1); ?>
                    <?php if (count($feat_item) > 0): ?>
        				<div class="col-6 col-12-narrower">
        					<section class="box special">
        						<span class="mp-featured-box icon major"><?php echo item_image('square_thumbnail', array('class' => 'mp-featured'), null, $feat_item[0]); ?></span>
        						<h3><?php echo link_to_item(metadata($feat_item[0], array('Dublin Core', 'Title')), null, null, $feat_item[0]); ?></h3>
        						<p><?php echo metadata($feat_item[0], array('Dublin Core', 'Description')); ?></p>
        						<ul class="actions special">
        							<li><?php echo link_to_item("Learn More", array('class' => 'button alt'), null, $feat_item[0]); ?></li>
        						</ul>
        					</section>
        				</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
                    <?php $feat_col = get_random_featured_collection(); ?>
                    <?php if ($feat_col): ?>
        				<div class="col-6 col-12-narrower">
        					<section class="box special">
                                <?php $col_item = get_record('Item', array('collection' => $feat_col)); ?>
                                <?php if ($col_item): ?>
                                    <span class="mp-featured-box icon major"><?php echo item_image('square_thumbnail', array('class' => 'mp-featured'), null, $col_item); ?></span>
                                <?php endif; ?>
        						<h3><?php echo link_to_collection(metadata($feat_col, array('Dublin Core', 'Title')), null, null, $feat_col); ?></h3>
        						<p><?php echo metadata($feat_col, array('Dublin Core', 'Description')); ?></p>
        						<ul class="actions special">
        							<li><?php echo link_to_collection("Learn More", array('class' => 'button alt'), null, $feat_col); ?></li>
        						</ul>
        					</section>
        				</div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ((get_theme_option('Display Featured Exhibit') !== '0') && plugin_is_active('ExhibitBuilder') && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
                    <?php $feat_ex = exhibit_builder_random_featured_exhibit(); ?>
                    <?php if ($feat_ex): ?>
        				<div class="col-6 col-12-narrower">
        					<section class="box special">
        						<h3><?php echo exhibit_builder_link_to_exhibit($feat_ex); ?></h3>
        						<p><?php echo strip_formatting(metadata($feat_ex, 'description', array('snippet' => 200))); ?></p>
        						<ul class="actions special">
        							<li><?php echo exhibit_builder_link_to_exhibit($feat_ex, "Learn More", array('class' => 'button alt'), null); ?></li>
        						</ul>
        					</section>
        				</div>
                    <?php endif; ?>
                <?php endif; ?>

			</div>

            <!-- Recent Items -->

            <?php
                $recentItems = get_theme_option('Homepage Recent Items');
                if ($recentItems === null || $recentItems === ''):
                    $recentItems = 4;
                else:
                    $recentItems = (int) $recentItems;
                endif;
                if ($recentItems):
            ?>
                <section class="box special features">
                    <?php set_loop_records('Item', get_recent_items($recentItems)); ?>
                    <?php $loop_index = 0; ?>
                    <?php foreach (loop('Item') as $rec_item): ?>
                        <?php if ($loop_index % 2 == 0): ?><div class="features-row"><?php endif ?>
                            <section>
                                <h3><?php echo link_to_item(metadata($rec_item, array('Dublin Core', 'Title')), null, null, $rec_item) ?></h3>
                                <p><?php echo strip_formatting(metadata($rec_item, array('Dublin Core', 'Description'), array('snippet' => 200))) ?></p>
                            </section>
                        <?php if ($loop_index % 2 == 1): ?></div><?php endif ?>
                        <?php $loop_index++; ?>
                    <?php endforeach ?>
                    <?php if ($recentItems % 2 == 1): ?><section>&nbsp;</section></div><?php endif ?> <!-- have to add a blank section if number of recent items is odd to make the formatting consistent -->
                </section>
            <?php endif; ?>

        <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

		</section>

	    <!-- Contact Us -->
<!--
		<section id="cta">

			<h2>Contact Us</h2>
            <ul class="icons">
                <?php if(get_theme_option('twitter_username')): ?>
                    <li><a href="https://twitter.com/<?php echo (get_theme_option('twitter_username')) ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <?php endif; ?>
                <?php if(get_theme_option('facebook_link')): ?>
                    <li><a href="<?php echo (get_theme_option('facebook_link')) ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <?php endif; ?>
                <?php if(get_theme_option('instagram_username')): ?>
                    <li><a href="https://www.instagram.com/<?php echo (get_theme_option('instagram_username')) ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <?php endif; ?>
                <?php if(get_theme_option('github_link')): ?>
                    <li><a href="<?php echo (get_theme_option('github_link')) ?>" class="icon fa-github"><span class="label">Github</span></a></li>
                <?php endif; ?>
            </ul>
-->
            <!-- This is only a form because I wanted to use the button styles from this template that come with the form... >_< -->
<!--
            <?php if (get_theme_option('email_us') != ''): ?>
    			<form action="mailto:<?php echo get_theme_option('email_us'); ?>" method="post" enctype="text/plain">
    				<div class="row gtr-50 gtr-uniform">
    					<div class="col-12 col-12-mobilep">
    						<input type="submit" value="Email Us" class="fit" />
    					</div>
    				</div>
    			</form>
            <?php endif; ?>

		</section>
-->
<?php echo foot(); ?>
