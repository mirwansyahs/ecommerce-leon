    <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <?php
            use App\Models\ChatModel;
            $db = db_connect();
            $chat = new ChatModel();
            $chatlist = $chat->getList();
            $count = $chat->where('sender_id !=', 1)->where('is_read', 0)->get()->getNumRows();
        ?>
        <ul class="navbar-nav navbar-right">
          <!-- <li class="dropdown dropdown-list-toggle">
            <?php if ($count > 0) { ?>
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep">
              <i class="far fa-envelope"></i>
            </a>
            <?php } else { ?>
                <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
                  <i class="far fa-envelope"></i>
                </a>
            <?php } ?>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Chat
                <div class="float-right">
                    <form action="markAllAsRead" method="post">
                        <button type="submit" class="bg-white text-primary" style="border: none;"><a href="">Tandai sudah dibaca semua</a></button>
                    </form>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <?php foreach ($chatlist as $cl) {?>
                <?php if ($cl['sender_id'] != '1') { ?>
                <?php if ($cl['is_read'] == '1') { ?>
                <a class="dropdown-item dropdown-item-unread">
                <?php } else { ?>
                <a href="#" class="dropdown-item" onclick="list('<?= $cl['room_number'] ?>')">
                <?php } ?>
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="<?= site_url('/img/avatar/'.$cl['image'])?>" class="rounded-circle">
                    <?php if ($cl['status'] == 'online') { ?>
                    <div class="is-online"></div>
                    <?php } ?>
                  </div>
                  <div class="dropdown-item-desc">
                    <b><?= $cl['first_name']?> <?= $cl['last_name']?></b>
                    <p><?= $cl['message']?></p>
                    <div class="time"><?= date('H:i', strtotime($cl['time'])) ?></div>
                  </div>
                </a>
                <?php } ?>
                <?php } ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?= site_url('chat')?>">Tampilkan semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php
              $id = session('id');
              $db = db_connect();
              $user = $db->table('user')->getWhere(['id' => $id])->getRow();
            ?>
            <img alt="image" src="/img/avatar/<?= $user->image; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user->username; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profil" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <a href="ubah-kata-sandi" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Ubah Kata Sandi
              </a>
              <a href="pengaturan" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('keluar')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
    <?= $this->section('javascript') ?>
    <script>
    function list(id)
    {
        $.ajax({
        url: "<?= site_url('list')?>",
        dataType: "json",
        data: { room_number : id },
        success: function(response) {
            if(response.data){
                $('#viewMessage').html(response.data).show();
                $('#viewEmpty').hide();
            }
        },
            error: function(xhr, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        } 
        });
    }
    <?= $this->endSection()?>