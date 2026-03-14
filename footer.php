<footer>
    <div class="footer-container container">
        <div class="footer-left">
            <span class="copyright">© <?php echo esc_html(date('Y')); ?></span>
            <span class="site-name"><?php echo esc_html(get_bloginfo('name')); ?></span>
        </div>
        
        <div class="footer-center">
            <a href="https://pellanova.com" target="_blank" class="designer-link">Designed by PellaNova</a>
        </div>
        
        <div class="footer-right">
            <span class="rights">All rights reserved</span>
        </div>
    </div>
</footer>

<?php wp_footer();