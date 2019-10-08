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
     * layout file name
     * @var string
     */
    private $layoutFileName = "main.php";

    /**
     * layout path
     * @var string
     */
    private $layoutPath = APP_DIR . "/views/layout";

    /**
     * set layout
     * - update $layoutName, $layoutFileName, $layoutFilePath
     *
     * @param string $layout
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
        $this->layoutFileName = $layout . ".php";
        $this->layoutPath = APP_DIR . "/views/layout";
    }

}