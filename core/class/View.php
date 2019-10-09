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
        ob_start();
        require $this->viewPath . "/" . $this->viewFileName;
        $content = ob_get_clean();
        require $this->layoutPath . "/" . $this->layoutFileName;
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