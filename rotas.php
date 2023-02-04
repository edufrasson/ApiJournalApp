<?php

use App\Controller\NoticiaController;
use App\Controller\LoginController;
use App\Controller\CategoriaController;

$url_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Autoload.php';

switch ($url_parse) {

    case '/login':
        LoginController::index();
        break;

    case '/login/save':
        LoginController::save();
        break;

    case '/login/auth':
        LoginController::auth();
        break;

    case '/logout':
        LoginController::logout();
        break;

    case '/login/form':
        LoginController::form();
        break;


    case '/noticia':
        NoticiaController::index();
        break;


    case '/noticia/save':
        NoticiaController::save();
        break;

    case '/noticia/delete':
        NoticiaController::delete();
        break;

    case '/noticia/search':
        NoticiaController::search();
        break;

    case '/categoria/get-by-id':
        CategoriaController::getById();
        break;

    default:
        LoginController::index();
        break;
}
