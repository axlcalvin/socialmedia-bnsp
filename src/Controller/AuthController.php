<?php
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Auth Controller
 *
 *
 * @method \App\Model\Entity\Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])

 */
//Controller yang digunakan untuk authentikasi login pada website
class AuthController extends AppController
{

    //Session key yang diakses dari controller auth adalah model Users.
    public $sessionKey = 'Auth.Users';
    /**
     * @throws \Exception
     */

    //Digunakan untuk inisialisasi awal yang akan dijalankan pada saat auth controller diakses
    public function initialize()
    {
        parent::initialize();

        //Digunakan untuk load komponen auth untuk authentikasi login pada website
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'index'
            ],
            'loginRedirect' => [
                'controller' => 'Home',
                'action' => 'index'
            ],
            'authError' => __( 'Did you really think you are allowed to see that?'),
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth',
                    'userModel' => 'Users',
                    'fields' => ['username' => 'email']
                ]
            ],
            'unauthorizedRedirect' => false,
            'storage' => [
                'className' => 'Session',
                'key' => $this->sessionKey
            ],
        ]);
    }

}
