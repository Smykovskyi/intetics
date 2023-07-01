<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Form;
use App\View;

class Index
{
    public function action()
    {
        $view = new View();
        //$view->assign('data', Form::getAll());

        if(isset($_SESSION['id'])) {

            try{
                $view->assign('data', Form::findByID($_SESSION['id']));
            } catch (\App\DbException $error) {
                echo 'Error in Database' . $error->getMessage();
                exit;
            }

        }

        $view->display( __DIR__ . '/../../template/index.php');
    }
}