<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class Products extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');

        $this->data['header'] = 'header';        
        $this->data['base_url'] = base_url();        
        $this->data['controller_url'] = base_url() . 'products';
    }

    // GET: /product/
    public function index() {
        $this->data['pagetitle'] = 'Products';
        $this->data['pagebody'] = 'products/index';
        
        $products = array();
        foreach ($this->Product->all() as $p)
            array_push($products, Product::createViewModel($p));

        $this->data['products'] = $products;
        $this->data['backUrl'] = base_url();
        
        $this->render();
    }

    // GET: /product/create
    public function create() {
        $this->data['pagetitle'] = 'Create a Product';
        $this->data['pagebody'] = 'products/create';
        $this->render();
    }

    // POST: /product/create_validate
    public function create_validate() {
        $record = $this->input->post();

        $this->form_validation->set_rules(Product::$rules);
        if (!$this->form_validation->run()) {
            $this->data['pagetitle'] = 'Create a Product';
            $this->data['pagebody'] = 'products/create';
            $this->data['errors'] = validation_errors();
            $this->loadDataWithRecord($record);
            $this->render();
        } else {
            $this->Product->add($record);
            redirectToIndex();
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
            $product = Product::createViewModel($product);        
            $this->loadDataWithRecord($product);
            $this->render();                
        }        
    }

    // GET: /product/edit/1
    public function edit($id) {
        $this->data['pagetitle'] = 'Edit Product';
        $this->data['pagebody'] = 'products/edit';

        $product = $this->Product->get($id);
        if ($product == null) {
            $this->notFound($id);
            return; 
        } else {
            $this->loadDataWithRecord($product);
            $this->render();        
        }   

    }

    // POST: /product/edit_validate/1
    public function edit_validate($id) {
        $record = $this->input->post();

        $this->form_validation->set_rules(Product::$rules);
        if (!$this->form_validation->run()) {
            $this->data['pagetitle'] = 'Edit Product';
            $this->data['pagebody'] = 'products/edit';
            $this->data['errors'] = validation_errors();
            $this->loadDataWithRecord($record);
            $this->render();
        } else {
            // update
            redirectToIndex();
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
            $this->loadDataWithRecord($product);
            $this->render();
        }      

    }

    // POST: /product/delete_confirmed/1
    public function delete_confirmed($id) {
        $this->Product->delete($id);
    }



    /* Helpers */

    private function loadDataWithRecord($record) {
        $this->data['id']        = $record['id'];
        $this->data['recipeId']  = $record['recipeId'];
        $this->data['price']     = $record['price'];
        $this->data['inStock']   = $record['inStock'];
        $this->data['promotion'] = array_key_exists('promotion', $record) and $record['promotion'];        
        /* Lazy 
        foreach ($record as $key => $value) {
            $this->data[$key] = $value;
        }
        */
    }

    private function notFound($id) {
        $this->data['pagebody'] = 'errors/html/error_404';
        $this->data['error_title'] = 'Product not found';
        $this->data['error_message'] = 'A product with ID ' . $id . ' could not be found.';
        $this->data['error_return_url'] = base_url() . 'Products';
        $this->render();
    }

    private function redirectToIndex() {
        redirect('Products');
    }

/*
    public function transaction($id) {
        $this->data['pagebody'] = 'admin/transaction';
        $this->render();    
    }
*/
}
