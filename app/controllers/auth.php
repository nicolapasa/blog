<?php 



class Auth extends Controller{
     
  
  

    public function login()
    {
     
        $this->loginView();
        
    }
    public function register()
    {
        new Middleware();
        $this->view('auth/register', ['pages'=>Pages::all(), 'categories'=>Categories::all(), 'title'=>'Nuovo utente | Redrum']);
    }
 
    public function signup(){
        new Middleware();
        Middleware::verifyPost();


        $user=$_POST;
        if (empty(trim($user['username'] ?? '')) || !filter_var($user['email'] ?? '', FILTER_VALIDATE_EMAIL) || strlen($user['password'] ?? '') < 8) {
            http_response_code(422); exit('Inserisci un nome utente, un’email valida e una password di almeno 8 caratteri.');
        }
        if (User::where('username', $user['username'])->orWhere('email', $user['email'])->exists()) {
            http_response_code(422); exit('Nome utente o email già utilizzati.');
        }

    $image= Upload::upload_file($_FILES['image'] ?? []);
      //@check se username esistente
           User::create([
              'username'=>$user['username'],
              'email'=>$user['email'],
              'password'=>password_hash($user['password'], PASSWORD_BCRYPT),
              'image'=>$image
           ]);
          
            
            //redirect 
            header("Location: ".URL_GEN."admin/users", true, 303);

    }


    private function loginView($message = '', $username = '') {
        $this->view('auth/login', ['pages'=>Pages::all(), 'categories'=>Categories::all(), 'title'=>'Accedi | Redrum', 'message'=>$message, 'username'=>$username]);
    }

    public function signin() {
        Middleware::verifyPost();
        $username = trim((string) ($_POST['username'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $user = $username !== '' ? User::where('username', $username)->first() : null;
        if (!$user || !password_verify($password, $user->password)) {
            http_response_code(422);
            $this->loginView('Nome utente o password non corretti.', $username);
            return;
        }
        session_regenerate_id(true);
        $_SESSION['username'] = $user->username;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        header('Location: '.URL_GEN.'admin/index', true, 303);
        exit;
    }

    public function logout() {
        Middleware::verifyPost();
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', ['expires'=>time()-42000, 'path'=>$params['path'], 'domain'=>$params['domain'], 'secure'=>$params['secure'], 'httponly'=>$params['httponly'], 'samesite'=>'Lax']);
        }
        session_destroy();
        header('Location: '.URL_GEN.'auth/login', true, 303);
        exit;
    }

    private function publicForm($view, $message = '', $values = []) {
        $this->view($view, ['pages'=>Pages::all(), 'categories'=>Categories::all(), 'title'=>'Redrum | '.($view === 'home/contact' ? 'Contatti' : 'Recupera password'), 'message'=>$message, 'values'=>$values]);
    }

    public function forgot() {
        header('Referrer-Policy: no-referrer');
        header('Cache-Control: no-store');
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $_SESSION['form_started']['forgot'] = time();
            $this->publicForm('auth/forgot'); return;
        }
        Middleware::verifyPost();
        if (!FormSecurity::human('forgot') || !FormSecurity::allow('forgot:'.($_SERVER['REMOTE_ADDR'] ?? ''), 5, 900)) {
            http_response_code(429); $this->publicForm('auth/forgot', 'Richiesta troppo rapida o non valida. Ricarica la pagina e riprova tra qualche minuto.'); return;
        }
        $email = trim((string) ($_POST['email'] ?? ''));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422); $this->publicForm('auth/forgot', 'Inserisci un indirizzo email valido.'); return;
        }
        $config = SiteMail::config();
        if (!SiteMail::ready() || !filter_var($config['base_url'], FILTER_VALIDATE_URL) || !in_array(parse_url($config['base_url'], PHP_URL_SCHEME), ['http', 'https'], true)) {
            http_response_code(503); $this->publicForm('auth/forgot', 'Il recupero via email non è ancora disponibile. Contatta l’amministratore.'); return;
        }
        $user = User::where('email', $email)->first();
        if ($user) {
            $token = PasswordReset::issue($user);
            $url = rtrim($config['base_url'], '/').'/auth/reset?token='.$token;
            if (!SiteMail::send($user->email, 'Redrum: recupera la password', "Per scegliere una nuova password apri questo link entro 30 minuti:\n\n".$url."\n\nSe non hai richiesto il recupero, ignora questa email.")) {
                error_log('Redrum: invio email recupero password non riuscito.');
            }
        }
        unset($_SESSION['form_started']['forgot']);
        $this->publicForm('auth/forgot', 'Se l’indirizzo è associato a un account, riceverai un link valido per 30 minuti.');
    }

    public function reset() {
        header('Referrer-Policy: no-referrer');
        header('Cache-Control: no-store');
        $token = (string) ($_POST['token'] ?? $_GET['token'] ?? '');
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->publicForm('auth/reset', '', ['token'=>$token]); return;
        }
        Middleware::verifyPost();
        if (!FormSecurity::allow('reset:'.($_SERVER['REMOTE_ADDR'] ?? ''), 10, 900)) {
            http_response_code(429); $this->publicForm('auth/reset', 'Troppi tentativi. Riprova tra qualche minuto.'); return;
        }
        $password = (string) ($_POST['password'] ?? '');
        if (strlen($password) < 8 || strlen($password) > 72 || $password !== ($_POST['password_confirmation'] ?? '')) {
            http_response_code(422); $this->publicForm('auth/reset', 'Usa da 8 a 72 caratteri e ripeti la stessa password.', ['token'=>$token]); return;
        }
        $ok = PasswordReset::consume($token, static function ($user) use ($password) {
            $user->password = password_hash($password, PASSWORD_BCRYPT); $user->save();
        });
        if (!$ok) {
            http_response_code(422); $this->publicForm('auth/reset', 'Link non valido, già utilizzato o scaduto. Richiedi un nuovo link.'); return;
        }
        session_regenerate_id(true);
        unset($_SESSION['username'], $_SESSION['user_id']);
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $this->loginView('Password aggiornata. Puoi accedere con la nuova password.');
    }

    public function contact() {
        Middleware::verifyPost();
        $values = ['name'=>trim((string) ($_POST['name'] ?? '')), 'email'=>trim((string) ($_POST['email'] ?? '')), 'message'=>trim((string) ($_POST['message'] ?? ''))];
        if (!FormSecurity::human('contact') || !FormSecurity::allow('contact:'.($_SERVER['REMOTE_ADDR'] ?? ''), 5, 600)) {
            http_response_code(429); $this->publicForm('home/contact', 'Invio troppo rapido o non valido. Ricarica la pagina e riprova tra qualche minuto.', $values); return;
        }
        if ($values['name'] === '' || mb_strlen($values['name']) > 100 || !filter_var($values['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($values['message']) < 10 || mb_strlen($values['message']) > 5000) {
            http_response_code(422); $this->publicForm('home/contact', 'Inserisci nome, email valida e un messaggio da 10 a 5000 caratteri.', $values); return;
        }
        $config = SiteMail::config();
        $sent = SiteMail::send($config['contact_to'], 'Redrum: messaggio dal sito', "Nome: ".$values['name']."\nEmail: ".$values['email']."\n\n".$values['message'], $values['email']);
        if (!$sent) {
            http_response_code(503); $this->publicForm('home/contact', 'Invio non riuscito. Riprova più tardi o contattami tramite i social.', $values); return;
        }
        unset($_SESSION['form_started']['contact']);
        $_SESSION['contact_sent'] = true;
        header('Location: '.URL_GEN.'home/static/contact', true, 303); exit;
    }

    public function updateProfile($id){
        new Middleware();
        Middleware::verifyPost();


        
        $post=$this->model('User');

        $user=$_POST;
        if(!empty($_FILES['image']['name'])){
            $image= Upload::upload_file($_FILES['image'] ?? []);
           }
           else{
          $image = User::findOrFail($id)->image;
           }

          if($user['new_password'] !='')  {
            $password=password_hash($user['new_password'], PASSWORD_BCRYPT);
          }
          else{
            $profile=$post->where('id', $id)->first();
            $password=$profile->password;
          }
       
      //@check se username esistente
      $post
      ->where('id', $id)
      ->update([
              'username'=>$user['username'],
              'email'=>$user['email'],
              'password'=>$password,
              'image'=>$image
           ]);
          
            
            //redirect 
            header("Location: ".URL_GEN."admin/users", true, 303);

    }

    public function destroyProfile($id=0)
    {
        new Middleware();
        Middleware::verifyPost();
        $user=$this->model('User');
     
        if ((int) $id === (int) $_SESSION['user_id']) { http_response_code(422); exit('Non puoi eliminare l’utente con cui hai effettuato l’accesso.'); }
        $profile =$user->where('id', $id);
        $profile->delete();

        header("Location: ".URL_GEN."admin/users", true, 303);
        
    }

}