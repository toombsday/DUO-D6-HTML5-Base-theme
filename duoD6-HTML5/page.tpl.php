<?php
// $Id: $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<?php print $head; ?>
	<title><?php print $head_title; ?></title>

	<?php print $styles; ?>
	<?php print $scripts; ?>
	
	<link rel="shortcut icon" href="/themes/duo/favicon.ico" type="image/x-icon" />
	
</head>
<body class="<?php print $body_classes; ?>">
	
	<?php if ($primary_links): ?>
		<div class="skipper"><a href="#main-nav"><?php print t('Jump to Navigation'); ?></a></div>
	<?php endif; ?>

<div id="page-bounds">
	
	<header class="cfx" role="banner">
      
	<?php if ($logo): ?>
		<div id="logo">
			<h1 id="site-name">
				<a href="<?php print $front_page; ?>" title="<?php print $site_name ?>" rel="home" >
					<img src="<?php print $logo; ?>" alt="<?php print $site_name ?>" />
				</a>
			</h1>
		</div>
	<?php endif; ?>

		<?php if ($search_box): ?>
			<div id="search"><?php print $search_box; ?></div>
		<?php endif; ?>

		<?php if ($header): ?>
			<div id="header-region">
				<?php print $header; ?>
			</div>
		<?php endif; ?>

		<?php if ($primary_links || $navigation || $navbar): ?>
		<nav id="main-nav" role="navigation">
			<h2 class="hide">Main Navigation</h2>
			<?php print theme('links', $primary_links, array('class' => 'primary-links cfx')); ?>
			
			<?php print $navbar; ?>
			
		</nav><!-- /nav /main-nav -->
		<?php endif; ?>

	</header> <!-- /header -->

    <div id="content-bounds" class="cfx">

	<?php if (!empty($toolbar)): ?>
		<div id="toolbar">
			<?php print $toolbar; ?>
		</div><!-- /toolbar -->
	<?php endif; ?>

	<?php if (!empty($left)): ?>
		<aside id="sidebar-left">

		<?php if ($secondary_links) : ?>
			<nav id="sec-nav" role="navigation">
				<h2 class="hide">Section Navigation</h2>
				<?php print theme('links', $secondary_links, array('class' => 'secondary-links cfx')) ?>
			</nav> <!-- /nav /sec-nav -->
		<?php endif; ?>

			<?php print $left; ?>
		</aside> <!-- /sidebar-left -->
	<?php endif; ?>

	<div id="main-column" class="cfx" role="main">

		<div id="content">
		<?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>
		<?php if ($tabs): ?>
			<div class="tabs cfx"><?php print $tabs; ?></div>
		<?php endif; ?>
		<?php if ($messages): print $messages; endif; ?>
		<?php print $help; ?>

		<?php print $content; ?>

		</div> <!-- /content -->

		<?php if ($bottom): ?>
			<?php print $bottom; ?>
		<?php endif; ?>

	</div> <!-- /main-column -->

	<?php if (!empty($right)): ?>
		<aside id="sidebar-right" class="cfx">
			<?php print $right; ?>
		</aside> <!-- /sidebar-right -->
	<?php endif; ?>

	</div> <!-- /content-bounds -->

	<footer class="cfx">
		<?php print $footer_message; ?>
		<?php if ($footer): print $footer; endif; ?>
	</footer> <!-- /footer -->

	<?php print $closure; ?>

</div> <!-- /page -->

</body>
</html>
