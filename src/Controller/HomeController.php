<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Cache\Cache;


/**
 * Home Controller
 *
 * @property \Model\Table\UsersTable $Users
 * @property \Model\Table\PostsTable $Posts
 * @property \Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\HomeController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    //Fungsi yang dijalankan pada saat inisialisasi awal controller diakses dan berjalan dibelakang layar
    public function initialize()
    {
        parent::initialize();

        //Digunakan untuk load model yang akan digunakan
        $this->loadModel('Users');
        $this->loadModel('Posts');
        $this->loadModel('Comments');

        //Digunakan untuuk memberikan izin fungsi mana yang dapat diakses tanpa harus login
        $this->Auth->allow(['index']);
    }

    //Fungsi yang dijalankan secara otomatis jika controller dijalankan tanpa memanggil fungsi yang lain
    public function index()
    {

        //Untuk mengambil semua data postingan dengan susunan data diambil dari yang terakhir diinput dan dijadikan array
        $posts = $this->Posts->find()
            ->contain([
                'Users'
            ])
            ->select()
            ->order(['Posts.id' => 'DESC'])
            ->toArray();

        //Untuk menandakan bahwa variabel berfungsi sebagai inisialisasi sebelum add data ke database
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            //Untuk menandakan kondisi jika postingan baru berhasil disimpan, maka lanjut ke tahap selanjutnya
            if ($this->Posts->save($post)) {
                //Jika postingan baru berhasil disimpan maka tampilan notif flash dan redirect ke halaman fungsi index
                $this->Flash->success(__('Postingan baru berhasil ditambahkan!.'));
                return $this->redirect(['action' => 'index']);
            }else{
                //Jika postingan baru gagal disimpan maka tampilkan notif flash gagal.
                $this->Flash->error(__('Postingan baru gagal ditambahkan, silahkan coba lagi.'));
            }
        }

        //Digunakan untuk set data dari variabel yang ada di dalam fungsi kepada view
        $this->set(compact('posts','post'));
    }
}
