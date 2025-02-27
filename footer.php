        <footer class="contain 2xl:max-w-7xl mx-auto px-6">
            <div class="wrap pb-6 flex flex-row flex-wrap justify-between">
                <?php 
                    dynamic_sidebar( 'footer_1' ); 
                    dynamic_sidebar( 'footer_2' );
                    dynamic_sidebar( 'footer_3' );
                    dynamic_sidebar( 'footer_4' );
                    dynamic_sidebar( 'footer_5' );
                ?>
            </div>
            <div class="wrap">
                <p class="dark:text-white text-xs"><?= esc_html(date("Y") . ' ' . get_bloginfo('name')); ?></p>
            </div>
        </footer>
    </body>
</html>