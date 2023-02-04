<?php

namespace App\Model;

use App\DAO\CategoriaDAO;


class CategoriaModel{
    public $nome;

    function save(){        
        $dao = new CategoriaDAO;
    }
    public function getById($id){
        $dao = new CategoriaDAO;
        return $dao->getById($id);
    }
}