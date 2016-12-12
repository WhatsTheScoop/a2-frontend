<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class IngredientsController extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->isAdmin();
    }

    // GET: /ingredient/
    public function index() {
        $this->data['pagetitle'] = 'Ingredients';
        $this->data['pagebody'] = 'ingredients/index';
        
        $ingredients = array();
        foreach ($this->Ingredient->all() as $i)
            array_push($ingredients, Ingredients::createViewModel($i));

        $this->data['models'] = $ingredients;
        $this->data['backUrl'] = base_url();
        
        $this->render();
    }

    // GET: /ingredient/create
    public function create() {
        $this->data['pagetitle'] = 'Create a Ingredient';
        $this->data['pagebody'] = 'ingredients/create';

        // check for form submission
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Ingredients::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($record);
                $this->render();
            } else {
                // Valid, create and redirect back to index
                $this->Ingredient->add($record);
                $this->redirectToIndex();
            }

        // else, blank slate 
        } else {
            $this->data['model'] = array($this->Ingredient->create());
            $this->render();
        }

    }
    
    // GET: /ingredient/details/1    
    public function details($id) {
        $this->data['pagetitle'] = 'Ingredient Details';
        $this->data['pagebody'] = 'ingredients/details';
        
        $ingredient = $this->Ingredient->get($id);
        if ($ingredient == null) {
            $this->notFound($id);
            return;
        } else {
            $ingredient = Ingredients::createViewModel($ingredient);
            $this->data['model'] = array($ingredient);
            $this->render();                
        }        
    }

    // GET: /ingredient/edit/1
    public function edit($id) {
        $this->data['pagetitle'] = 'Edit Ingredient';
        $this->data['pagebody'] = 'ingredients/edit';

        // Check if record exists 
        $ingredient = $this->Ingredient->get($id);
        if ($ingredient == null) {
            $this->notFound($id);
            return; 
        } 

        // Check for form submission 
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Ingredients::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($ingredient);
                $this->render();
            } else {
                // Valid, create and redirect back to index
                $this->Ingredient->update($record);
                $this->redirectToIndex();
            }

        // Else load record data 
        } else {
            $this->data['model'] = array($ingredient);
            $this->render();        
        }   

    }

    // GET: /ingredient/delete/1
    public function delete($id) {
        $this->data['pagetitle'] = 'Delete Ingredient';
        $this->data['pagebody'] = 'ingredients/delete';

        $ingredient = $this->Ingredient->get($id);
        if ($ingredient == null) {
            $this->notFound($id);
            return;
        } else {
            $this->data['model'] = array($ingredient);
            $this->render();
        }      

    }

    // POST: /ingredient/delete_confirmed/1
    public function delete_confirmed($id) {
        $this->Ingredient->delete($id);
        // check if ok ? 
        $this->redirectToIndex();
    }



    /* Helpers */

    private function notFound($id) {
        $this->data['pagebody'] = 'errors/html/error_404';
        $this->data['error_title'] = 'Ingredient not found';
        $this->data['error_message'] = 'A ingredient with ID ' . $id . ' could not be found.';
        $this->data['error_return_url'] = base_url() . 'Ingredients';
        $this->render();
    }

}
