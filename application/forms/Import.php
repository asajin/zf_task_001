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

        //input text for email field
        $this->addElement(
            'text', 'email', array(
                'label'      => 'Your email address:',
                'required'   => true,
                'filters'    => array('StringTrim'),
                'validators' => array(
                    'EmailAddress',
                )
            )
        );

        //input file for upload file field
        $this->addElement(
            'file', 'file', array(
                'label'      => 'File to import:',
                'required'   => true,
                'validators' => array(
                    'Count' => array('min' => 1, 'max' => 1),
                    'Size' => array('min' => 1, 'max' => 1048576),
                    'Extension' => 'csv',
                )
            )
        );

        $this->addElement(
            'submit', 'submit', array(
                'ignore'   => true,
                'label'    => 'Submit',
            )
        );
    }


}

