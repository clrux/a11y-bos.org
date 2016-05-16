<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_url'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>>
    <ul class="skip-navigation">
        <li><a href="#main-content">Skip to main content</a></li>
    </ul>
    <div class="wrapper">
        <header class="header" role="banner">
            <div class="content">
                <div class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <h1><?php bloginfo('name'); ?></h1>
                    </a>
                </div>
                <div class="main-navigation">
                    <nav class="desktop" aria-label="main">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-navigation',
                            'menu_class' => 'dropdown flex',
                            'items_wrap' => a11y_add_search()
                        ));
                        ?>
                    </nav>
                    <div class="mobile" role="navigation" aria-label="main">
                        <select class="js-main-navigation" role="navigation" aria-label="main">
                            <?php
                            $menu = 'main-navigation';
                            $args = array(
                                'post_status' => 'publish',
                                'output_key' => 'menu_order'
                            );

                            if (($locations = get_nav_menu_locations()) && isset($locations[$menu])) {
                                $oMenu = wp_get_nav_menu_object($locations[$menu]);
                                $oItems = wp_get_nav_menu_items($oMenu->term_id);
                                $currentTitle = get_the_title();

                                foreach ((array) $oItems as $key => $item) {
                                    $title = $item->title;
                                    $url = $item->url;
                                    if ($currentTitle == $title) {
                                        echo '<option value="' . $url . '" selected="selected">' . $title . '</option>';
                                    } else {
                                        echo '<option value="' . $url . '">' . $title . '</option>';
                                    }
                                }

                                echo '<option value="/search">Search</option>';
                            }
                            ?>
                        </select>
                        <span class="sr-only" id="helper-js-main-navigation">
                            Navigate immediately to the selected page.
                        </span>
                    </div>
                </div>
            </div>
            <form class="header-search-form" role="search" aria-label="website" action="/">
                <div class="content">
                    <div class="flex">
                        <label for="s" class="sr-only">Search this website</label>
                        <input type="text" name="s" id="s" class="input-text">
                        <button type="submit" class="search-button">Submit</button>
                        <button type="button" class="close-search">Cancel</button>
                    </div>
                </div>
            </form>
        </header>
        <div class="header-image">
            <div class="image" style="background-image: url('<?php header_image(); ?>');"></div>
        </div>
    </div>
