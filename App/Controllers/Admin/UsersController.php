<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;
use App\PDO\UserPDO;
use App\PDO\BDD;

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


    protected function after()
    {
    }



}
