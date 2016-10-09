<?php

/**
 * this model serves as the link between the website and the log.txt file.
 */
class SalesLog extends CI_Model{
    
        
    public $filepath = APPPATH.'/models/LogFiles/LogFile.txt';
    
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve all products 
	public function read()
	{
		
	}

	// Get a product record via id 
	public function add($log)
	{
            $this->load->helper('file');
            if ( ! write_file($this->filepath, $log."\r\n", 'a+'))
            {
                echo 'Unable to write the file';
            }
            else
            {
                //echo 'File written!';
            }
	}
}

