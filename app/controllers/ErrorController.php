<?php

class ErrorController extends Controller
{

    /**
     * display error
     */
    public function show()
    {
        $this->view->setView("404");
        $this->view->render();
    }

}