<?php

namespace Anax\Users;

/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
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
     * Add new user.
     *
     * @param string $acronym of user to add.
     *
     * @return void
     */
    public function addAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormPsWebAddUser();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Users Add Menu");
       $this->di->views->add('default/page', [
         'title' => "Users Add Menu",
         'content' => $form->getHTML()
       ]);
    }

    /**
     * List all active and not deleted users.
     *
     * @param string $activation list active or not active users.
     *
     * @return void
     */
    public function activeAction($activation)
    {
      if($activation=='activateusers') {
        $all = $this->users->query()
        ->where('active IS NOT NULL')
        ->andWhere('deleted is NULL')
        ->execute();
        $this->theme->setTitle("Users that are active");
        $this->views->add('users/list-all', [
            'users' => $all,
            'title' => "Users that are active",
        ]);
      }
      else{
          $all = $this->users->query()
         ->where('active IS NOT NULL')
         ->andWhere('deleted is not NULL')
         ->execute();
         $this->theme->setTitle("Users that are active but not deleted");
         $this->views->add('users/list-all', [
             'users' => $all,
             'title' => "Users that are active but not deleted",
         ]);
      }
    }

    /**
     * Delete user.
     *
     * @param integer $id of user to delete.
     *
     * @return void
     */
    public function deleteAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormPsWebDeleteUser();
       $form->setDI($this->di);
       $form->check();

       $this->di->theme->setTitle("Users Delete Menu");

       $this->di->views->add('default/page', [
          'title' => "Users Delete Menu",
          'content' => $form->getHTML()
      ]);
    }

    /**
     * Display user details.
     *
     * @param integer $id of user to display delete for.
     *
     * @return void
     */

    public function displayuserAction($id = null)
    {
        $this->di->session();
        $form = new \Anax\HTMLForm\CFormPsWebDisplayUser();
        $form->setDI($this->di);
        $form->check();

        $this->di->theme->setTitle("Users Display details Menu");

        $this->di->views->add('default/page', [
           'title' => "Users Display Details Menu",
           'content' => $form->getHTML()
       ]);
    }

    /**
     * Get ussr to update(soft delete).
     *
     * @return void
     */
    public function updateAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormPsWebUpdateUser();
       $form->setDI($this->di);
       $form->check();

       $this->di->theme->setTitle("Users Delete Menu");

       $this->di->views->add('default/page', [
          'title' => "Users Soft Delete (update) Menu",
          'content' => $form->getHTML()
       ]);
    }

    /**
     * Get ussr to undo update (undo soft delete).
     *
     * @return void
     */
    public function undoupdateAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormPsWebUndoUpdateUser();
       $form->setDI($this->di);
       $form->check();

       $this->di->theme->setTitle("Users Delete Menu");

       $this->di->views->add('default/page', [
          'title' => "Users Soft UnDelete (update) Menu",
          'content' => $form->getHTML()
       ]);
    }

    /**
     * List all users.
     *
     * @param string $id user id.
     *
     * @return void
     */
    public function listAction($id=null)
    {
      if($id==null) {
         $all = $this->users->findAll();
          $this->theme->setTitle("List Activated users");
          $this->views->add('users/list-all', [
            'users' => $all,
            'title' => "Users List Menu",
        ]);
      }
      else{
        $user = $this->users->find($id);
         $this->theme->setTitle("List Details for a user");
         $this->views->add('users/view', [
           'user' => $user,
           'title' => "Users List Menu",
       ]);
      }
    }

    /**
     * List user with id.
     *
     * @param int $id of user to display
     *
     * @return void
     */
    public function idAction($id = null)
    {
       $this->users = new \Anax\Users\User();
       $this->users->setDI($this->di);

       $user = $this->users->find($id);

       $this->theme->setTitle("View user with id");
       $this->views->add('users/view', [
         'id' => $id,
         'user' => $user,
         'title' => "User Detailed List",
       ]);
    }

    /**
     * Index action.
     *
     */
    public function indexAction()
    {
        $this->di->session();
             $form = new \Anax\HTMLForm\CFormPsWebIndex();
             $form->setDI($this->di);
             $form->check();
             $this->di->theme->setTitle("Testing CForm with Anax");
             $this->di->views->add('default/page', [
                 'title' => "Users Menu",
                 'content' => $form->getHTML()
             ]);
             //To Display byline
             $byline = $this->di->fileContent->get('byline.md');
             $byline = $this->di->textFilter->doFilter($byline, 'shortcode, markdown');
             $this->di->views->add('me/pagebyline', [
               'byline' => $byline,
             ]);
    }
}
