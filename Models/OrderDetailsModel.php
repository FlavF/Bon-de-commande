<?php

class OrderDetailsModel extends ModelManager {
    //la seconde le détails d'une commande en particulier sur laquelle l'internaute aura cliqué. 
    public $data;
    
    /**
    * Class constructor.
    */
    public function __construct()
    {
        parent::__construct();
        $this-> data = $_GET['data'];
    }
    
    
    // Requête tableau
    public function getList()
    {
        $req = "SELECT orderNumber, products.productName as nameProduct, priceEach, quantityOrdered, 
        round((orderdetails.priceEach * orderdetails.quantityOrdered),2) as 'Prix Total'
        FROM orderdetails
        INNER JOIN products ON products.productCode = orderdetails.productCode
        WHERE orderNumber = ? ";
        
        return $this -> queryFetchAll($req, [$this-> data]);
    }
    
    
    // Requête calcul TVA
    public function getTVA ()
    {
        $req = "SELECT ROUND(SUM(orderdetails.priceEach * orderdetails.quantityOrdered),2) AS htPrice, 
        ROUND((SUM(orderdetails.priceEach * orderdetails.quantityOrdered) * 0.2),2) AS tva, 
        ROUND((SUM(orderdetails.priceEach * orderdetails.quantityOrdered) * 1.2),2) AS ttcPrice 
        FROM orderdetails 
        WHERE orderNumber = ? 
        GROUP BY orderNumber";
        
        return $this -> queryFetch($req, [$this-> data]);
    } 
    
    
    //Requête Client
    public function getClient()
    {
        $req ="SELECT orders.orderNumber, orders.customerNumber, customerName, contactLastName, contactFirstName, addressLine1, addressLine2, city, country 
        FROM customers 
        INNER JOIN orders ON orders.customerNumber = customers.customerNumber 
        WHERE orders.orderNumber = ?";
        
        return $this -> queryFetch($req, [$this-> data]);
        
    }
    
}








