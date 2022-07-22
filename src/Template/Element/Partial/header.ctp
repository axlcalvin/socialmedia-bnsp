<header id="header" data-transparent="false" data-fullwidth="true" class="submenu-light">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="<?= $this->Url->build(['controller' => 'Home', 'action' => 'index']); ?>">
                    <span class="logo-default">BNSP</span>
                    <span class="logo-dark">BNSP</span>
                </a>
            </div>
            <!--End: Logo-->
            <!--Header Extras-->
            <div class="header-extras">
                <ul>
                    <?php if(!empty($this->Session->read('Auth.User.username'))) : ?>
                        <li>
                            <div class="p-dropdown">
                                <img src="<?= $this->Url->build('/files/Users/image/'.$this->Session->read('Auth.User.image')); ?>" width="50px" height="50px" class="img-fluid rounded-circle" alt="">
                                <ul class="p-dropdown-content">
                                    <li><a href="<?= $this->Url->build(['controller' => 'Profiles', 'action' => 'index']); ?>">Profil</a></li>
                                    <li><a href="<?= $this->Url->build(['controller' => 'Login', 'action' => 'logout']); ?>">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php else : ?>
                        <li><?= $this->Html->link('Login', ['controller' => 'Login', 'action' => 'index'], ['class' => 'btn btn-roundeded']); ?></li>
                        <?php /*
                        <li><?= !empty($this->Session->read('Auth.User.username')) ? $this->Html->link('Logout', ['controller' => 'Login', 'action' => 'logout'], ['class' => 'btn btn-roundeded']) : $this->Html->link('Login', ['controller' => 'Login', 'action' => 'index'], ['class' => 'btn btn-roundeded']); ?></li>
                        */ ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"> <span class="lines"></span> </a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <?php /*
                    <nav class="m-r-20">
                        <ul>
                            <li><a href="<?= $this->Url->build(['controller' => 'Home', 'action' => 'index']); ?>">Home</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'view', 'organizing-committee']); ?>">Committee</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'view', 'scientific']); ?>">Scientific</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'view', 'sponsorship']); ?>">Sponsorship</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'view', 'term--condition']); ?>">Term & Condition</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'Eposter', 'action' => 'index']); ?>">E-Poster</a></li>
                        </ul>
                    </nav>
                    */ ?>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
