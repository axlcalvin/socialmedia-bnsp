<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">

            <div class="content col-lg-9">

                <div id="blog" class="single-post">

                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="comments p-t-10" id="comments">
                                <div class="comment-list">
                                    <!-- Comment -->
                                    <div class="comment" id="comment-1">
                                        <div class="image m-l-10"><img alt="" src="<?= $this->Url->build('/files/Users/image/'.$post[0]->user->image); ?>" class="avatar"></div>
                                        <div class="p-10">
                                            <h5 class="name d-inline-block m-l-10"><?= $post[0]->user->name; ?></h5>
                                            <span class="comment_date d-inline-block float-right"><?= $post[0]->created->format('d M Y H:i'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item-description">
                                    <p><?= $post[0]->description; ?></p>
                                </div>
                                <div class="post-image">
                                    <?php if(!empty($post[0]->image)) : ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post[0]->id]); ?>">
                                            <img alt="" src="<?= $this->Url->build('/files/Posts/image/'.$post[0]->image); ?>">
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="comments" id="comments">
                                    <div class="comment_number">
                                        Komentar <span>(<?= $count_comment; ?>)</span>
                                    </div>
                                    <?= $this->Flash->render(); ?>
                                    <div class="comment-list">
                                        <?php if($comments) : ?>
                                            <?php foreach($comments as $k => $value) : ?>
                                                <div class="comment" id="comment-<?= $k; ?>">
                                                    <div class="image"><img alt="" src="<?= $this->Url->build('/files/Users/image/'.$value->user->image); ?>" class="avatar"></div>
                                                    <div class="text">
                                                        <h5 class="name"><?= $value->user->name; ?></h5>
                                                        <span class="comment_date"><?= $value->created->format('d M Y H:i'); ?></span>
                                                        <div class="text_holder">
                                                            <p><?= $value->description; ?></p>
                                                        </div>
                                                        <?php if(!empty($value->image)) : ?>
                                                            <img alt="" src="<?= $this->Url->build('/files/Comments/image/'.$value->image); ?>">
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>


                                    </div>
                                </div>

                                <?php if(!empty($this->Session->read('Auth.User.username'))) : ?>
                                    <div class="respond-form" id="respond">
                                        <div class="respond-comment">
                                            <span>Komentar</span></div>
                                        <?php echo $this->Form->create($comment, ['class' => 'form-gray-fields', 'type' => 'file']); ?>
                                        <input type="hidden" name="user_id" value="<?= $this->Session->read('Auth.User.id'); ?>" readonly>
                                        <input type="hidden" name="post_id" value="<?= $post[0]->id; ?>" readonly>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control required" name="description" rows="9" placeholder="Masukkan Komentar" id="comment" aria-required="true"></textarea>
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
                                                    <div class="form-group text-center">
                                                        <button class="btn" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php echo $this->Form->end(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="sidebar sticky-sidebar col-lg-3">

                <div class="widget  widget-newsletter">
                    <form class="widget-subscribe-form" novalidate action="#" role="form" method="post">
                        <h4 class="widget-title">PENCARIAN</h4>
                        <div class="input-group">
                            <input type="text" required name="widget-subscribe-form-email" class="form-control required" placeholder="Masukan kata kunci">
                            <span class="input-group-btn">
<button type="submit" id="widget-subscribe-submit-button" class="btn"><i class="fa fa-search"></i></button>
</span> </div>
                    </form>
                </div>


                <div class="widget  widget-tags">
                    <h4 class="widget-title">HASTAG</h4>
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
