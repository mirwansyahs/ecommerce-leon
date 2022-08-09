<div class="col-12 col-sm-12 col-lg-12" id="viewMessage">
    <div class="card chat-box">
        <div class="card-header">
        <?php if ($user['status'] == 'online') { ?>
            <h4><i class="fas fa-circle text-success mr-2" data-toggle="tooltip"></i> <?= $user['first_name']; ?> <?= $user['last_name']; ?></h4>
            <div class="text-success text-small font-600-bold"></i> Online</div>
        <?php } else if ($user['status'] == 'offline') { ?>
            <h4><i class="fas fa-circle text-muted mr-2" data-toggle="tooltip"></i> <?= $user['first_name']; ?> <?= $user['last_name']; ?></h4>
            <div class="text-muted text-small font-600-bold"></i> Offline</div>
        <?php } ?>
        </div>
        <div class="card-body chat-content">
        <?php foreach($chat as $c){ ?>
            <?php if($c['sender_id'] != 1) { ?>
            <div class="chat-item chat-left">
                <img src="<?= site_url('/img/avatar/'.$c['image']) ?>" alt="avatar">
                <div class="chat-details">
                    <div class="chat-text"><?= $c['message'] ?></div>
                    <div class="chat-time"><?= date('H:i', strtotime($c['time'])) ?></div>
                </div>
            </div>
            <?php } ?>
            <?php if($c['sender_id'] == 1) { ?>
            <div class="chat-item chat-right">
                <img src="<?= site_url('/img/avatar/'. $user_admin['image']) ?>" class="rounded-circle" width="50" alt="avatar">
                <div class="chat-details">
                    <div class="chat-text"><?= $c['message'] ?></div>
                    <div class="chat-time"><?= date('H:i', strtotime($c['time'])) ?></div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
        </div>
        <div class="card-footer chat-form">
            <form action="send" method="post" class="send">
                <input type="hidden" name="room_number" id="room" value="<?= $room_number; ?>">
                <input type="hidden" name="user_id" value="<?= $sender_id; ?>">
                <input type="text" name="message" class="form-control" placeholder="Ketik pesan">
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->section('javascript')?>
<script>
// $(document).ready(function() {
//     $('.send').submit(function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: "post",
//             url: $(this).attr('action'),
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function(response) {
//                 if (response) {
//                     let room = $('#room').val();
//                     // location.reload();
//                     list(room);
//                 }
//             },
//             error: function(xhr, thrownError) {
//                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
//             }
//         });
//         return false;
//     });
// });
</script>
<?= $this->endSection() ?>