<?php
use Migrations\AbstractSeed;

/**
 * Tags seed.
 */
class TagsSeed extends AbstractSeed
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
                'title' => 'front',
                'created' => $dataTime,
            ],
            [
                'title' => 'backend',
                'created' => $dataTime,
            ],
            [
                'title' => 'infra',
                'created' => $dataTime,
            ],
            [
                'title' => 'others',
                'created' => $dataTime,
            ]
        ];

        $table = $this->table('tags');
        $table->insert($data)->save();
    }
}
