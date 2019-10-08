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
        $this->view = new View();
        $this->name = get_called_class();
    }

    /**
     * @param bool $format
     * @return string
     */
    public function getName($format = false)
    {
        if ($format) {
            $return = trim(str_replace("Controller",  "", $this->name));
        } else {
            $return = $this->name;
        }
        return $return;
    }

}