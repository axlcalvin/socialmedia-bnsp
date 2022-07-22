<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Cache\Cache;
use Cake\Core\Configure;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property \Model\Table\UsersTable $Users
 */
class LoginController extends AppController
{

    //Digunakan untuk inisialisasi awal yang akan dijalankan pada saat login controller diakses
    public function initialize()
    {
        parent::initialize();
        //Digunakan untuk mengambil data pada model Users
        $this->loadModel('Users');

        //Digunakan untuk memberikan izin fungsi mana yang dapat diakses tanpa login
        $this->Auth->allow(['logout']);
    }

    //Fungsi yang dijalankan secara otomatis jika controller dijalankan tanpa memanggil fungsi yang lain
    public function index()
    {
        //Digunakan untuk mengatur bahwa tampilan pada fungsi ini menggunakan layout login
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            //Digunakan untuk mengambil data user berdasarkan useraname atau email yang diinputkan
            $findUser = $this->Users->find()
                ->select()
                ->where([ 'OR' => [
                    'username' => $this->request->getData('email'),
                    'email' => $this->request->getData('email')
                ]])
                ->first();

            if($findUser){
                $password = $this->request->getData('password');
                //Jika password yang diinputkan dan password didatabase sama, maka set session user dan redirect ke halaman yang dicantumkan pada redirect URL
                if($password == $findUser->password){
                    $this->Auth->setUser($findUser);


                    return $this->redirect($this->Auth->redirectUrl());
                }else {
                    //Jika gagal maka tampilkan notifikasi gagal
                    $this->Flash->error(__('Password tidak cocok.'));
                }
            }else{
                //Jika data tidak ditemukan maka tampilkan notifikasi error
                $this->Flash->error(__('Username atau password tidak cocok.'));
            }

        }

        //$this->set('login', $login);
    }

    //Fungsi untuk logout
    public function logout(){

        $this->Flash->success('Logout telah dilakukan.');
        return $this->redirect($this->Auth->logout());
    }
}
