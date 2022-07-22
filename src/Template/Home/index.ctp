<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <div class="content col-lg-9">
                <?php if(!empty($this->Session->read('Auth.User.id'))) : ?>
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="comments p-t-5" id="comments">
                                <div class="comment-list border-bottom">
                                    <!-- Comment -->
                                    <div class="comment" id="comment-1">
                                        <div class="image m-l-10"><img alt="" src="<?= $this->Url->build('/files/Users/image/'.$this->Session->read('Auth.User.image')); ?>" class="avatar"></div>
                                        <div class="p-10">
                                            <h5 class="name d-inline-block m-l-10"><?= $this->Session->read('Auth.User.name'); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item-description">
                                    <?php echo $this->Form->create($post, ['class' => 'form-gray-fields', 'type' => 'file']); ?>
                                    <?= $this->Flash->render(); ?>
                                        <input type="hidden" name="user_id" value="<?= $this->Session->read('Auth.User.id'); ?>" readonly>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control required" name="description" rows="9" placeholder="Apa yang anda pikirkan?" id="comment" aria-required="true"></textarea>
                                                    <span class="text-info">Maks 250 Karakter</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group text-right">
                                                    <button class="btn" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div id="blog">
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
                                            <span class="post-meta-comments"><a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id]); ?>" style="float: right; color: blue;"><i class="fa fa-comments-o"></i><b>Lihat Komentar</b></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>

                    <?php endif; ?>

                </div>
            </div>


            <div class="sidebar sticky-sidebar col-lg-3">

                <div class="widget  widget-newsletter">
                    <form class="widget-subscribe-form" novalidate action="#" role="form" method="post">
                        <h4 class="widget-title">PENCARIAN</h4>
                        <div class="input-group">
                            <input type="text" required name="widget-subscribe-form-email" class="form-control required email" placeholder="Masukan kata kunci">
                            <span class="input-group-btn">
                                <button type="submit" id="widget-subscribe-submit-button" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="widget  widget-tags">
                    <h4 class="widget-title">Hastag</h4>
                    <div class="tags">
                        <a href="#">Design</a>
                        <a href="#">Portfolio</a>
                        <a href="#">Digital</a>
                        <a href="#">Branding</a>
                        <a href="#">HTML</a>
                        <a href="#">Clean</a>
                        <a href="#">Peace</a>
                        <a href="#">Love</a>
                        <a href="#">CSS3</a>
                        <a href="#">jQuery</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
