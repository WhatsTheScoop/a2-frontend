<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = "What's the Scoop";
		$this->data['header'] = 'header';        
                $this->data['base_url'] = base_url();        
                $this->data['controller_url'] = base_url() . get_class($this);
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
                // get the user role
		$this->data['userrole'] = $this->session->userdata('userrole');
		if ($this->data['userrole'] == NULL){
                    $this->data['userrole'] = 'guest';
                }
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
        $this->data['header'] = $this->parser->parse($this->data['header'], $this->data, true);
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->parser->parse('template', $this->data);
	}

	/**
	 * Convenience method to redirect back to index 
	 */ 
    function redirectToIndex() {
        redirect(get_class($this));
    }

}
