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
        $request = $this->getRequest();
        $form    = new Application_Form_Import();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                // OK
            }
        }

        $form->setAction('index');
        $this->view->form = $form;
    }

    public function resultAction()
    {
        // action body
    }


}



