<?php

/**
 * Class Kernel
 *
 * The kernel of application
 */
class Kernel
{

    /**
     * controller
     *
     * @var string
     */
    private $ctrl = "";

    /**
     * method
     *
     * @var string
     */
    private $method = "";

    /**
     * OS running
     *
     * @var bool
     */
    private $isRunning = false;

    /**
     * Kernel constructor.
     */
    public function __construct() {}

    /**
     * Just boot it
     */
    public function boot()
    {
        if (!$this->isRunning) {
            $this->parseUri();
            $this->isRunning = true;
        }
    }

    /**
     * parse request uri and fill ctrl, method and args
     */
    private function parseUri()
    {
        $explode = explode("/", URI);
        unset($explode[0]);

        $ctrl = (isset($explode[1])) ? $explode[1] : "";
        $method = (isset($explode[2])) ? $explode[2] : "";

        if (!empty($ctrl) && preg_match("/^[a-z][A-z]*$/", $ctrl)) {
            $this->ctrl = $ctrl;
        }

        if (!empty($method) && preg_match("/^[a-z][A-Z]*$/", $method)) {
            $this->method = $method;
        }
    }

    /**
     * get controller
     *
     * @return string
     */
    public function getController()
    {
        return $this->ctrl;
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


}

