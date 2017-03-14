<?php

namespace App\Models;

class User extends AbstractModel
{
    protected $table = 'users';

    public function add(array $data)
    {
        $data = [
            'username'  => $data['username'],
            'name'  => $data['name'],
            'email'  => $data['email'],
            'phone'  => $data['phone'],
            'password'  => password_hash($data['password'], PASSWORD_DEFAULT),

        ];

        $this->createData($data);
    }
}





 ?>
