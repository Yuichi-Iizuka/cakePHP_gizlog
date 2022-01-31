<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>

<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('tag_category_id', ['options' => $tags]);
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('created_at');
            echo $this->Form->control('updated_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
