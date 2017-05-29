<?php

namespace App\Controllers\Front;

use Core\Controller\Controller;
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

      if($this->app['auth']->isAuth())
      {
          $this->app['HTTPResponse']->redirect('/admin/home');
      }

    }

    public function indexAction()
    {
      $title = "Identification Administration | Jean Forteroche";
      $form = new Form;

      if($this->app['HTTPRequest']->methodPost() && $form->isValid())
      {

        extract($this->app['HTTPRequest']->allData());

        if(!$username || !$password)
        {
          $this->app['HTTPResponse']->addFlash('flash-error', 'Vous devez remplir les champs.');
          $this->app['HTTPResponse']->redirect('/login');
        }

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
              'auth' => $this->app['auth'],
              'title' => $title
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
        $user = $userPDO->selectUser($username);

        if(!$user)
        {
          return false;
        }

        if(!password_verify($password, $user->password()))
        {
          return false;
        }

        return true;
    }

}
