<?php

namespace App\Controller;
use App\Model\CategoriaModel;

class CategoriaController extends Controller{
    public static function getById(){        
        header("Access-Control-Allow-Origin: *");  
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept'); 
        

        $model = new CategoriaModel();
        $model = $model->getById($_GET['id']);

        parent::setResponseAsJSON($model);
    }
}