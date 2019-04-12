<?php 
/* Login form for Users.
 * 
 */
?>

<div class="users form">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
    <fieldset>
      <legend><?= __d("simplicity", 'Please enter your username and password') ?></legend>
      <?= $this->Form->control('username') ?>
      <?= $this->Form->control('password') ?>
    </fieldset>
  <?= $this->Form->button(__d("simplicity", 'Login')); ?>
  <?= $this->Form->end() ?>
</div>