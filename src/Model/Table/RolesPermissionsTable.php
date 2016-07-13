<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RolesPermissions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\BelongsTo $Permissions
 *
 * @method \App\Model\Entity\RolesPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\RolesPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RolesPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RolesPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermission findOrCreate($search, callable $callback = null)
 */
class RolesPermissionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('roles_permissions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Permissions', [
            'foreignKey' => 'permission_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['permission_id'], 'Permissions'));
        return $rules;
    }
}
