<section id="page-content">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>PROFIL</h2>
            <div class="team-image">
                <img src="<?= $this->Url->build('/files/Users/image/'.$post->user->image); ?>">
            </div>
            <div class="team-desc">
                <h4 style="margin-top: 10px;"><?= $post->user->name; ?></h4>
                <span>@<?= $post->user->username; ?></span>
                <p><?= $post->user->bio; ?></p>
            </div>
        </div>
    </div>
    <div class="seperator"><i class="fa fa-chevron-down"></i>
    </div>
    <hr class="space">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo $this->Form->create($post, ['class' => 'form-validate', 'type' => 'file']); ?>
                        <?= $this->Flash->render(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control" name="description" rows="6" placeholder="Apa yang anda pikirkan?"><?= $post->description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Image">Image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <button type="submit" class="btn mt-3">Submit</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
