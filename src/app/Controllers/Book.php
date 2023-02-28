<?php 

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\WeatherModel;

class Book extends BaseController {

    private $model;
    private $weather;
    private $ip;
    protected $bookModel;

    public function __construct() 
    {
        $this->bookModel = new BookModel(); 
        $this->weather   = new WeatherModel(); 
        $this->ip        = $_SERVER["REMOTE_ADDR"];
    }

    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $books = null;
        $filterParam = $this->request->getVar('keyword');

        // pagination properties
        $currentPage = $this->request->getVar('page_book');
        $currentPage = ((int)$currentPage > 1) ? $currentPage : 1;
        $rowEachPage = 5;

        // execute searching query if keyword is exist
        if (!empty($filterParam)) {
            $books = $this->bookModel->search($filterParam);
        } else {
            $books = $this->bookModel;
        }

        $data = [
            'title' => 'Meus Livros',
            'books' => $books->paginate($rowEachPage, 'books'),
            'pager' => $this->bookModel->pager,
            'currentPage' => $currentPage,
            'rowEachPage' => $rowEachPage,
            'keyword' => $filterParam,
            'weather' => $this->weather()
        ];

        return view('books/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $book = $this->bookModel->getBook($id, 'id');

        // checking the existence of the book
        if (empty($book)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Esse livro não existe!');
        }

        $data = [
            'title' => $book->title,
            'book' => $book,
            'weather' => $this->weather()
        ];

        return view('books/show', $data);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function add()
    {
        $data = [
            'title' => 'Add Livro',
            'validation' => \Config\Services::validation(),
            'weather' => $this->weather()
        ];

        return view('books/add', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate($this->bookModel->getDefaultRules())) {
            return redirect()->to('/books/add')->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'         => htmlspecialchars($this->request->getVar('title')),
            'page_number'   => (int) $this->request->getPost('page_number'),
            'author'        => htmlspecialchars($this->request->getVar('author')),
            'description'   => htmlspecialchars($this->request->getVar('description')),
        ];

        // print_r($data);
        // exit();

        if ($this->bookModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->bookModel->errors());
        }
    
        return redirect()->to('/books')->with('success', 'Livro '.$data->title.' cadastrado com sucesso!');
    }


    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        
        $book = $this->bookModel->getBook($id, 'id');

        // checking the existence of the book
        if(!$book|| empty($book)){
            return redirect()->route('books')->with('error', 'Esse livro não existe!');
        }

        $data = [
            'title' => $book->title,
            'book' => $book,
            'validation' => \Config\Services::validation(),
            'weather' => $this->weather()
        ];

        return view('books/edit', $data);
    }

    

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // validation rules to update a book
        $updateRules = $this->bookModel->getDefaultRules();
        $updateRules['title']['rules'] = "required|max_length[255]|is_unique[books.title,id,$id]";

        // form validation
        if (!$this->validate($updateRules)) {
            // return to the form page with the form data and validation results
            $idOldBook = $this->bookModel->getBook($id);
            return redirect()->to("/books/edit/$idOldBook")->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'title' => htmlspecialchars($this->request->getVar('title')),
            'page_number' => (int) $this->request->getVar('page_number'),
            'author' => htmlspecialchars($this->request->getVar('author')),
            'description' => htmlspecialchars($this->request->getVar('description')),
        ];

        if ($this->bookModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->bookModel->errors());
        }
    
        return redirect()->to('/books')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->bookModel->delete($id);
        return redirect()->to('/books')->with('success', 'Livro excluído com sucesso!');
    }

    public function weather()
    {
        $weather = $this->weather->hg_request(
            ['user_ip' => $this->ip]
        );

        return ($weather);
    }
}
