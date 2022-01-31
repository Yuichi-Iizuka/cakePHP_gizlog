<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="questions view large-9 medium-8 columns content">
    <h1 class="brand-header">質問詳細</h1>
    <div class="main-wrap">
        <div class="panel panel-success">
            <div class="panel-heading">
                <p><?= $question->has('user') ? h($question->user->name) : '' ?>さんの質問&nbsp;
                    <?= $question->has('tag') ? h($question->tag->title) : '' ?> &nbsp;
                    <?= h($question->created_at) ?>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th class="table-column"><?= __('Title') ?></th>
                            <td class="td-text"><?= h($question->title) ?></td>
                        </tr>
                        <tr>
                            <th class="table-column"><?= __('Content') ?></th>
                            <td class="td-text"><?= $this->Text->autoParagraph(h($question->content)); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
