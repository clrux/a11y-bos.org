<?php
get_header();
?>

<div class="wrapper flex">
    <main class="main-content" id="main-content" aria-label="content" tabindex="-1">
        <div class="content">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<h1 class="hd hd-1">' . get_the_title() . '</h1>';
                    the_content();
                }
            } else {
                echo '<p class="empty-posts">' . _e("Sorry, there aren't any posts right now.") . '</p>';
            }
            ?>
        </div>
    </main>
    <div class="sidebar">
        <div class="top-notch"></div>
        <div class="content">
            <?php get_sidebar(); ?>
        </div>
        <div class="bottom-notch"></div>
    </div>
</div>

<?php
get_footer();
?>
