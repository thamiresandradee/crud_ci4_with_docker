<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">CRUD CI4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Menus"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Home</a>
                <a class="nav-link" href="<?= base_url('/books'); ?>">Livros</a>
                <?php if(session()->has('user')): ?>
                <a class="nav-link" href="<?= base_url('/login/destroy'); ?>">Sair</a>
                <?php endif; ?>
            </div>
        </div>
        <?php if(session()->has('user')): ?>
        <div class="col-4">
            <div class="card-body">
                Olá, <?php echo session()->get('user')->name; ?> seja bem vindo(a)!
            </div>
        </div>
        <?php endif; ?>
    </div>
</nav>
<br/>
<?php if($weather || $weather != NULL): ?>
<div class="container">
  <div class="row">
    <div class="col-8">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo base_url(); ?>/images/weather/<?php echo $weather['results']['img_id']; ?>.png" class="img-fluid rounded-start imagem-do-tempo">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $weather['results']['city']; ?></h5>
                        <p class="card-text"><?php echo $weather['results']['temp']; ?> ºC</p>
                        <p class="card-text"><small class="text-muted"><?php echo $weather['results']['description']; ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php endif; ?>
     