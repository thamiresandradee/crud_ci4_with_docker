<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <?= $this->include('layouts/alert'); ?>
    <div class="row">
        <div class="col">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h1>Meus Livros</h1>
                <a href="<?= url_to('books_add'); ?>" class="btn btn-primary">
                    <i class="material-icons">add</i>
                    <span>Add Livro</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-primary" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                        <i class="material-icons">search</i>
                    </button>
                    <input type="text" class="form-control" name="keyword" placeholder="Pesquise o livro por título ou autor" value="<?= $keyword; ?>">
                    <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reset Search">
                        <i class="material-icons">clear</i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- flashdata for success -->
    <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <b><?php echo session()->getFlashdata('success') ?></b>
                </div>
            <?php endif ?>
            <!-- flashdata for errors -->
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php foreach (session()->getFlashdata('errors')  as $field => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <b><?php echo session()->getFlashdata('error') ?></b>
                </div>
            <?php endif ?>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <?php if (sizeof($books) > 0) : ?>
                    <div class="responsive-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Nº Páginas</th>
                                    <th scope="col">Data Cadastro</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + ($rowEachPage * ($currentPage - 1)) ?>
                                <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $book->title; ?></td>
                                        <td><?= character_limiter($book->description, 200); ?></td>
                                        <td><?= $book->author; ?></td>
                                        <td><?= $book->page_number; ?></td>
                                        <td><?= date('d/m/Y H:i:s', strtotime($book->created_at)); ?></td>
                                        <td>
                                            <div class="d-flex flex-row  mb-3">
                                                <div>
                                                    <a href="<?= url_to('books_show', $book->id); ?>" data-toggle="tooltip" data-placement="top" title="Ver Detalhes">
                                                        <i class="material-icons text-info">description</i>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="<?= url_to('books_edit', $book->id); ?>" data-toggle="tooltip" data-placement="top" title="Atualizar Livro">
                                                        <i class="material-icons text-warning">edit</i>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="<?= url_to('books_delete', $book->id); ?>" data-toggle="tooltip" data-placement="top" title="Excluir Livro">
                                                        <i class="material-icons text-danger">delete</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?= $pager->links('books', 'books_pagination'); ?>
                <?php else : ?>
                    <p class="p-3 border bg-light">There are no book.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>