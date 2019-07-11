<?php if (is_active_sidebar('footer-a') || is_active_sidebar('footer-b') || is_active_sidebar('footer-c')) : ?>
    <div class="footer-spacer"></div>

    <div class="footer section bg-graphite">

        <div class="section-inner row">

            <?php if (is_active_sidebar('footer-a')) : ?>
            <div class="column column-1 one-half">

                <div class="widgets">

                    <?php dynamic_sidebar('footer-a'); ?>

                </div>

            </div>

            <?php endif; ?><!-- .footer-a -->

            <?php if (is_active_sidebar('footer-b')) : ?>
            <div class="column column-2 one-half">

                <div class="widgets">

                    <?php dynamic_sidebar('footer-b'); ?>

                </div><!-- .widgets -->

            </div>

            <?php endif; ?><!-- .footer-b -->

            <div class="clear"></div>

        </div><!-- .footer-inner -->

    </div><!-- .footer -->

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
