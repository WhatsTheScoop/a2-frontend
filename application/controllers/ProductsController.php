<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class ProductsController extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->isAdmin();
    }

    // GET: /product/
    public function index() {
        $this->data['pagetitle'] = 'Products';
        $this->data['pagebody'] = 'products/index';
        
        $products = array();
        
        foreach ($this->Product->all() as $p)
            array_push($products, Products::createViewModel($p));

        $this->data['products'] = $products;
        $this->data['backUrl'] = base_url();
        
        $this->render();
    }

    // GET: /product/create
    public function create() {
        $this->data['pagetitle'] = 'Create a Product';
        $this->data['pagebody'] = 'products/create';

        // check for form submission
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Products::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($record);
                $this->render();
            } else {
                // Valid, create and redirect back to index
                $this->Product->add($record);
                $this->redirectToIndex();
            }

        // else, blank slate 
        } else {
            $this->data['model'] = array($this->Product->create());
            $this->render();
        }

    }
    
    // GET: /product/details/1    
    public function details($id) {
        $this->data['pagetitle'] = 'Product Details';
        $this->data['pagebody'] = 'products/details';
        
        $product = $this->Product->get($id);
        if ($product == null) {
            $this->notFound($id);
            return;
        } else {
            $product = Products::createViewModel($product);
            $this->data['model'] = array($product);
            $this->render();                
        }        
    }

    // GET: /product/edit/1
    public function edit($id) {
        $this->data['pagetitle'] = 'Edit Product';
        $this->data['pagebody'] = 'products/edit';

        // Check if record exists 
        $product = $this->Product->get($id);
        if ($product == null) {
            $this->notFound($id);
            return; 
        } 

        // Check for form submission 
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Products::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($product);
                $this->render();
            } else {
                // Valid, create and redirect back to index
                $this->Product->update($record);
                $this->redirectToIndex();
            }

        // Else load record data 
        } else {
            $this->data['model'] = array($product);
            $this->render();        
        }   

    }

    // GET: /product/delete/1
    public function delete($id) {
        $this->data['pagetitle'] = 'Delete Product';
        $this->data['pagebody'] = 'products/delete';

        $product = $this->Product->get($id);
        if ($product == null) {
            $this->notFound($id);
            return;
        } else {
            $this->data['model'] = array($product);
            $this->render();
        }      

    }

    // POST: /product/delete_confirmed/1
    public function delete_confirmed($id) {
        $this->Product->delete($id);
        // check if ok ? 
        $this->redirectToIndex();
    }



    /* Helpers */

    private function notFound($id) {
        $this->data['pagebody'] = 'errors/html/error_404';
        $this->data['error_title'] = 'Product not found';
        $this->data['error_message'] = 'A product with ID ' . $id . ' could not be found.';
        $this->data['error_return_url'] = base_url() . 'Products';
        $this->render();
    }

}
