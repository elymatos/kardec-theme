<!DOCTYPE HTML>
<!--
	Based on combination of:
	Minimalist Omeka theme
	https://github.com/omeka/theme-minimalist

	and

	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="<?php echo get_html_lang(); ?>">
	<head>
		<meta charset="utf-8" />
        <?php if ( $description = option('description')): ?>
            <meta name="description" content="<?php echo $description; ?>" />
        <?php endif; ?>
    	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <?php
        if (isset($title)) {
            $titleParts[] = strip_formatting($title);
        }
        $titleParts[] = option('site_title');
        ?>
        <title><?php echo implode(' &middot; ', $titleParts); ?></title>

        <?php echo auto_discovery_link_tags(); ?>

        <!-- Plugin Stuff -->
        <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

        <!-- Stylesheets -->
        <?php
        queue_css_file(array('style'));
        queue_css_file('lightbox');
        echo head_css();
        ?>

        <!-- JavaScripts -->
        <?php
        // queue_js_file(array('jquery.dropotron.min', 'jquery.scrollex.min', 'browser.min', 'breakpoints.min', 'util', 'main'));
        queue_js_file('lightbox');
        echo head_js();
        ?>

	</head>

	<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass . 'landing')); ?>

	    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

		<div id="page-wrapper">

			<!-- Header -->
			<header id="header" class="alt">

			    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

				<h1><?php echo link_to_home_page(option('site_title')); ?></h1>

				<nav id="nav" role="navigation">
					<?php echo public_nav_main(); ?>
				    <div id="search-container" role="search">
                        <?php echo search_form(); ?>
                    </div>
				</nav>
			</header>

            <?php if (!is_current_url(url('/'))): ?><section id="main" class="container nonhome"><?php endif; ?>
                <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
