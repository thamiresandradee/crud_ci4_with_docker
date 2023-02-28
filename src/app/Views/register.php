<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register Page</title>
    <!---------style------->


     <style>
      a:link {
        text-decoration: none;
      }
      a:hover {
        color: green;
      }
    </style>

  </head>
  <body>
    
      <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Sign Up</h1>
                <hr>
                <?php
                    if(!empty(session()->getFlashData('success'))){
                        ?>
                           <div class="alert alert-success">
                               <?=
                                  session()->getFlashData('success')
                                ?>
                           </div>

                        <?php
                    }else if(!empty(session()->getFlashData('fail'))){
                        ?>
                           <div class="alert alert-danger">
                               <?=
                                 session()->getFlashData('fail')
                               ?>
                           </div>

                        <?php
                    }
                ?>
                
                <form action="/register/save" 
                      method="post"
                      class="form mb-3">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <lebel for="inputname" class="form-label">Name</lebel>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               id="inputforname" 
                               placeholder="Name Here"
                               value="<?= set_value('name'); ?>" >
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'name') : '' ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <lebel for="inputemail" class="form-label">Email</lebel>
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               id="inputforemail" 
                               placeholder="Your Email Address"
                               value="<?= set_value('email'); ?>" >
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <lebel for="inputpassword" class="form-label">Password</lebel>
                        <input type="password" 
                               name="password" 
                               class="form-control" 
                               id="inputforpassword" 
                               placeholder="Your Password"
                               value="<?= set_value('password'); ?>">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <lebel for="inputconfpassword" class="form-label">Confirm Password</lebel>
                        <input type="password" 
                               name="confpassword" 
                               class="form-control" 
                               id="inputforconfpassword" 
                               placeholder="Confirm Your Password"
                               value="<?= set_value('confpassword'); ?>">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'confpassword') : '' ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    
                </form>
                <hr>
                <a href="/login" >I already have an account, Login Here</a>
            </div>
        </div>
      </div>
       

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>