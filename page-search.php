<?php
get_header();
?>

<div class="wrapper flex">
    <main class="main-content" id="main-content" aria-label="content" tabindex="-1">
        <div class="content">
            <h1 class="hd hd-1">Search this website</h1>
            <form class="search-form flex" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
                <label class="sr-only" for="search">Enter keywords to search</label>
                <input class="input-text is-flexed" type="search" id="search" name="s" placeholder="Search this website" value="<?php echo get_search_query(); ?>">
                <button class="search-button" type="submit">Search</button>
            </form>
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
