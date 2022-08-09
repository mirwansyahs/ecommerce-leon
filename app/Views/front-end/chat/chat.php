<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>
<!-- Grid column -->
<div class="col-md-6 mb-4 d-flex flex-row-reverse">

    <div class="card chat-room small-chat wide" id="myForm">
        <div class="card-header white d-flex justify-content-between p-2" id="toggle" style="cursor: pointer;">
            <div class="heading d-flex justify-content-start">
                <div class="profile-photo">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="avatar rounded-circle mr-2 ml-0">
                    <span class="state"></span>
                </div>
                <div class="data">
                    <p class="name mb-0"><strong>John Smith</strong></p>
                    <p class="activity text-muted mb-0">Active now</p>
                </div>
            </div>
            <div class="icons grey-text">
                <a class="feature"><i class="fas fa-video mr-2"></i></a>
                <a class="feature"><i class="fas fa-phone mr-2"></i></a>
                <a class="feature"><i class="fas fa-cog mr-2"></i></a>
                <a id="closeButton"><i class="fas fa-times mr-2"></i></a>
            </div>
        </div>
        <div class="my-custom-scrollbar" id="message">
            <div class="card-body p-3">
                <div class="chat-message">
                    <div class="media mb-3">
                        <img class="d-flex rounded mr-2" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp" alt="Generic placeholder image">
                        <div class="media-body">
                            <p class="my-0">You're friends on Facebook</p>
                            <p class="mb-0 text-muted">Web Designer at MDBootstrap</p>
                            <p class="mb-0 text-muted">Lives in Paris</p>
                        </div>
                    </div>
                    <div class="card bg-primary rounded w-75 float-right z-depth-0 mb-1">
                        <div class="card-body p-2">
                            <p class="card-text text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit voluptatem cum eum tempore.</p>
                        </div>
                    </div>
                    <div class="card bg-primary rounded w-50 float-right z-depth-0 mb-2">
                        <div class="card-body p-2">
                            <p class="card-text text-white">Rem suscipit lorum repellendus ditiis?</p>
                        </div>
                    </div>
                    <div class="card bg-light rounded w-75 z-depth-0 mb-1 message-text">
                        <div class="card-body p-2">
                            <p class="card-text black-text">Nostrum minima cupiditate assumenda, atque cumque hic voluptatibus at corporis maxime quam harum.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="profile-photo message-photo">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="avatar rounded-circle mr-2 ml-0">
                            <span class="state"></span>
                        </div>
                        <div class="card bg-light rounded w-75 z-depth-0 mb-2">
                            <div class="card-body p-2">
                                <p class="card-text black-text">Qui animi molestiae autem nihil optio recusandae nisi sit ab quo est.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-primary rounded w-75 float-right z-depth-0 mb-1 last">
                        <div class="card-body p-2">
                            <p class="card-text text-white">Maxime nostrum ut blanditiis a quod quam, quidem deleniti?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted white pt-1 pb-2 px-3">
            <input type="text" id="exampleForm2" class="form-control" placeholder="Type a message...">
            <div>
                <a><i class="far fa-file-image mr-2"></i></a>
                <a><i class="far fa-laugh mr-2"></i></a>
                <a><i class="fas fa-gamepad mr-2"></i></a>
                <a><i class="fas fa-paperclip mr-2"></i></a>
                <a><i class="fas fa-camera mr-2"></i></a>
                <a><i class="fas fa-thumbs-up float-right"></i></a>
            </div>
        </div>
    </div>

</div>
<!-- Grid column -->
<?= $this->endSection() ?>