<?php


use Phinx\Seed\AbstractSeed;
use Phalcon\Security;

class Users extends AbstractSeed
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
        $security = new Security;
        $password = $security->hash('admin');

        $user = $this->table('users');
        $user->insert([
            'login' => 'admin',
            'password' => $password,
        ])->save();
    }
}
