<?php

/**
 * Class Controller
 */
abstract class Controller
{

    /**
     * Current view
     *
     * @var View $view
     */
    protected $view;

    /**
     * name of current controller
     *
     * @var string
     */
    protected $name = "";

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->name = get_called_class();
        $this->view = new View($this->getName(true));
    }

    /**
     * return name of current controllers
     *
     * @param bool $format
     * @return string
     */
    public function getName($format = false)
    {
        if ($format) {
            $return = strtolower(str_replace("Controller",  "", $this->name));
        } else {
            $return = $this->name;
        }

        return $return;
    }

}