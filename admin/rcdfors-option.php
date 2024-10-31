<?php  
/**
 * @package Right Click Disable for Secure
 * 
 * Plugin admin option 
 */

/* =============================
    Right Click Admin Menu
============================= */
add_action( 'admin_menu', 'rcdfors_admin_option' );

function rcdfors_admin_option(){
    global $recd_dir_url; //global plugin directory url
    add_menu_page( 'Right Click Disable for Secure', 'Right Click', 'manage_options', 'rcd-for-secure', 'rcdfors_admin_option_callback', $recd_dir_url . 'img/rcdfors-admin.png', 65 );
}

// Callback
function rcdfors_admin_option_callback(){ ?>

    <div class="rcdfors-option">
        <div class="container">
            <!-- Plugin Details -->
            <div class="rcdfors-details">
                <h2 class="title">
                    <?php esc_html_e('Right Click Disable Option', 'rcdfors'); ?>
                </h2>
                <div class="rcdfors-form">
                    <form action="options.php" method="POST">
                        <?php wp_nonce_field('update-options');  // wp security ?> 
                        
                        <!-- Alert text hide/show -->
                        <p><?php esc_html_e('Disable with alert text or without alert text', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not set', 'rcdfors'); ?> </small>
                        <p class="inputradio">
                            <input type="radio" name="rcdforsalertnoyes" id="rcdalertyes" value="yes" <?php if(get_option('rcdforsalertnoyes') == 'yes'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdalertyes"> <?php esc_html_e('Yes', 'rcdfors'); ?> </label>
                        </p>
                        <p class="inputradio1">
                            <input type="radio" name="rcdforsalertnoyes" id="rcdalertno" value="no" <?php if(get_option('rcdforsalertnoyes') == 'no'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdalertno"> <?php esc_html_e('No', 'rcdfors'); ?> </label>
                        </p>  
                        <p class="alerttext">
                            <label for="alerttext" style="margin-bottom: 10px;"> <?php esc_html_e('Alert Text Here', 'rcdfors'); ?> </label>
                            <input type="text" name="rcdalerttext" id="alerttext" value="<?php print esc_attr(get_option('rcdalerttext')); ?>" placeholder="Alert Text here">
                        </p>

                        <!-- ctrl + shift + J Key -->
                        <p><?php esc_html_e('Ctrl+Shift+J Key Disable', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not disable', 'rcdfors'); ?> </small>
                        <p class="keybuttons">
                            <select name="rcdfors-csjkey" id="rcdfors-csjkey">
                            <option value="false" <?php if(get_option('rcdfors-csjkey') == 'false') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('No', 'rcdfors'); ?> </option>
                            <option value="true" <?php if(get_option('rcdfors-csjkey') == 'true') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('Yes', 'rcdfors'); ?> </option>
                            </select>
                        </p>
                        <!-- F12 Key -->
                        <p><?php esc_html_e('F12 Key Disable', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not disable', 'rcdfors'); ?> </small>
                        <p class="keybuttons">
                            <input type="radio" name="rcdforsftwelvekey" id="rcdforsf12s" value="yes" <?php if(get_option('rcdforsftwelvekey') == 'yes'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdforsf12s"> <?php esc_html_e('Yes', 'rcdfors'); ?> </label>
                        </p>
                        <p class="keybuttons1">
                            <input type="radio" name="rcdforsftwelvekey" id="rcdforsf12n" value="no" <?php if(get_option('rcdforsftwelvekey') == 'no'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdforsf12n"> <?php esc_html_e('No', 'rcdfors'); ?> </label>
                        </p>  

                        <!-- ctrl + shift + C Key -->
                        <p><?php esc_html_e('Ctrl+Shift+C Key Disable', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not disable', 'rcdfors'); ?> </small>
                        <p class="keybuttons">
                            <select name="rcdfors-csckey" id="rcdfors-csckey">
                            <option value="false" <?php if(get_option('rcdfors-csckey') == 'false') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('No', 'rcdfors'); ?> </option>
                            <option value="true" <?php if(get_option('rcdfors-csckey') == 'true') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('Yes', 'rcdfors'); ?> </option>
                            </select>
                        </p>

                        <!-- Ctrl+Shift+I Key -->
                        <p><?php esc_html_e('Ctrl+Shift+I Key Disable', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not disable', 'rcdfors'); ?> </small>
                        <p class="keybuttons">
                            <input type="radio" name="rcdforskey-crtlshifti" id="rcdforscsi" value="yes" <?php if(get_option('rcdforskey-crtlshifti') == 'yes'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdforscsi"> <?php esc_html_e('Yes', 'rcdfors'); ?> </label>
                        </p>
                        <p class="keybuttons1">
                            <input type="radio" name="rcdforskey-crtlshifti" id="rcdforscsin" value="no" <?php if(get_option('rcdforskey-crtlshifti') == 'no'){echo esc_attr('checked="checked"');} ?> >
                            <label for="rcdforscsin"> <?php esc_html_e('No', 'rcdfors'); ?> </label>
                        </p>  

                        <!-- ctrl + U Key -->
                        <p><?php esc_html_e('Ctrl+U Key Disable', 'rcdfors'); ?></p>
                        <small><?php esc_html_e('Default: not disable', 'rcdfors'); ?> </small>
                        <p class="keybuttons">
                            <select name="rcdfors-cukey" id="rcdfors-cukey">
                            <option value="false" <?php if(get_option('rcdfors-cukey') == 'false') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('No', 'rcdfors'); ?> </option>
                            <option value="true" <?php if(get_option('rcdfors-cukey') == 'true') { echo esc_attr('selected="selected"'); } ?> > <?php esc_html_e('Yes', 'rcdfors'); ?> </option>
                            </select>
                        </p>
                        

                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="page_options" value="rcdforsalertnoyes, rcdalerttext, rcdforsftwelvekey, rcdforskey-crtlshifti, rcdfors-csjkey, rcdfors-csckey, rcdfors-cukey">
                        <input type="submit" value="<?php esc_html_e('Save Changes', 'rcdfors'); ?>">
                    </form>

                    <!-- Right Click Disable for Secure Dynamic Scripts -->
                    <script>
                        jQuery(document).ready(function(){
                            // alert text show/hide
                            jQuery('.rcdfors-form .alerttext').hide();
                            jQuery('.rcdfors-form p.inputradio').click(function(){
                                jQuery('.rcdfors-form .alerttext').show();
                            });
                            jQuery('.rcdfors-form p.inputradio1').click(function(){
                                jQuery('.rcdfors-form .alerttext').hide();
                            });

                            if(jQuery('.rcdfors-form p.inputradio input').attr('checked')){
                                jQuery('.rcdfors-form .alerttext').show();
                            };
                        });
                    </script>
                </div>
            </div>
            <!-- Author Details -->
            <?php global $recd_dir_url; //global plugin directory url ?>
            <div class="author-details">
                <h2 class="title">
                    <?php esc_html_e('Author', 'rcdfors'); ?>
                </h2>
                <div class="author-img">
                    <img src="<?php echo esc_url($recd_dir_url .'img/habibcoder.jpg'); ?>" alt="HabibCoder">
                </div>
                <h4 class="author-name"> HabibCoder </h4>
                <div class="author-description">
                    <p>I'm <a href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank">Habibur Rahman</a> and a Professional Web Developer and Web Designer. For the last some years, I'm working in this field with national and international clients. I have done many more projects with client satisfaction. <br>
                    This is an open-source WordPress Plugin. If you want to support me, You can <b>click on the Buy Me a Coffe Button</b>. <br> Thank You !. </p>
                </div>
                <div class="donate-btn">
                    <a href="<?php echo esc_url('https://www.buymeacoffee.com/habibcoder1'); ?>" target="_blank">
                    <h4><span>🍦</span>Buy Me A Coffee</h4>
                    </a>
                </div>
                <h3 class="rcdfors-social-title"> 
                    <?php esc_html_e('Follow Me', 'hrscrolltop'); ?>
                </h3>
                <div class="social-icons">
                    <a class="facebook" title="Facebook" href="<?php echo esc_url('http://facebook.com/habibcoder1'); ?>" target="_blank"><img src="<?php echo esc_url($recd_dir_url .'img/facebook.png'); ?>" alt="facebook"></a>
                    <a class="linkedin" title="LinkedIn" href="<?php echo esc_url('http://linkedin.com/in/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url($recd_dir_url .'img/linkedin.png'); ?>" alt="LinkedIn"></a>
                    <a class="instagram" title="Instagram" href="<?php echo esc_url('http://instagram.com/habibcoder'); ?>" target="_blank"><img src="<?php echo esc_url($recd_dir_url . 'img/instagram.png'); ?>" alt="instagram"></a>
                    <a class="website" title="Website" href="<?php echo esc_url('http://habibcoder.com'); ?>" target="_blank"><img src="<?php echo esc_url($recd_dir_url . 'img/website.png'); ?>" alt="HabibCoder"></a>
                </div>
                <div class="thank-you">
                    <span>♥</span>
                    <h5>Thank You</h5>
                    <span>♥</span>
                </div>
            </div>
        </div>
    </div>

<?php
}
