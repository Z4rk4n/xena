<?php

/**
 * Class View
 */
class View
{
    /**
     * layout name ( main by default )
     * @var string
     */
    private $layout = "main";

    /**
     * view name
     * @var string view
     */
    private $view;

    /**
     * layout file name
     * @var string
     */
    private $layoutFileName = "main.php";


    /**
     * view file name
     * @var string
     */
    private $viewFileName;

    /**
     * layout path
     * @var string
     */
    private $layoutPath = APP_DIR . "/views/layout";

    /**
     * view path
     * @var string
     */
    private $viewPath;

    /**
     * contains view variables
     * @var array
     */
    private $params = [];

    /**
     * contains view scripts
     * @var array
     */
    private $scripts = [];

    /**
     * View constructor.
     * @param string $controller
     */
    public function __construct($controller)
    {
        $this->viewPath = APP_DIR . "/views/" . $controller;
    }

    /**
     * view rendering
     */
    public function render()
    {
        // child view rendering
        extract($this->params);
        require $this->viewPath . "/" . $this->viewFileName;

        // parent view rendering
        ob_start();

        // load view scripts
        $scripts = "";
        foreach ($this->scripts as $link => $type) {
            $scripts .= sprintf(
                "<script type='%s' src='%s'></script>\n",
                $type,
                $link
            );
        }
        $content = ob_get_clean();
        require $this->layoutPath . "/" . $this->layoutFileName;
    }

    /**
     * add param
     * @param $var
     * @param $value
     */
    public function addParam($var, $value)
    {
        $this->params[$var] = $value;
    }

    /**
     * set params
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function addScript($type, $link)
    {
        $this->scripts[$link] = $type;
    }

    /**
     * set layout
     *
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        $this->layoutFileName = $layout . ".php";
    }

    /**
     * set view
     *
     * @param string $view
     */
    public function setView($view)
    {
        $this->view = $view;
        $this->viewFileName = $view . ".php";
    }

}