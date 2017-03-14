<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i=0; $i < 20; $i++) {
            $data[] = [
                'username' => $faker->userName,
                'name'     => $faker->name,
                'email'    => $faker->email,
                'phone'    => $faker->phoneNumber,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'created'  => date('Y-m-d H:i:s'),
                'update'  => '1000-01-01 00:00:01'

            ];

        }
        $this->insert('users', $data);
    }
}
