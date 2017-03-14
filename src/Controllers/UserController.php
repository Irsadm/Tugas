<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\User;

class UserController extends AbstractController
{
    public function getAll(Request $request, Response $response)
    {
        $user = new User($this->db);
        $user_all = $user->getAll();

        $data['users'] = $user_all;


        return $this->view->render($response, '/user/profile.twig', ['userdata' => $data['users'], 'title' => 'User Profile']);
    }

    public function getAdd(Request $request, Response $response)
    {
        return $this->view->render($response, '/user/add.twig');
    }

    public function add(Request $request, Response $response)
    {
        $user = new User($this->db);

        $this->validation->rule('required', ['name','password', 'username', 'email', 'phone']);
        $this->validation->rule('email', 'email');
        // $this->validation->rule('numeric', 'phone');

        if ($this->validation->validate()) {
            $user->add($request->getParams());
            return $response->withRedirect($this->router->pathFor('user.add'));
        } else {
            $_SESSION['errors'] = $this->validation->errors();
            $_SESSION['old'] = $request->getParams();

            return $response->withRedirect($this->router->pathFor('user.add.post'));
        }
    }
}



 ?>
