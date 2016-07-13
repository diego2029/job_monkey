<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RolesPermissions Controller
 *
 * @property \App\Model\Table\RolesPermissionsTable $RolesPermissions
 */
class RolesPermissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Permissions']
        ];
        $rolesPermissions = $this->paginate($this->RolesPermissions);

        $this->set(compact('rolesPermissions'));
        $this->set('_serialize', ['rolesPermissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Roles Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rolesPermission = $this->RolesPermissions->get($id, [
            'contain' => ['Roles', 'Permissions']
        ]);

        $this->set('rolesPermission', $rolesPermission);
        $this->set('_serialize', ['rolesPermission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rolesPermission = $this->RolesPermissions->newEntity();
        if ($this->request->is('post')) {
            $rolesPermission = $this->RolesPermissions->patchEntity($rolesPermission, $this->request->data);
            if ($this->RolesPermissions->save($rolesPermission)) {
                $this->Flash->success(__('The roles permission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roles permission could not be saved. Please, try again.'));
            }
        }
        $roles = $this->RolesPermissions->Roles->find('list', ['limit' => 200]);
        $permissions = $this->RolesPermissions->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('rolesPermission', 'roles', 'permissions'));
        $this->set('_serialize', ['rolesPermission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roles Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rolesPermission = $this->RolesPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolesPermission = $this->RolesPermissions->patchEntity($rolesPermission, $this->request->data);
            if ($this->RolesPermissions->save($rolesPermission)) {
                $this->Flash->success(__('The roles permission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roles permission could not be saved. Please, try again.'));
            }
        }
        $roles = $this->RolesPermissions->Roles->find('list', ['limit' => 200]);
        $permissions = $this->RolesPermissions->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('rolesPermission', 'roles', 'permissions'));
        $this->set('_serialize', ['rolesPermission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roles Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rolesPermission = $this->RolesPermissions->get($id);
        if ($this->RolesPermissions->delete($rolesPermission)) {
            $this->Flash->success(__('The roles permission has been deleted.'));
        } else {
            $this->Flash->error(__('The roles permission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
