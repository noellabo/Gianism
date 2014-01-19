<?php

defined('ABSPATH') or die();

/** @var \Gianism\Admin $this */
/** @var \Gianism\Option $option */
?>

<form method="post">
<?php $this->nonce_field('option'); ?>
<h3><i class="lsf lsf-facebook"></i> Facebook</h3>
<table class="form-table">
    <tbody>
        <tr>
            <th><label><?php $this->e('Connect with Facebook');?></label></th>
            <td>
                <label>
                    <input type="radio" name="fb_enabled" value="1"<?php checked($option->fb_enabled) ?> />
                    <?php $this->e('Enable');?>
                </label>
                <label>
                    <input type="radio" name="fb_enabled" value="0"<?php checked(!$option->fb_enabled) ?> />
                    <?php $this->e('Disable');?>
                </label>
                <p class="description">
                    <?php printf($this->_('You have to create %1$s App <a target="_blank" href="%2$s">here</a> to get required infomation.'), "Facebook", "https://developers.facebook.com/apps"); ?>
                    <?php printf($this->_('See detail at <a href="%1$s">%2$s</a>.'), $this->setting_url('setup'), $this->_('How to set up')); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="fb_app_id"><?php $this->e('App ID');?></label></th>
            <td>
                <input type="text" class="regular-text" name="fb_app_id" id="fb_app_id" value="<?php echo esc_attr($option->fb_app_id) ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="fb_app_secret"><?php $this->e('App Secret');?></label></th>
            <td>
                <input type="text" class="regular-text" name="fb_app_secret" id="fb_app_secret" value="<?php echo esc_attr($option->fb_app_secret) ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="fb_fan_gate"><?php $this->e('Facebook Fan Gate');?></label></th>
            <td>
                <select name="fb_fan_gate" id="fb_fan_gate">
                    <option value="0"<?php selected(!$option->fb_fan_gate)?>><?php $this->e('No Fan Gate'); ?></option>
                    <?php $query = new WP_Query('post_type=page&posts_per_page=0'); if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
                        <option value="<?php the_ID(); ?>"<?php selected(get_the_ID() == $option->fb_fan_gate) ?>><?php the_title(); ?></option>
                    <?php endwhile; endif; wp_reset_query();?>
                </select>
                <p class="description">
                    <?php printf($this->_('If you have fan page and use WordPress page as it, specify it here. Some functions are available. For details, see <strong>%s</strong>'), sprintf('<a href="%s">%s</a>', $this->setting_url('advanced'), $this->_('Advanced Usage'))); ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<?php submit_button(); ?>



<h3><i class="lsf lsf-twitter"></i> Twitter</h3>
<table class="form-table">
    <tbody>
        <tr>
            <th><label><?php printf($this->_('Connect with %s'), 'Twitter');?></label></th>
            <td>
                <label>
                    <input type="radio" name="tw_enabled" value="1"<?php checked($option->tw_enabled) ?> />
                    <?php $this->e('Enable');?>
                </label>
                <label>
                    <input type="radio" name="tw_enabled" value="0"<?php checked(!$option->tw_enabled) ?> />
                    <?php $this->e('Disable');?>
                </label>
                <p class="description">
                    <?php printf($this->_('You have to create %1$s App <a target="_blank" href="%2$s">here</a> to get required infomation.'), "Twitter", "https://dev.twitter.com/apps"); ?>
                    <?php printf($this->_('See detail at <a href="%1$s">%2$s</a>.'), $this->setting_url('setup'), $this->_('How to set up')); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="tw_screen_name"><?php $this->e('Screen Name'); ?></label></th>
            <td><input class="regular-text" type="text" name="tw_screen_name" id="tw_screen_name" value="<?php echo esc_attr($option->tw_screen_name) ?>" /></td>
        </tr>
        <tr>
            <th><label for="tw_consumer_key"><?php $this->e('Consumer Key'); ?></label></th>
            <td><input class="regular-text" type="text" name="tw_consumer_key" id="tw_consumer_key" value="<?php echo esc_attr($option->tw_consumer_key) ?>" /></td>
        </tr>
        <tr>
            <th><label for="tw_consumer_secret"><?php $this->e('Consumer Secret'); ?></label></th>
            <td><input class="regular-text" type="text" name="tw_consumer_secret" id="tw_consumer_secret" value="<?php echo esc_attr($option->tw_consumer_secret) ?>" /></td>
        </tr>
        <tr>
            <th><label for="tw_access_token"><?php $this->e('Access Token'); ?></label></th>
            <td><input class="regular-text" type="text" name="tw_access_token" id="tw_access_token" value="<?php echo esc_attr($option->tw_access_token) ?>" /></td>
        </tr>
        <tr>
            <th><label for="tw_access_token_secret"><?php $this->e('Access token secret'); ?></label></th>
            <td><input class="regular-text" type="text" name="tw_access_token_secret" id="tw_access_token_secret" value="<?php echo esc_attr($option->tw_access_token_secret) ?>" /></td>
        </tr>
    </tbody>
</table>
<?php submit_button(); ?>



<h3><i class="lsf lsf-google"></i> Google</h3>
<table class="form-table">
    <tbody>
        <tr>
            <th><label><?php printf($this->_('Connect with %s'), 'Google');?></label></th>
            <td>
                <label>
                    <input type="radio" name="ggl_enabled" value="1"<?php checked($option->ggl_enabled) ?> />
                    <?php $this->e('Enable');?>
                </label>
                <label>
                    <input type="radio" name="ggl_enabled" value="0"<?php checked(!$option->ggl_enabled) ?> />
                    <?php $this->e('Disable');?>
                </label>
                <p class="description">
                    <?php printf($this->_('You have to create %1$s App <a target="_blank" href="%2$s">here</a> to get required infomation.'), "Google API Console", "https://code.google.com/apis/console"); ?>
                    <?php printf($this->_('See detail at <a href="%1$s">%2$s</a>.'), $this->setting_url('setup'), $this->_('How to set up')); ?>
                </p>
            </td>
        </tr>

        <tr>
            <th><label for="ggl_consumer_key"><?php $this->e('Client ID'); ?></label></th>
            <td><input class="regular-text" type="text" name="ggl_consumer_key" id="ggl_consumer_key" value="<?php echo esc_attr($option->ggl_consumer_key) ?>" /></td>
        </tr>
        <tr>
            <th><label for="ggl_consumer_secret"><?php $this->e('Client Secret'); ?></label></th>
            <td><input class="regular-text" type="text" name="ggl_consumer_secret" id="ggl_consumer_secret" value="<?php echo esc_attr($option->ggl_consumer_secret) ?>" /></td>
        </tr>
        <tr>
            <th><label for="ggl_redirect_uri"><?php $this->e('Redirect URI'); ?></label></th>
            <td>
                <p class="description">
                    <?php
                        $end_point = home_url('/google-auth/', ($this->is_ssl_required() ? 'https' : 'http'));
                        printf($this->_('Please set %1$s to %2$s on <a target="_blank" href="%4$s">%3$s</a>.'), $this->_('Redirect URI'), '<code>'.$end_point.'</code>', "Google API Console", 'https://code.google.com/apis/console');
                    ?>
                    <a class="button" href="<?php echo esc_attr($end_point) ?>" onclick="window.prompt('<?php $this->e('Please copy this URL.') ?>', this.href); return false;"><?php $this->e('Copy') ?></a>
                    <br />
                    <?php printf($this->_('<strong>Notice: </strong> Setting is changed on <code>Gianims v2.0</code>. You must set up again on Google API Console.')) ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<?php submit_button(); ?>


<h3><i class="lsf lsf-yahoo"></i> Yahoo! JAPAN</h3>
<table class="form-table">
    <tbody>
        <tr>
            <th><label><?php printf($this->_('Connect with %s'), 'Yahoo! JAPAN');?></label></th>
            <td>
                <label>
                    <input type="radio" name="yahoo_enabled" value="1"<?php checked($option->yahoo_enabled) ?> />
                    <?php $this->e('Enable');?>
                </label>
                <label>
                    <input type="radio" name="yahoo_enabled" value="0"<?php checked(!$option->yahoo_enabled) ?> />
                    <?php $this->e('Disable');?>
                </label>
                <p class="description">
                    <?php printf($this->_('You have to create %1$s App <a target="_blank" href="%2$s">here</a> to get required infomation.'), "Yahoo! JAPAN", "https://e.developer.yahoo.co.jp/dashboard/"); ?>
                    <?php printf($this->_('See detail at <a href="%1$s">%2$s</a>.'), $this->setting_url('setup'), $this->_('How to set up')); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th><label for="yahoo_application_id"><?php $this->e('Application ID'); ?></label></th>
            <td><input class="regular-text" type="text" name="yahoo_application_id" id="yahoo_application_id" value="<?php echo esc_attr($option->yahoo_application_id)?>" /></td>
        </tr>
        <tr>
            <th><label for="yahoo_consumer_secret"><?php $this->e('Client Secret'); ?></label></th>
            <td><input class="regular-text" type="text" name="yahoo_consumer_secret" id="yahoo_consumer_secret" value="<?php echo esc_attr($option->yahoo_consumer_secret)?>" /></td>
        </tr>
        <tr>
            <th><label><?php $this->e('Callback URI'); ?></label></th>
            <td>
                <p class="description">
                    <?php
                    $end_point = home_url('/yconnect/', ($this->is_ssl_required() ? 'https' : 'http'));
                    printf($this->_('Please set %1$s to %2$s on <a target="_blank" href="%4$s">%3$s</a>.'), $this->_('Callback URI'), "<code>{$end_point}</code>", $this->_("Yahoo! JAPAN Developer Network"), 'https://e.developer.yahoo.co.jp/dashboard/');
                    ?>
                    <a class="button" href="<?php echo esc_attr($end_point) ?>" onclick="window.prompt('<?php $this->e('Please copy this URL.') ?>', this.href); return false;"><?php $this->e('Copy') ?></a>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<?php submit_button(); ?>



<h3><i class="lsf lsf-mixi"></i> mixi</h3>
<table class="form-table">
    <tbody>
    <tr>
        <th><label><?php printf($this->_('Connect with %s'), 'mixi');?></label></th>
        <td>
            <label>
                <input type="radio" name="mixi_enabled" value="1"<?php checked($option->mixi_enabled) ?> />
                <?php $this->e('Enable');?>
            </label>
            <label>
                <input type="radio" name="mixi_enabled" value="0"<?php checked(!$option->mixi_enabled) ?> />
                <?php $this->e('Disable');?>
            </label>
            <p class="description">
                <?php printf($this->_('You have to create %1$s App <a target="_blank" href="%2$s">here</a> to get required infomation.'), "mixi Graph API", "http://developer.mixi.co.jp/connect/mixi_graph_api/services/"); ?>
                <?php printf($this->_('See detail at <a href="%1$s">%2$s</a>.'), $this->setting_url('setup'), $this->_('How to set up')); ?>
            </p>
        </td>
    </tr>

    <tr>
        <th><label for="mixi_consumer_key"><?php $this->e('Client ID'); ?></label></th>
        <td><input class="regular-text" type="text" name="mixi_consumer_key" id="mixi_consumer_key" value="<?php echo esc_attr($option->mixi_consumer_key) ?>" /></td>
    </tr>
    <tr>
        <th><label for="mixi_consumer_secret"><?php $this->e('Client Secret'); ?></label></th>
        <td><input class="regular-text" type="text" name="mixi_consumer_secret" id="mixi_consumer_secret" value="<?php echo esc_attr($option->mixi_consumer_secret) ?>" /></td>
    </tr>
    <tr>
        <th><label><?php $this->e('Redirect URI'); ?></label></th>
        <td>
            <p class="description">
                <?php
                $end_point = home_url('/mixi/', ($this->is_ssl_required() ? 'https' : 'http'));
                printf($this->_('Please set %1$s to %2$s on <a target="_blank" href="%4$s">%3$s</a>.'), $this->_('Redirect URI'), "<code>{$end_point}</code>", "mixi Partner Dashboard", 'http://developer.mixi.co.jp');
                ?>
                <a class="button" href="<?php echo esc_attr($end_point) ?>" onclick="window.prompt('<?php $this->e('Please copy this URL.') ?>', this.href); return false;"><?php $this->e('Copy') ?></a>
            </p>
        </td>
    </tr>
    <?php if($this->is_enabled('mixi')): ?>
        <tr>
            <th><?php $this->e('Token'); ?></th>
            <td>
                <label>
                    <input class="regular-text" type="text" readonly="readonly" name="mixi_access_token" id="mixi_access_token" value="<?php echo esc_attr($option->mixi_access_token)?>" />
                    <?php $this->e('Access Token'); ?>
                </label><br />
                <label>
                    <input class="regular-text" type="text" readonly="readonly" name="mixi_refresh_token" id="mixi_refresh_token" value="<?php echo esc_attr($option->mixi_refresh_token)  ?>" />
                    <?php $this->e('Refresh Token'); ?>
                    <?php if(false): //$this->mixi && !$this->mixi->has_valid_refresh_token()): ?>
                        <small>(<?php $this->e('Your refresh token is invalid. Please reset it from link below.'); ?>)</small>
                    <?php endif; ?>
                </label>
                <p class="description">
                    <?php $this->e('If you want to send a message via mixi to your user who has only pseudo mail(@pseudo.mixi.jp), set up auth information by login to mixi from the link below as your account by which messages will be sent . Do not forget to check &quot;Always allow&quot;. <strong>Notice: </strong>You can send message to only your friend.');  ?>
                </p>
                <a href="<?php //echo $this->mixi->get_admin_auth_link(); ?>" class="button"><?php $this->e('Auth on mixi'); ?></a>

            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<?php submit_button(); ?>

<h3><i class="lsf lsf-setting"></i> <?php $this->e('Display Setting'); ?></h3>
<table class="form-table">
    <tbody>
    <tr>
        <th><?php $this->e('Login screen'); ?></th>
        <td>
            <label>
                <input type="radio" name="show_button_on_login" value="1"<?php checked($option->show_button_on_login) ?> />
                <?php $this->e('Show all button on Login screen.'); ?>
            </label><br />
            <label>
                <input type="radio" name="show_button_on_login" value="0"<?php checked(!$option->show_button_on_login) ?> />
                <?php $this->e('Do not show login button.'); ?>
            </label>
            <p class="description">
                <?php printf($this->_('You can output login button manually. See detail at <a href="%2$s">%1$s</a>.'), $this->_('Customize'), $this->setting_url('customize')); ?>
            </p>
        </td>
    </tr>
    </tbody>
</table>


<?php submit_button(); ?>
</form>