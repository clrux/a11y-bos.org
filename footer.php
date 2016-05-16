<div class="wrapper">
    <div class="sponsors">
        <?php
        if (is_active_sidebar('widget-sponsors')) {
            echo '<div class="content">';
                echo '<div class="sponsors-widget">';
                    dynamic_sidebar('widget-sponsors');
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <footer class="footer" role="contentinfo">
        <div class="content">
            <div class="copyright">
                <p>&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></p>
            </div>
            <div class="social-media">
                <h3 class="sr-only">Social Media</h3>
                <ul>
                    <li><a href="http://www.twitter.com/a11y_bos"><svg class="icon icon-twitter" title="Twitter: <?php echo get_bloginfo('name'); ?>"><use xlink:href="<?php echo get_bloginfo('template_directory') ?>/lib/images/symbol-defs.svg#icon-twitter"></use></svg></a></li>
                    <li><a href="http://www.facebook.com/a11ybos"><svg class="icon icon-facebook" title="Facebook: <?php echo get_bloginfo('name'); ?>"><use xlink:href="<?php echo get_bloginfo('template_directory') ?>/lib/images/symbol-defs.svg#icon-facebook"></use></svg></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
