<?php
/**
 * Class parse input file
 */
class Common_Parser_Csv
{
    /**
     * Input file absolute path
     * 
     * @var string
     */
    private $file = '';
    
    /**
     * Error message of parser process, in the case of success empty
     * 
     * @var string
     */
    private $error = '';
    
    /**
     * Create parser object
     * 
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Parser process
     */
    public function process()
    {

    }
    
    /**
     * Delete parsed file
     */
    public function delete()
    {
        unlink($this->file);
    }
    
    /**
     * Check if during parsing no error
     * 
     * @return boolean
     */
    public function isValid()
    {
        return empty($this->error);
    }
    
    /**
     * Return error message of parser
     * 
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }


}

