<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \Model\Table\UsersTable $Users
 * @property \Model\Table\PostsTable $Posts
 * @property \Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public function initialize()
    {
        //Fungsi yang dijalankan pada saat inisialisasi awal controller diakses dan berjalan dibelakang layar
        parent::initialize();

        //Digunakan untuk load model yang akan digunakan
        $this->loadModel('Users');
        $this->loadModel('Posts');
        $this->loadModel('Comments');

        //Digunakan untuuk memberikan izin fungsi mana yang dapat diakses tanpa harus login
        $this->Auth->allow(['view']);
    }

    //Fungsi untuk melihat detail postingan berdasarkan ID
    public function view($id = null){

        //Untuk mengambil semua data postingan dengan susunan data diambil dari yang terakhir diinput dan dijadikan array
        $post = $this->Posts->find()
            ->contain([
                'Users',
                'Comments'
            ])
            ->where(['Posts.id' => $id])
            ->toArray();

        //Untuk mengambil semua data komentar dengan susunan data diambil dari yang terakhir diinput dan dijadikan array
        $comments = $this->Comments->find()
            ->contain([
                'Users',
                'Posts'
            ])
            ->where(['Comments.post_id' => $id])
            ->toArray();

        //Untuk menghitung total komentar untuk postingan ini
        $count_comment = $this->Comments->find()->where(['Comments.post_id' => $id])->count();

        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            //Untuk menandakan kondisi jika komentar baru berhasil disimpan, maka lanjut ke tahap selanjutnya
            if ($this->Comments->save($comment)) {
                //Jika komentar baru berhasil disimpan maka tampilan notif flash dan redirect ke halaman fungsi view
                $this->Flash->success(__('Komentar berhasil ditambahkan!.'));
                return $this->redirect(['action' => 'view', $id]);
            }else{
                //Jika komentar baru gagal disimpan maka tampilkan notif flash gagal.
                $this->Flash->error(__('Komentar gagal ditambahkan, silahkan coba lagi.'));
            }
        }

        //Digunakan untuk set data dari variabel yang ada di dalam fungsi kepada view
        $this->set(compact('post', 'comment', 'count_comment', 'comments'));
    }


    //Fungsi untuk mengubah data postingan berdasarkan ID yang dipilih
    public function edit($id = null)
    {
        //Untuk mengambil semua data postingan dengan susunan data diambil dari yang terakhir diinput dan dijadikan array
        $post = $this->Posts->get($id, [
            'contain' => [
                'Users'
            ],
        ]);
        //Fungsi untuk mengubah data postingan
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Postingan berhasil diubah!'));

                return $this->redirect(['controller' => 'profiles', 'action' => 'index']);
            }
            $this->Flash->error(__('Postingan gagal diubah, silahkan coba lagi!'));
        }

        //Digunakan untuk set data dari variabel yang ada di dalam fungsi kepada view
        $this->set(compact('post'));
    }


    //Fungsi untuk menghapus data postingan berdasarkan ID yang dipilih
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('Postingan berhasil dihapus!'));
        } else {
            $this->Flash->error(__('Postingan gagal dihapus, silahkan coba lagi!'));
        }

        return $this->redirect(['controller' => 'profiles', 'action' => 'index']);
    }
}
