<section id="page-content">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>PROFIL</h2>
            <div class="team-image">
                <img src="<?= $this->Url->build('/files/Users/image/'.$profiles[0]->image); ?>">
            </div>
            <div class="team-desc">
                <h4 style="margin-top: 10px;"><?= $profiles[0]->name; ?></h4>
                <span>@<?= $profiles[0]->username; ?></span>
                <p><?= $profiles[0]->bio; ?></p>
            </div>
            <div class="text-center form-group">
                <a href="<?= $this->Url->build(['controller' => 'Profiles', 'action' => 'edit', $profiles[0]->id]); ?>" class="btn mt-4"> Edit Profil </a>
            </div>
        </div>
    </div>
    <div class="seperator"><i class="fa fa-chevron-down"></i>
    </div>
    <hr class="space">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div id="blog">
                    <?= $this->Flash->render(); ?>
                    <?php if($posts) : ?>
                        <?php foreach($posts as $k => $post) : ?>
                            <div class="post-item border">
                                <div class="post-item-wrap">
                                    <div class="comments p-t-10" id="comments">
                                        <div class="comment-list border-bottom">
                                            <!-- Comment -->
                                            <div class="comment" id="comment-1">
                                                <div class="image m-l-10"><img alt="" src="<?= $this->Url->build('/files/Users/image/'.$post->user->image); ?>" class="avatar"></div>
                                                <div class="p-10">
                                                    <h5 class="name d-inline-block m-l-10"><?= $post->user->name; ?></h5>
                                                    <span class="comment_date d-inline-block float-right"><?= $post->created->format('d M Y H:i'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item-description">
                                            <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id]); ?>">
                                                <p><?= $post->description; ?></p>
                                            </a>
                                        </div>
                                        <div class="post-image border-bottom">
                                            <?php if(!empty($post->image)) : ?>
                                                <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id]); ?>">
                                                    <img alt="" src="<?= $this->Url->build('/files/Posts/image/'.$post->image); ?>">
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="post-item-description">
                                            <span class="post-meta-comments"><a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id]); ?>" style="float: right; color: grey; margin-left: 20px;"><i class="fa fa-comments-o"></i><b>Lihat Komentar</b></a></span>
                                            <span class="post-meta-comments"><a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'edit', $post->id]); ?>" style="float: right; color: blue; margin-left: 20px;"><b>Ubah </b></a></span>
                                            <span class="post-meta-comments"><a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'delete', $post->id]); ?>" style="float: right; color: red; margin-left: 20px;"><b>Hapus</b></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>

                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>
