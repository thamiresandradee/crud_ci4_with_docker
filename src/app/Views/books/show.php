<?= $this->extend('layouts/master'); ?>
 
<?=$this->section("content")?>
<div class="container">
    <h2 class="text-center mt-5 mb-3">Detalhes do Livro</h2>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary btn-sm">
                <i class="material-icons">arrow_back</i>
                <span>Voltar para lista</span>
            </a>
        </div>
        <div class="card-body">
            <b class="text-muted">Title:</b>
            <p><?php echo $book->title;?></p>

            <b class="text-muted">Description:</b>
            <p><?php echo $book->description;?></p>

            <b class="text-muted">Autor:</b>
            <p><?php echo $book->author;?></p>

            <b class="text-muted">Número de Páginas:</b>
            <p><?php echo $book->page_number;?></p>

            <b class="text-muted">Data de Cadastro:</b>
            <p><?php echo date('d/m/Y H:i:s', strtotime($book->created_at));?></p>
        </div>
    </div>
</div>
 
<?=$this->endSection()?>