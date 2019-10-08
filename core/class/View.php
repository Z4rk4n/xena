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
     * set layout
     *
     * @param string $layout
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
        $this->layoutFileName = $layout . ".php";
        $this->layoutPath = APP_DIR . "/views/layout";
    }

    public function setView(string $view)
    {

        global $kernel;

        $this->view = $view;
        $this->viewFileName = $view . ".php";
    }

}