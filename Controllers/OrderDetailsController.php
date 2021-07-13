<?php

class OrderDetailsController {
    
    public function display(){
        //get data from home
        $data = $_GET['data'];
        
        //get list to show list
        $model = new OrderDetailsModel();
        $orders = $model -> getList();
        
        
        //get list to show TVA
        $model = new OrderDetailsModel();
        $tva = $model -> getTVA();
        
        //get list to show client
        $model = new OrderDetailsModel();
        $customer= $model -> getClient();
        
        
        
        
        include "Views/orderDetails.phtml";
        
    }
    
}