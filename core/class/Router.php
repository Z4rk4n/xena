<?php

/**
 * Class Router
 * user requests handler
 *
 * Alpha version @todo move all controller references on Controller class
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
     * - fill method && controller
     * @void
     * V 0.0.1
     */
    public function init()
    {
        $match = false; // 404

        foreach ($this->config as $path => $conf) {
            if (URI == $path) { // MATCH !
                $this->controller = $conf["controller"];
                $this->method = $conf["method"];
                $match = true;
            }
        }

        if (!$match) {
            $this->controller = "ErrorController";
            $this->method = "show";
        }
    }

    /**
     * process
     */
    public function process()
    {
        include APP_DIR . "/controllers/" . $this->controller . ".php";
        $controller = new $this->controller();
        $controller->{$this->method}();
    }

    /**
     * get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * get controller
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }
}