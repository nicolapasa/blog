<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/User.php';

class PostController extends Controller {
    public function index() {
        $posts = Post::all();
        $this->view('posts/index', ['posts' => $posts]);
    }

    public function show($id) {
        $post = Post::find($id);
        if (!$post) { http_response_code(404); echo 'Post non trovato'; return; }
        $this->view('posts/show', ['post' => $post]);
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $imagePath = null;

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $imagePath = '/uploads/' . $fileName;
            }

            Post::create($title, $content, $_SESSION['user_id'], $imagePath);
            header('Location: /posts'); exit;
        }
        $this->view('posts/create');
    }

    public function edit($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); exit;
        }
        $post = Post::find($id);
        if (!$post) { http_response_code(404); echo 'Post non trovato'; return; }
        if ($post['user_id'] != $_SESSION['user_id']) { echo 'Non autorizzato'; return; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $imagePath = $post['image'];

            if (!empty($_FILES['image']['name'])) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $fileName;
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                $imagePath = '/uploads/' . $fileName;
            }

            Post::update($id, $title, $content, $imagePath);
            header('Location: /posts'); exit;
        }
        $this->view('posts/edit', ['post' => $post]);
    }

    public function delete($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login'); exit;
        }
        $post = Post::find($id);
        if ($post && $post['user_id'] == $_SESSION['user_id']) {
            Post::delete($id);
        }
        header('Location: /posts'); exit;
    }
}
