<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Roles Permission'), ['action' => 'edit', $rolesPermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Roles Permission'), ['action' => 'delete', $rolesPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolesPermission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Roles Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rolesPermissions view large-9 medium-8 columns content">
    <h3><?= h($rolesPermission->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $rolesPermission->has('role') ? $this->Html->link($rolesPermission->role->name, ['controller' => 'Roles', 'action' => 'view', $rolesPermission->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Permission') ?></th>
            <td><?= $rolesPermission->has('permission') ? $this->Html->link($rolesPermission->permission->name, ['controller' => 'Permissions', 'action' => 'view', $rolesPermission->permission->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rolesPermission->id) ?></td>
        </tr>
    </table>
</div>
