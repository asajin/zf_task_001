<?php

/**
 * Import form class
 */
class Application_Form_Import extends Zend_Form
{

    /**
     * Init method of Import form class
     */
    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true
        ));
        
        $this->addElement('file', 'file', array(
            'label'      => 'File to import:',
            'destination'=> APPLICATION_PATH .'/../data/uploads',
            'required'   => true
        ));
        
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Submit',
        ));
    }


}

