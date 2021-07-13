<?php

class HomeController {


    public function display(){
        //get list to show
        $model = new HomeModel();
        $orders = $model -> displayList();

        include "Views/home.phtml";
    }
}