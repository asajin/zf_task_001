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
    private $_file = '';
    
    /**
     * Error message of parser process, in the case of success empty
     * 
     * @var string
     */
    private $_error = '';
    
    /**
     * Create parser object
     * 
     * @param string $file
     */
    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * Parser process
     */
    public function process()
    {
        $header = array();
        $list   = array();
        if (file_exists($this->_file)) {
            if (($handle = fopen($this->_file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if (count($data) == 3) {
                        if (empty($header)) {
                            $header = $data;
                        } else {
                            $list[$data[1]] = $data;
                        }
                    } else {
                        $this->_error = 'Not accepted format of file';
                    }
                }
                ksort($list);
                fclose($handle);
            }
        }
        
        return $list;
    }
    
    /**
     * Delete parsed file
     */
    public function delete()
    {
        unlink($this->_file);
    }
    
    /**
     * Check if during parsing no error
     * 
     * @return boolean
     */
    public function isValid()
    {
        return empty($this->_error);
    }
    
    /**
     * Return error message of parser
     * 
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }


}

