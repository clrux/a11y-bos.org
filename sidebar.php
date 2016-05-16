<?php
if (is_active_sidebar('sidebar-recent-posts')) {
    echo '<div class="sidebar-widget widget-recent-posts" role="complementary">';
    echo '<div class="content">';
    dynamic_sidebar('sidebar-recent-posts');
    echo '</div>';
    echo '</div>';
}

if (is_active_sidebar('sidebar-blog-archives')) {
    echo '<div class="sidebar-widget widget-blog-archives" role="complementary">';
    echo '<div class="content">';
    dynamic_sidebar('sidebar-blog-archives');
    echo '</div>';
    echo '</div>';
}

if (is_active_sidebar('sidebar-donation')) {
    echo '<div class="sidebar-widget widget-donate" role="complementary">';
    echo '<div class="content">';
    dynamic_sidebar('sidebar-donation');
    echo '</div>';
    echo '</div>';
}

if (is_active_sidebar('sidebar-upcoming-event')) {
    echo '<div class="sidebar-widget widget-event" role="complementary">';
    echo '<div class="content">';
    dynamic_sidebar('sidebar-upcoming-event');
    echo '</div>';
    echo '</div>';
}
?>
