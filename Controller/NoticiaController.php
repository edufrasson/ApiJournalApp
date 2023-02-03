<?php

namespace App\Controller;

use App\Model\NoticiaModel;
use FFI\Exception;

class NoticiaController extends Controller
{
    public static function save()
    {
        try {
            header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');
            header('Access-Control-Allow-Credentials: True');
            header("Access-Control-Allow-Origin: *");

            $data = json_decode(file_get_contents('php://input'));
            var_dump($data);
            $model = new NoticiaModel();
            $nome_categoria = $data->category;

            $id_categoria = $model->checkCategory($nome_categoria);

            $model->id_categoria = $id_categoria->id;
            $model->titulo = $data->title;
            $model->conteudo = $data->content;

            if (isset($data->id)) {
                $model->id = $data->id;
            } else {
                $model->id = null;
            }

            $model->save();


            parent::setResponseAsJSON('Inserido!');
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public static function index()
    {

        try {
            $model = new NoticiaModel();

            $dados_noticia = $model->getAll();

            parent::setResponseAsJSON($dados_noticia);
        } catch (Exception $e) {
            parent::setResponseAsJSON('Erro: ' . $e->getMessage());
        }
    }

    public static function getById()
    {

        $model = new NoticiaModel();

        if (isset($_GET['id'])) {
            $dados_noticia = $model->getByID($_GET['id']);

            parent::setResponseAsJSON($dados_noticia);
        } else {
            parent::setResponseAsJSON('Não foi possivel encontrar a notícia');
        }
    }

    public static function delete()
    {

        $model = new NoticiaModel();

        if (isset($_GET['id'])) {
            $model->deletar($_GET['id']);
            parent::setResponseAsJSON('Notícia deletada!');
        } else
            parent::setResponseAsJSON('Não foi possivel deletar a notícia');
    }

    public static function search()
    {

        $model = new NoticiaModel();

        if (isset($_GET['query'])) {
            $dados_noticia = $model->buscar($_GET['query']);
            parent::setResponseAsJSON($dados_noticia);
        } else
            parent::setResponseAsJSON('Não foi possivel buscar a notícia');
    }
}
