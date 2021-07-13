<?php

// tell the error php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//session
session_start();

//spl_autoload_register(); //for class & models
spl_autoload_register(function ($class) 
{
    if(stristr($class, 'controller'))
    {
        require 'Controllers/'.$class.'.php';
    }
    if(stristr($class, 'model'))
    {
        require 'Models/'.$class.'.php';
    }
});


// show page
if(!isset($_GET['page']))
{
    // default page
     $controller = new HomeController();
     $controller -> display();     
}
else 
{
    switch($_GET['page'])
    {
        // ========= FRONT ===================
    
        ///page details
        case 'orderDetails':
            $controller = new OrderDetailsController();
            $controller->display();
            break;
           
            // ========= DEFAULT ===================
        default:
            //page when errors
            $controller = new HomeController();
            $controller -> display();   
           
    }
                    
}
                