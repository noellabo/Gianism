<?php

namespace Gianism;


/**
 * Create admin panel for Gianism
 *
 * @package Gianism
 * @author Takahashi Fumiki
 * @since 2.0.0
 */
class Admin extends Pattern\Singleton
{

    /**
     * Constructor
     *
     * @param array $argument
     */
    protected function __construct( array $argument = array() ){
        // Add admin page
        add_options_page($this->_('Gianism Setting'), $this->_("Gianism Setting"), 'manage_options', 'gianism', array($this, 'render'));
        //Create plugin link
        add_filter('plugin_action_links', array($this, 'plugin_page_link'), 10, 2);
        add_filter('plugin_row_meta', array($this, 'plugin_row_meta'), 10, 4);
        // Add option save hook
        add_action( 'load-settings_page_gianism', array($this, 'update_option'));
        // Register script
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    }

    /**
     * Render admin panel
     */
    public function render(){
        $this->get_template('general');
    }

    /**
     * Get admin panel URL
     *
     * @param string $view 'setup', 'customize', 'advanced'
     * @return string|void
     */
    public function setting_url($view = ''){
        $query = array(
            'page' => 'gianism',
        );
        if( $view ){
            $query['view'] = $view;
        }
        return admin_url('options-general.php?'.http_build_query($query));
    }

    /**
     * Detect current admin panel
     *
     * @param string $view
     * @return bool
     */
    protected function is_view($view = ''){
        if( 'gianism' != $this->request('page') || 'options-general.php' !== basename($_SERVER['SCRIPT_FILENAME']) ){
            return false;
        }
        $requested_view = $this->request('view');
        switch($view){
            case 'setup':
            case 'customize':
            case 'advanced':
                return $view == $requested_view;
                break;
            case 'setting':
            default:
                return (empty($requested_view) || 'setting' == $requested_view );
                break;
        }
    }

    /**
     * Load template file
     *
     * @param string $name
     */
    private function get_template($name){
        $path = $this->dir.'templates'.DIRECTORY_SEPARATOR."{$name}.php";
        if( file_exists($path) ){
            $option = Option::get_instance();
            include $path;
        }
    }

    /**
     * Register assets
     *
     * @param string $hook_suffix
     */
    public function admin_enqueue_scripts($hook_suffix){
        // Only on setting page
        if( 'settings_page_gianism' == $hook_suffix ){
            if( !is_null($this->request('view')) ){
                wp_enqueue_style('gianism-syntax-highlighter-core', $this->url.'assets/syntax-highlighter/shCore.css', null, '3.0.83');
                wp_enqueue_style('gianism-syntax-highlighter-default', $this->url.'assets/syntax-highlighter/shThemeDefault.css', null, '3.0.83');
                wp_enqueue_script('gianism-syntax-highlighter-core', $this->url.'assets/syntax-highlighter/shCore.js', null, '3.0.83');
                wp_enqueue_script('gianism-syntax-highlighter-php', $this->url.'assets/syntax-highlighter/shBrushPhp.js', null, '3.0.83');
            }
            wp_enqueue_script($this->name.'-admin-helper', $this->url.'assets/compass/js/admin-helper.js', array('jquery'), $this->version, true);
        }
        // Setting page and profile page
        if( false !== array_search($hook_suffix, array('settings_page_gianism', 'profile.php'))){
            wp_enqueue_style($this->name.'-admin-panel', $this->url.'assets/compass/stylesheets/gianism-admin.css', array('ligature-symbols'), $this->version);
        }
    }

    /**
     * Update option
     */
    public function update_option(){
        if( $this->verify_nonce('option') ){
            /** @var \Gianism\Option $option */
            $option = Option::get_instance();
            $option->update();
            wp_redirect($this->setting_url());
        }
    }

    /**
     * Setup plugin links.
     *
     * @param array $links
     * @param string $file
     * @return array
     */
    public function plugin_page_link($links, $file){
        if(false !== strpos($file, 'wp-gianism')){
            array_unshift($links, '<a href="'.$this->setting_url().'">'.__('Settings').'</a>');
        }
        return $links;
    }



    public function plugin_row_meta($plugin_meta, $plugin_file, $plugin_data, $status){
        if(false !== strpos($plugin_file, 'wp-gianism')){

        }
        return $plugin_meta;
    }

}