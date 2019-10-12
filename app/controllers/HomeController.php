<?php

/**
 * Class HomeController
 */
class HomeController extends Controller
{

    public function index()
    {
        $this->view->setView("index");

        $this->view->addScript("text/javascript", "/main.js");
        $this->view->addLink("text/javascript", "/main.js");

        $this->view->render();
    }

}