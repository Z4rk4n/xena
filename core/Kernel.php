<?php

/**
 * Class Kernel
 *
 * ABC of this project
 */
class Kernel
{
    /**
     * OS running
     *
     * @var bool
     */
    private $isRunning = false;


    /**
     * @var Router $router
     */
    private $router;

    private $config = [
        "plugins" => [],
        "routing" => []
    ];

    /**
     * Just boot it
     * init const
     */
    public function boot()
    {
        if (!$this->isRunning) {

            $this->isRunning = true;

            $this->initConstants();
            $this->loadPlugins();
            $this->loadClasses();
            $this->loadRoutingConfig();
            $this->launchRouter();
        }
    }

    /**
     * load indispensable classes
     */
    private function loadClasses()
    {
        include CORE_DIR . "/class/Router.php";
        include CORE_DIR . "/class/Controller.php";
        include CORE_DIR . "/class/View.php";
    }

    /**
     * launch router and parse client request
     */
    private function launchRouter()
    {
        $this->router = new Router($this->config["routing"]);

        $this->router->init();
        $this->router->process();
    }

    /**
     * Initialise constants
     */
    private function initConstants()
    {
        define("URI", $_SERVER["REQUEST_URI"]);
        define("BASE_DIR", $_SERVER["DOCUMENT_ROOT"]);
        define("CORE_DIR", BASE_DIR . "/core");
        define("APP_DIR", BASE_DIR . "/app");
        define("PUBLIC_DIR", BASE_DIR . "/public");
    }

    /**
     * load plugins && fill config > plugins
     */
    private function loadPlugins()
    {
        $this->config["plugins"] = include APP_DIR . "/config/plugins.conf.php";

        foreach ($this->config["plugins"] as $plugin => $enabled) {

            $pluginPath = CORE_DIR . "/plugins/" . $plugin . ".php";

            if ($enabled && file_exists($pluginPath)) {
                include $pluginPath;
            }
        }
    }

    /**
     * load routing config file && fill config > routing
     */
    private function loadRoutingConfig()
    {
        $this->config["routing"] = include APP_DIR . "/config/routing.conf.php";
    }

    /**
     * config getter
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

}

