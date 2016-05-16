<?php
get_header();
?>

<div class="wrapper flex">
    <main class="main-content" id="main-content" aria-label="content" tabindex="-1">
        <div class="content">
            <h1>Blog</h1>
            <?php
            $category = new WP_Query('cat=8');
            if ($category->have_posts()) {
                while ($category->have_posts()) {
                    $category->the_post();
                    echo '<article class="post">';
                    echo '<h2><a href="' . get_permalink($category->ID) . '">' . get_the_title($category->ID) . '</a></h2>';
                    echo '<p class="meta">Posted on ' . get_the_date($category->ID) . '</p>';
                    echo '<p>' . get_the_excerpt($category->ID) . '</p>';
                    echo '</article>';
                }

                // pagination
                echo '<div class="pagination previous">' . next_posts_link('Older posts') . '</div>';
                echo '<div class="pagination next">' . previous_posts_link('Newer posts') . '</div>';
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
