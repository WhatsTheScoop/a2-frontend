<?php
/**
 * @author: Jason Cheung
 * Date: Dec 3, 2016
 */
class Admin extends Application {

    function __construct(){
        parent::__construct();
        $this->isAdmin();
    }
    public function index() {
        $this->data['header'] = 'header';
        $this->data['pagebody'] = 'admin/index';
        $this->data['header'] = 'header';
        
        //amount spent on all inventory to date
        $this->data['inventorycost'] = "$".number_format(1000.00,2);
        //net amount received from sales
        $this->data['salesamount'] = "$".number_format(110.50,2);
        //cost of ingredients consumed to date
        $this->data['costofingredientsused'] = "$".number_format(210.21,2);
        
        $this->data['pagebody'] = 'admin/index';
        $this->render();
    }

    public function dashboard() {
        $this->data['pagetitle'] = 'Dashboard';
        $this->data['pagebody'] = 'admin/dashboard';
        
        $transactions = array();
        
        foreach ($this->Transaction->all() as $t){
            array_push($transactions, Transactions::createViewModel($t));
        }

        $this->data['transactions'] = $transactions;
        $this->data['backUrl'] = base_url();
        
        $this->render();  
    }

    public function transactions() {
        $this->data['pagebody'] = 'admin/transactions';
        $this->render();    
    }


/*
    public function transaction($id) {
        $this->data['pagebody'] = 'admin/transaction';
        $this->render();    
    }
*/
}

