<?php 

namespace App\Controllers; 

use App\Models\Users;
use Respect\Validation\Validator as v;

class UsersController extends BaseController{
    public function getAddUsersAction($request){
        $responseMessage = null;

        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();

            $usersValidator = v::key('email', v::stringType()->notEmpty())
                    ->key('password', v::stringType()->notEmpty()->length(8, 20)); 
            
            try{
                $usersValidator->assert($postData);
                $postData = $request->getParsedBody();
                //de aqui en adelante guarda en la base de datos.
                $users = new Users();
                $users->email = $postData['email'];
                $users->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $users->save();
                $responseMessage = 'Saved satisfactorily'; 
            }catch(\Exception $e){
                $responseMessage = $e->getMessage();
            }
        }

        return $this->renderHTML('addUsers.twig',[
            'responseMessage' => $responseMessage
        ]);
    }
}

?>