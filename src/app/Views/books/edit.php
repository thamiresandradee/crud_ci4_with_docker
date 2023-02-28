<?= $this->extend('layouts/master'); ?>
 
<?=$this->section("content")?>
<div class="container">
    <h2 class="text-center mt-5 mb-3">Atualizar Livro</h2>
    <div class="card">
        <div class="card-header">
            <a href="<?= url_to('books'); ?>" class="btn btn-outline-secondary btn-sm">
                <i class="material-icons">arrow_back</i>
                <span>Voltar para lista</span>
            </a>
        </div>
        <div class="card-body">
           <!-- flashdata for success -->
           <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <b><?php echo session()->getFlashdata('success') ?></b>
                </div>
            <?php endif ?>
     
            <form action="<?= url_to('books_update', $book->id); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $book->id; ?>">
                <div class="row mb-3">
                    <label for="bookTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="bookTitle" name="title" autofocus value="<?php echo $book->title;?>">
                        <span class="text-danger text-sm"><?php echo session()->getFlashdata('errors')['title'] ?? '' ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookAuthor" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="bookAuthor" name="author" value="<?php echo $book->author;?>">
                        <span class="text-danger text-sm"><?php echo session()->getFlashdata('errors')['author'] ?? '' ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookDescription" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id="bookDescription" rows="10" name="description"><?php echo $book->description;?></textarea>
                        <span class="text-danger text-sm"><?php echo session()->getFlashdata('errors')['description'] ?? '' ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bookPageNumber" class="col-sm-2 col-form-label">Nº de Páginas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('page_number')) ? 'is-invalid' : ''; ?>" id="bookPageNumber" name="page_number" value="<?php echo $book->page_number;?>">
                        <span class="text-danger text-sm"><?php echo session()->getFlashdata('errors')['page_number'] ?? '' ?></span>
                    </div>
                </div>
                <hr/>
                <div>      
                    <button type="submit" class="btn btn-warning text-white mt-3">
                        <i class="material-icons text-white">save</i>Atualizar
                    </button>
                </div>
            </form>       
        </div>
    </div>
</div>
 
<?=$this->endSection()?>