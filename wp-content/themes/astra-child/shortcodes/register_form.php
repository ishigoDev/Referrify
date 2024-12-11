<?php
//Register User Shortcode
function referrify_woocommerce_registration_form()
{
    wp_enqueue_script('wc-password-strength-meter');
    wp_enqueue_style('woocommerce-general');
    wp_enqueue_style('woocommerce-layout');
    wp_enqueue_style('woocommerce-smallscreen');

    ob_start();

?>

    <div class="register-form-container">
        <h3><?php esc_html_e('Register', 'woocommerce'); ?></h3>
        <div class="heading-underline"></div>
        <div class="u-column2 col-2">
            <div class="woocommerce">
                <form method="post" class="woocommerce-form woocommerce-form-register register shortcode-register-snippet" <?php do_action('woocommerce_register_form_tag'); ?>>

                    <?php do_action('woocommerce_register_form_start'); ?>

                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                            ?>
                        </p>

                    <?php endif; ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                            ?>
                    </p>

                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e('Required', 'woocommerce'); ?></span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
                        </p>

                    <?php else : ?>

                        <p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

                    <?php endif; ?>

                    <?php do_action('woocommerce_register_form'); ?>

                    <p class="woocommerce-form-row form-row">
                        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                        <button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
                    </p>

                    <?php do_action('woocommerce_register_form_end'); ?>

                </form>
            </div>
        </div>
        <?php
        do_action('woocommerce_after_customer_login_form');
        ?>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('referrify_register', 'referrify_woocommerce_registration_form');
