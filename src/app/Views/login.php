<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
  <body>
    
      <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Login - SofDesign</h1>
                <hr>
                <?php if(session()->has('error')): ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo session()->getFlashData('error'); ?>
                  </div>              
                <?php endif; ?>
                
                <form action="<?php echo url_to('login_store'); ?>" method="post" class="form mb-3">
                  <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <lebel for="inputemail" class="form-label">Email</lebel>
                        <input type="text" name="email" class="form-control" id="inputforemail">
                        
                        <span class="text-danger text-sm">
                            <?php echo session()->getFlashdata('errors')['email'] ?? '' ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <lebel for="inputpassword" class="form-label">Password</lebel>
                        <input type="password" name="password" class="form-control" id="inputforpassword" >
                        <span class="text-danger text-sm">
                        <?php echo session()->getFlashdata('errors')['password'] ?? '' ?>
                        </span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Entrar</button>            
                </form>
            </div>
        </div>
      </div>
      <?= $this->endSection(); ?>