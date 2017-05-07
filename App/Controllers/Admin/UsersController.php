<?php

namespace App\Controllers\Admin;

use Core\Controller\Controller;
use App\PDO\UserPDO;
use App\PDO\BDD;
use Core\Form\Form;
use App\Models\User;

/**
 * Admin Articles Controller
 */

class UsersController extends Controller
{

    public function before()
    {

        if(!$this->app['auth']->isAuth())
        {
          $this->app['HTTPResponse']->addFlash('flash-warning', 'Vous devez être connecté');
          $this->app['HTTPResponse']->redirect('/login');
        }

    }

    /**
     * Users page index Action
     *
     * @return return view
     */

    public function indexAction()
    {

      $userPDO = new UserPDO(new BDD);
      $users = $userPDO->getList();

      return $this->app['view']->render('Admin/users.php', [
              'auth' => $this->app['auth'],
              'users' => $users
      ]);
    }

    /**
     * Delete user from id
     *
     * @return return view users page
     */

    public function deleteAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $userPDO = new UserPDO(new BDD);
      $user = $userPDO->get($id);

      if($user->username() == $this->app['auth']->getAttribute('authUser')){
        $this->app['HTTPResponse']->addFlash('flash-error', 'Vous ne pouvez pas supprimer votre compte.');
        $this->app['HTTPResponse']->redirect('/admin/users');
      }

      $userPDO->delete($user);

      $this->app['HTTPResponse']->addFlash('flash-success','L\'utilisateur a bien été supprimé');
      $this->app['HTTPResponse']->redirect('/admin/users');

    }

    public function addAction()
    {

      $userPDO = new UserPDO(new BDD);
      $form = new Form;
      $user = null;

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {

          extract($this->app['HTTPRequest']->allData());

          $user = new User($this->app['HTTPRequest']->allData());

          $password = password_hash($password, PASSWORD_DEFAULT);
          $user->setPassword($password);

          if(!$user->erreurs())
          {
            $userPDO->add($user);
            $this->app['HTTPResponse']->addFlash('flash-success','L\'utilisateur a bien été ajouté.');
            $this->app['HTTPResponse']->redirect('/admin/users');
          }

      }

      return $this->app['view']->render('Admin/add/user.php', [
              'auth' => $this->app['auth'],
              'user' => $user,
              'form' => $form
      ]);

    }

    public function editAction()
    {

      $id = intval($this->app['route']->getParams()['id']);
      $form = new Form;

      $userPDO = new UserPDO(new BDD);
      $user = $userPDO->get($id);

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {

          extract($this->app['HTTPRequest']->allData());

          if($user->username() != $username)
          {
            $user->setUsername($username);
          }

          if($user->name() != $name)
          {
            $user->setName($name);
          }

          if($user->firstname() != $firstname)
          {
            $user->setFirstname($firstname);
          }

          if($user->email() != $email)
          {
            $user->setEmail($email);
          }

          if(!empty($password))
          {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user->setPassword($password);
          }

          $userPDO->update($user);
          $this->app['HTTPResponse']->addFlash('flash-success','L\'utilisateur a bien été mis à jour.');


      }

      return $this->app['view']->render('Admin/edit/user.php', [
              'auth' => $this->app['auth'],
              'user' => $user,
              'form' => $form
      ]);

    }


}
