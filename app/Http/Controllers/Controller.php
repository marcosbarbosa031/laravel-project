<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage () {
        $variavel = "Homepage do sistema de gestão de grupos de investimento";
        return view('welcome', [
            'title' => $variavel
        ]);
    }

    public function cadastrar () {
        echo "TODO: tela Cadastro";
    }

    /**
    * Methods to user login VIEW
    * =========================================================================
    */

    public function login () {
        return view('user.login');
    }

}
