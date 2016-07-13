<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Roles Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rolesPermissions form large-9 medium-8 columns content">
    <?= $this->Form->create($rolesPermission) ?>
    <fieldset>
        <legend><?= __('Add Roles Permission') ?></legend>
        <?php
            echo $this->Form->input('role_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->input('permission_id', ['options' => $permissions, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
