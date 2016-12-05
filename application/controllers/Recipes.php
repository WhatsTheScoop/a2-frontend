<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class Recipes extends Application {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // GET: /Recipe/
    public function index() {
        $this->data['pagetitle'] = 'Recipes';
        $this->data['pagebody'] = 'Recipes/index';
        
        $records = array();
        foreach ($this->Recipe->all() as $p)
            array_push($records, Recipe::createViewModel($p));

        $this->data['models'] = $records;
        $this->data['backUrl'] = base_url();
        
        $this->render();
    }

    // GET: /Recipe/create
    public function create() {
        $this->data['pagetitle'] = 'Create a Recipe';
        $this->data['pagebody'] = 'Recipes/create';

        // check for form submission
        if ($this->input->post()) {
            
            $record = $this->input->post();
            var_dump($record);
            die();

            // Check if model is valid 
            $this->form_validation->set_rules(Recipe::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($record);
                $this->render();
            } else {
                // ~Valid, continue checking ingredients 

                $ingredientNames = $record['ingredient_name'];
                $ingredientQuantities = $record['ingredient_quantity'];
                // Note: The array lengths will always be the same by design  

                for ($i = 0; $i < count($ingredientNames); $i++) {
                    $name = $ingredientNames[$i];
                    $quantity = $ingredientQuantities[$i];

                    if (empty($name) || empty($quantity)) {
                        $this->data['error'] = "Ingredient name and quantity must both be filled out";
                        $this->data['model'] = array($record);
                        $this->render();
                        return;
                    } 
                    
                    $ingredient = $this->Ingredient->getByKey('name', $name);

                    if ($ingredient == null) {
                        $this->data['error'] = "Ingredient " . $name . " could not be found.";
                        $this->data['model'] = array($record);
                        $this->render();
                        return; 
                    }

                    // TODO: reformat data for api 
                    array_push($record['ingredients'], [$ingredient['id'] => $quantity]);
                    unset($ingredient);
                }
                unset($record['ingredient_name']);
                unset($record['ingredient_quantity']);
                var_dump($record);
                die();
                $this->Recipe->add($record);
                $this->redirectToIndex();
            }

        // else, blank slate 
        } else {
            $this->data['model'] = array($this->Recipe->create());
            $this->render();
        }

    }
    
    // GET: /Recipe/details/1    
    public function details($id) {
        $this->data['pagetitle'] = 'Recipe Details';
        $this->data['pagebody'] = 'Recipes/details';
        
        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return;
        } else {
            $Recipe = Recipe::createViewModel($Recipe);
            $this->data['model'] = array($Recipe);
            $this->render();                
        }        
    }

    // GET: /Recipe/edit/1
    public function edit($id) {
        $this->data['pagetitle'] = 'Edit Recipe';
        $this->data['pagebody'] = 'Recipes/edit';

        // Check if record exists 
        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return; 
        } 

        // Check for form submission 
        if ($this->input->post()) {
            
            $record = $this->input->post();

            // Check if model is valid 
            $this->form_validation->set_rules(Recipe::$rules);
            if (!$this->form_validation->run()) {
                // Invalid, reload the form and display errors 
                $this->data['errors'] = validation_errors();
                $this->data['model'] = array($Recipe);
                $this->render();
            } else {
                // Valid, create and redirect back to index
                $this->Recipe->update($record);
                $this->redirectToIndex();
            }

        // Else load record data 
        } else {
            $this->data['model'] = array($Recipe);
            $this->render();        
        }   

    }

    // GET: /Recipe/delete/1
    public function delete($id) {
        $this->data['pagetitle'] = 'Delete Recipe';
        $this->data['pagebody'] = 'Recipes/delete';

        $Recipe = $this->Recipe->get($id);
        if ($Recipe == null) {
            $this->notFound($id);
            return;
        } else {
            $this->data['model'] = array($Recipe);
            $this->render();
        }      

    }

    // POST: /Recipe/delete_confirmed/1
    public function delete_confirmed($id) {
        $this->Recipe->delete($id);
        // check if ok ? 
        $this->redirectToIndex();
    }



    /* Helpers */

    private function notFound($id) {
        $this->data['pagebody'] = 'errors/html/error_404';
        $this->data['error_title'] = 'Recipe not found';
        $this->data['error_message'] = 'A Recipe with ID ' . $id . ' could not be found.';
        $this->data['error_return_url'] = base_url() . 'Recipes';
        $this->render();
    }

}
