<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

class DashboardControler extends Controller
{

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index () {
        return "Estamos na index dashboard";
    }

    public function auth (Request $request) {
        // dd($request->all());
        $data = [
            'email' => $request->get('username'), 
            'password' => $request->get('password')
        ];
        try{
            if (env('PASSWORD_HASH')) {
                Auth::attempt($data, false);
            }
            else {
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
                
                if (!$user) {
                    throw new Exception("O email informado é inválido.");
                }

                if ($user->password != $request->get('password')) {
                    throw new Exception("A Senha informada é inválido.");
                }

                Auth::login($user);
            }

            return redirect()->route('user.dashboard');
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
