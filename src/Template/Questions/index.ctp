<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('質問一覧') ?></h3>
    <div class="btn btn-default">
        <?= $this->Html->link(__('新規作成'), ['action' => 'add']) ?>
        <?= $this->Html->link(__('マイページ'), ['action' => 'mypage']) ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $question->has('user') ? h($question->user->name) : '' ?></td>
                <td><?= $question->has('tag') ? h($question->tag->title): '' ?></td>
                <td><?= h($question->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
