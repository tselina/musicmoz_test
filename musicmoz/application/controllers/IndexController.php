<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        var_dump($this->_request->getParams());
        var_dump($this->_request->getUserParams());
    }


}

