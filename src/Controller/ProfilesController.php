<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profiles Controller
 *
 * @property \Model\Table\UsersTable $Users
 * @property \Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Posts');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user_id = $this->Auth->user('id');
        $profiles = $this->Users->find()->where(['Users.id' => $user_id])->toArray();
        $posts = $this->Posts->find()
            ->contain([
                'Users'
            ])
            ->where(['Users.id' => $user_id])
            ->order(['Posts.id' => 'DESC'])
            ->toArray();
        $this->set(compact('profiles', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Users->patchEntity($profile, $this->request->getData());
            if ($this->Users->save($profile)) {
                $this->Flash->success(__('Profil berhasil diubah!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Profil gagal diubah, silahkan coba lagi!'));
        }
        $this->set(compact('profile'));
    }
}
