<?php $session = $this->sessionlogin->get_session();?>
<div class="responsive-header">
    <div class="mh-head first Sticky">
        <span class="mh-text">
            <a href="newsfeed.html" title=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Postmedia_Logo_01.2020.svg/1200px-Postmedia_Logo_01.2020.svg.png" alt="" style="max-width: 60%;"></a>
        </span>
        <span class="mh-btns-right">
            <a class="fa fa-sliders" href="#shoppingbag"></a>
        </span>
    </div>
    <div class="mh-head second">
        <form class="mh-form">
            <input placeholder="search" />
            <a href="#/" class="fa fa-search"></a>
        </form>
    </div>
</div><!-- responsive header -->

<div class="topbar stick">
    <div class="container">
        <div class="logo">
            <a title="" href="<?php echo base_url();?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Postmedia_Logo_01.2020.svg/1200px-Postmedia_Logo_01.2020.svg.png" alt=""></a>
        </div>

        <div class="top-area">
            <ul class="setting-area">
                <li>
                    <a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
                    <div class="searched">
                        <form method="post" class="form-search">
                            <input type="text" placeholder="Search Friend">
                            <button data-ripple><i class="ti-search"></i></button>
                        </form>
                    </div>
                </li>
                <li><a href="<?php echo base_url();?>" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
            </ul>
            <div class="user-img">
                <img src="<?php echo base_url();?>assets/uploads/profile/<?php echo $session['pict'];?>" style="height: 50px;" alt="">
                <span class="status f-online"></span>
                <div class="user-setting">
                    <a href="#" title=""><i class="ti-user"></i><small>View Profile</small> </a>
                    <a href="#" title=""><i class="ti-pencil-alt"></i><small>Edit Profile</small></a>
                    <a href="#" title=""><i class="ti-settings"></i><small>Change Password</small></a>
                    <a href="<?php echo base_url()?>account/logout" title=""><i class="ti-power-off"></i><small>Log Out</small></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- topbar -->