            <?php if (!is_current_url(url('/'))): ?></section><?php endif; ?>

            <!-- Footer -->
				<footer id="footer" role="contentinfo">
                    <?php if (!is_current_url(url('/'))): ?>
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
                    <?php endif; ?>
					<ul class="copyright">
						<li><?php echo get_theme_option('Footer Text'); ?></li>
						<li>Tema desenvolvido por <a href="https://github.com/upenndigitalscholarship">Penn Libraries</a></li>
            <!--
						<li><a href="https://github.com/upenndigitalscholarship/mapping-paris">Get the Code</a></li>
						-->
					</ul>
          <ul class="copyright">
            <li><img src="/themes/kardec-theme/images/logo_cdor.jpg" width="300px"/></li>
            <li><img src="/themes/kardec-theme/images/logo_nupes.png" height="120px"/></li>
            <li><img src="/themes/kardec-theme/images/logo_ufjf.jpg" height="120px"/></li>
          </ul>
					<?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
				</footer>

		</div>

		<!-- Scripts -->
		<script src="<?php echo src('jquery.dropotron.min', 'javascripts', 'js'); ?>"></script>
		<script src="<?php echo src('jquery.scrollex.min', 'javascripts', 'js'); ?>"></script>
		<script src="<?php echo src('browser.min', 'javascripts', 'js'); ?>"></script>
		<script src="<?php echo src('breakpoints.min', 'javascripts', 'js'); ?>"></script>
		<script src="<?php echo src('util', 'javascripts', 'js'); ?>"></script>
		<script src="<?php echo src('main', 'javascripts', 'js'); ?>"></script>
	</body>
</html>
