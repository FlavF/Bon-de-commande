<?php

class HomeModel extends ModelManager{
    
    //la première affichera la liste des commandes passées par les clients
    
    
    public function displayList(){
        
        $req = "SELECT orderNumber, orderDate, shippedDate, orders.status 
        FROM orders 
        ORDER BY orderNumber";
        
        return $this -> queryFetchAll($req);
    }
    
    
}





