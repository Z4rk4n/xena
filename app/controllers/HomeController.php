<?php

/**
 * Class HomeController
 */
class HomeController extends Controller
{

    public function index()
    {
        $this->view->setView("index");

        $this->view->render();
    }

}