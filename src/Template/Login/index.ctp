<section class="fullscreen" data-bg-parallax="<?= $this->Url->build('/front-assets/images/greybg.jpg'); ?>">
    <div class="container">
        <div>
            <div class="text-center m-b-30">
                <a href="<?= $this->Url->build(['controller' => 'Home', 'action' => 'index']); ?>" class="logo">
                    <img src="<?= $this->Url->build('/front-assets/images/bnsp.png'); ?>" width="300px" height="auto" alt="">
                </a>
            </div>
            <div class="row">
                <div class="col-lg-5 center p-50 background-white b-r-6">
                    <h3 style="text-align: center; margin-bottom: 40px;">MASUK KE DALAM AKUN ANDA</h3>
                    <?php echo $this->Form->create('Login',['url' => ['action' => 'index'], 'type' => 'file']);?>
                        <div class="form-group">
                            <label class="sr-only">Username or Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Username atau Email" required>
                        </div>
                        <div class="form-group m-b-5">
                            <label class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="text-center form-group">
                            <button type="submit" class="btn w-100 mt-4">Login</button>
                        </div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</section>
