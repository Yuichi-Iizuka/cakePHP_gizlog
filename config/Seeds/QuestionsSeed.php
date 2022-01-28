<?php
use Migrations\AbstractSeed;

/**
 * Questions seed.
 */
class QuestionsSeed extends AbstractSeed
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
        $data = [
            [
                'user_id' => 2,
                'tag_category_id' => 1,
                'title' => 'テスト1',
                'content' => 'thisisテストです'
            ],
            [
                'user_id' => 3,
                'tag_category_id' => 2,
                'title' => 'テスト2',
                'content' => 'thisisテスト2です'
            ],
            [
                'user_id' => 4,
                'tag_category_id' => 3,
                'title' => 'テスト3',
                'content' => 'thisisテスト3です'
            ],
            [
                'user_id' => 2,
                'tag_category_id' => 4,
                'title' => 'テスト4',
                'content' => 'thisisテスト4です'
            ],
        ];

        $table = $this->table('questions');
        $table->insert($data)->save();
    }
}
