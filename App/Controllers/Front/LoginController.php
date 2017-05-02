<?php

namespace App\Controllers\Front;

use Core\Controllers\Controller;
use Core\Form\Form;
use App\Models\User;
use App\PDO\UserPDO;
use App\PDO\BDD;

/**
 * Login controller
 */
class LoginController extends Controller
{
    protected function before()
    {

      if($this->app['auth']->isAuth()){
          $this->app['HTTPResponse']->redirect('/admin/home');
      }

    }

    public function indexAction()
    {

      $form = new Form;

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {

        extract($this->app['HTTPRequest']->allData());

        if(!$this->validUser($username, $password))
        {
          $this->app['HTTPResponse']->addFlash('flash-error', 'La combinaison identifiant et mot de passe est incorrect. Veuillez réessayer.');
          $this->app['HTTPResponse']->redirect('/login');
        }

        $this->app['auth']->setAuth();
        $this->app['auth']->setAuthUser($username);
        $this->app['HTTPResponse']->redirect('/admin/home');

      }

      return $this->app['view']->render('Front/login.php', [
              'auth' => $this->app['auth']
      ]);

    }

    /**
     * Valid username and password from DB
     *
     * @param type string username & password
     * @return return boolean
     */

    private function validUser(string $username, string $password)
    {
        $userPDO = new UserPDO(new BDD);

        if(!$userPDO->selectUser($username))
        {
          return false;
        }

        $user = $userPDO->selectUser($username);

        if(!password_verify($password, $user->password()))
        {
          return false;
        }

        return true;
    }

    protected function after()
    {

    }

}
