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
     * controller class name ( used for instance )
     *
     * @var string
     */
    private $controllerClassName = "";

    /**
     * controller path \.php$
     *
     * @var string
     */
    private $controllerPath = "";

    /**
     * controller file name \.php$
     *
     * @var string
     */
    private $controllerFileName = "";

    /**
     * controller class extension Example{Extension}
     *
     * @var string
     */
    private $controllerExtension = "Controller";

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
     * @void
     * V 0.0.1
     */
    public function init()
    {

        // best routing ever
        foreach ($this->config as $path => $conf) {
            if (URI == $path) { // MATCH !
                $this->controller = $conf["controller"];
                $this->method = $conf["method"];
            }
        }

        // @todo
        $this->controller = "home";
        $this->method = "index";

        // fill controller class name
        $this->controllerClassName = sprintf(
            "%s%s",
            ucfirst($this->controller),
            $this->controllerExtension
        );

        // fill controller file name
        $this->controllerFileName = sprintf("%s%s.php",
            ucfirst($this->controller),
            $this->controllerExtension
        );

        // fill controller path
        $this->controllerPath = sprintf(
            "%s/controllers/%s/%s",
            APP_DIR,
            $this->controller,
            $this->controllerFileName
        );
    }

    /**
     * instance controller && call method
     * @void
     */
    public function process()
    {
        include $this->controllerPath;

        $controller = new $this->controllerClassName();
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

    /**
     * get controller extension
     *
     * @return string
     */
    public function getControllerExtension()
    {
        return $this->controllerExtension;
    }

    /**
     * get controller path .php$
     *
     * @return string
     */
    public function getControllerPath()
    {
        return $this->controllerPath;
    }

    /**
     * get controller file name
     *
     * @return string
     */
    public function getControllerFileName()
    {
        return $this->controllerFileName;
    }

    /**
     * get controller class name
     *
     * @return string
     */
    public function getControllerClassName()
    {
        return $this->controllerClassName;
    }
}