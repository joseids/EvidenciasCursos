<?php 

namespace App\Controllers; 

use App\Models\Users;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

    public function getLogin(){
        return $this->renderHTML('login.twig');
    }

    public function postLogin($request){
        $postData = $request->getParsedBody();
        $responseMessage = null;
        
        $users = Users::where('email', $postData['email'])->first();
        if($users){
            if(password_verify($postData['password'], $users->password)){
                $_SESSION['userId'] = $users->id;
                return new RedirectResponse('/practicasPHP/admin');
            }else{
                $responseMessage = 'Bad credentials';
            }
        }else{
            $responseMessage = 'Bad credentials';
        }

        return $this->renderHTML('login.twig',[
            'responseMessage' => $responseMessage
        ]); 
    }
    public function getLogout(){
        unset($_SESSION['userId']);
        return new RedirectResponse('/practicasPHP/login');
    }
}
?>