<?php

/**
 * FV Logo
 *
 * Plugin to resize the logo
 *
 * @version 1.0
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class fv_logo extends rcube_plugin
{
    /**
     * Initialization method, needs to be implemented by the plugin itself
     */
    public function init()
    {
        $skin_path = $this->local_skin_path();
        if (is_file($this->home . "/$skin_path/fvlogo.css")) {
            $this->include_stylesheet("$skin_path/fvlogo.css");
        }
    }
}
