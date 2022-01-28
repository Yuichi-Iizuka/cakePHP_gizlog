<?php

use Cake\Auth\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $dataTime = date('Y-m-d H:i:s');
        $data = [
            [
                'name' => 'テスト1',
                'email' => 'aaaaa@example.com',
                'password' => $this->_setPassword(12345),
                'created' => $dataTime,
            ],
            [
                'name' => 'テスト2',
                'email' => 'bbbb@example.com',
                'password' => $this->_setPassword(12345),
                'created' => $dataTime,
            ],
            [
                'name' => 'テスト3',
                'email' => 'cccc@example.com',
                'password' => $this->_setPassword(12345),
                'created' => $dataTime,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    private function _setPassword($pass)
    {
        $hash = new DefaultPasswordHasher();
        return $hash->hash($pass);
    }
}
