<?php

class IndexController extends Zend_Controller_Action
{

    /**
     * Init of Index controller
     */
    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * index action - show upload form and forward to result if validation ok
     */
    public function indexAction()
    {
        // action body
        $request = $this->getRequest();
        $form    = new Application_Form_Import();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $this->_forward('result');
            }
        }

        $form->setAction('index');
        $this->view->form = $form;
    }

    /**
     * result action - validate upload form request data and show email
     */
    public function resultAction()
    {
        // action body
        $request = $this->getRequest();
        $form    = new Application_Form_Import();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                try
                {
                    $form->file->receive();
                }
                catch (Zend_File_Transfer_Exception $e)
                {
                    throw new Exception('Unable to recieve : '.$e->getMessage());
                }

                Zend_Loader_Autoloader::getInstance()->registerNamespace('Common_');

                $parser = new Common_Parser_Csv($form->file->getFileName());
                list($header, $list) = $parser->process();
                if($parser->isValid()) {
                    $parser->delete();

                    $this->view->email  = $form->getValue('email');
                    $this->view->list   = $list;

                } else {
                    throw new Exception($parser->getError());
                }
            } else {
                $this->_forward('index');
            }
        } else {
            $this->_forward('index');
        }
    }


}



