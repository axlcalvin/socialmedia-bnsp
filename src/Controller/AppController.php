<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use App\Controller\AuthController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
//Appcontroller berfungsi sebagai inti dari semua controller
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    //Digunakan untuk inisialisasi awal yang akan dijalankan pada saat app controller diakses
    public function initialize()
    {
        parent::initialize();

        //Digunakan untuk load komponen auth yang digunakan untuk login
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'email' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'index'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        //Digunakan untuk load komponen request handler pada setiap ada request
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        //Digunakan untuk load komponen flash yang digunakan untuk menampilkan notif
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
