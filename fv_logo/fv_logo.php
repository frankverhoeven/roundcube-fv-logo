<?php

/**
 * FV Logo
 *
 * Custom FV Logo
 *
 * @version 1.1
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class fv_logo extends rcube_plugin
{
    /**
     * Initialization method, needs to be implemented by the plugin itself
     */
    public function init()
    {
        $this->add_hook('config_get', [$this, 'modifyConfig']);

        $skin_path = $this->local_skin_path();
        if (is_file($this->home . "/$skin_path/fvlogo.css")) {
            $this->include_stylesheet("$skin_path/fvlogo.css");
        }
    }

    /**
     * Modify config to set logo
     *
     * @param array $config
     * @return array
     */
    public function modifyConfig($config)
    {
        if (is_array($config) && isset($config['name']) && 'skin_logo' == $config['name'] && 'skins/larry' == $this->local_skin_path()) {
            $config['result'] = $this->url($this->local_skin_path() . '/images/logo-white.svg');
        }

        return $config;
    }
}
