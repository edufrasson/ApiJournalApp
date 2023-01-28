<?php 

namespace App\Controller;

abstract class Controller{
    protected static function render($view, $model = null)
    {
        //$arquivo_view = "View/modules/$view.php";
        $arquivo_view = VIEWS . $view . ".php";
    
        if(file_exists($arquivo_view))
            include $arquivo_view;
        else
            exit('Arquivo da View não encontrado. Arquivo: ' . $view);
    }    

     /* Retorna um valor como um objeto JSON*/
     protected static function setResponseAsJSON($data, $request_status = true)
     {
         $response = array('response_data' => $data, 'response_successful' => $request_status);
 
         header("Content-type: application/json; charset=utf-8");
         header("Cache-Control: no-cache, must-revalidate");
         header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         header("Pragma: public");
 
         exit(json_encode($response));
     }

    protected static function isAuthenticated()
    {
        if(!isset($_SESSION['usuario_logado']))
            header("location: /login");
    } 
}
