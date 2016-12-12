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
        
        $amountSpent = 0.0;
        $amountMade = 0.0;
        $amountInInventory = 0.0;
        foreach ($this->Transaction->all() as $t){
            if($t['cost'] > 0){
                $amountMade += $t['cost'];
            } else {
                $amountSpent -= $t['cost'];
            }
        }
        
        //amount spent on all inventory to date
        $this->data['inventorycost'] = "$".number_format($amountSpent,2);
        //net amount received from sales
        $this->data['salesamount'] = "$".number_format($amountMade,2);
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
            array_push($transactions, $t);
        }

        $this->data['transactions'] = $transactions;
        $this->data['backUrl'] = base_url();
        
        $this->render();  
    }

//    public function transactions() {
//        $this->data['pagebody'] = 'admin/transactions';
//        $this->render();    
//    }


/*
    public function transaction($id) {
        $this->data['pagebody'] = 'admin/transaction';
        $this->render();    
    }
*/
}

