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

}