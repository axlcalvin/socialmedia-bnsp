<section id="page-content">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>PROFIL</h2>
            <div class="team-image">
                <img src="<?= $this->Url->build('/files/Users/image/'.$profile->image); ?>">
            </div>
            <div class="team-desc">
                <h4 style="margin-top: 10px;"><?= $profile->name; ?></h4>
                <span>@<?= $profile->username; ?></span>
                <p><?= $profile->bio; ?></p>
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
                        <?php echo $this->Form->create($profile, ['class' => 'form-validate', 'type' => 'file']); ?>
                        <?= $this->Flash->render(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email" value="<?= $profile->email; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukan password" value="<?= $profile->password; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukan Username" value="<?= $profile->username; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukan nama" value="<?= $profile->name; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" name="bio" rows="6" placeholder="Apa yang anda pikirkan?"><?= $profile->bio; ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Image">Foto Profil</label>
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
