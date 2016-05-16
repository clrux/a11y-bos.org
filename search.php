<?php
get_header();
?>

<div class="wrapper flex">
    <main class="main-content" id="main-content" aria-label="content" tabindex="-1">
        <div class="content">
            <h1>Search Results for "<?php echo get_search_query() ?>"</h1>
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<article class="post">';
                    echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                    echo '<p class="meta">Posted on ' . get_the_date() . '</p>';
                    echo '<p>' . get_the_excerpt() . '</p>';
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
