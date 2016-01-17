<?php

namespace Anax\Users;

/**
 * A controller for users and admin related events.
 *
 */
class SetupController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Users\User();
        $this->users->setDI($this->di);
    }


 /**
 * List all users.
 *
 * @return void
 */
  public function listAction()
  {
      $all = $this->users->findAll();

      $this->theme->setTitle("List all users");
      $this->views->add('users/list-all', [
          'users' => $all,
          'title' => "List all users",
      ]);
  }

   /**
    * Index action to be used when rout setup is called.
    *
    */
   public function indexAction()
   {
     $all = $this->users->setup();

     $this->theme->setTitle("Users has been setup");
     $this->views->add('users/list-all', [
         'users' => $all,
         'title' => "Users has been setup",
     ]);
   }
}
