<?php

/**
 * Class Router
 * user requests handler
 */
class Router
{

    /**
     * routing configuration
     * @var array
     */
    private $config = [];

    /**
     * controller
     *
     * @var string
     */
    private $controller = "";

    /**
     * method
     *
     * @var string
     */
    private $method = "";

    /**
     * Router constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * initialisation
     * - parse URI
     * - parse routing config
     * - match with one controller
     * - fill method / controller to call
     * V 0.0.1
     */
    public function init()
    {
        foreach ($this->config as $path => $conf) {
            if (URI == $path) {
                $this->controller = $conf[]
            }
        }
    }

    /**
     * instance controller
     * call method
     */
    public function process()
    {
        $controllerPath = APP_DIR . "/controllers";
    }
}