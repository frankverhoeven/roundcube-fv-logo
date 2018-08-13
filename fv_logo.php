<?php

declare(strict_types=1);

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class fv_logo extends rcube_plugin
{
    public function init()
    {
        $this->add_hook('config_get', [$this, 'modifyConfig']);

        $skin_path = $this->local_skin_path();
        if (\is_file($this->home . "/$skin_path/fvlogo.css")) {
            $this->include_stylesheet("$skin_path/fvlogo.css");
        }
    }

    /**
     * Modify config to set logo
     *
     * @param mixed $config
     * @return mixed
     */
    public function modifyConfig($config)
    {
        if (\is_array($config)
            && isset($config['name'])
            && 'skin_logo' === $config['name']
            && 'skins/larry' === $this->local_skin_path()
        ) {
            $config['result'] = $this->url($this->local_skin_path() . '/images/logo-white.svg');
        }

        return $config;
    }
}
