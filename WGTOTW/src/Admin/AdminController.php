<?php

namespace Anax\Admin;

/**
 * A controller for users and admin related events.
 *
 */
class AdminController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Admin\Admin();
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
       $form = new \Anax\HTMLForm\CFormAdminAddUser();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Ny användare");
       $this->di->views->add('default/page', [
         'title' => "Ny användare",
         'content' => $form->getHTML()
       ]);
    }

    /**
     *login with user.
     *
     * @param string $acronym of user to add.
     *
     * @return void
     */
    public function loginAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormAdminLoginUser();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Logga in");
       $this->di->views->add('default/page', [
         'title' => "Logga in",
         'content' => $form->getHTML()
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
             $this->di->theme->setTitle("Admin");
             $this->di->views->add('default/page', [
                 'title' => "Admin",
                 'content' => $form->getHTML()
             ]);
             //To Display byline
             $byline = $this->di->fileContent->get('byline.md');
             $byline = $this->di->textFilter->doFilter($byline, 'shortcode, markdown');
             $this->di->views->add('me/pagebyline', [
               'byline' => $byline,
             ]);
    }

    /**
    * List all admin-users.
    *
    * @return void
    */
     public function listAction()
     {
         $all = $this->users->findAll();

         $this->theme->setTitle("Visa alla användare");
         $this->views->add('admin/list-all', [
             'users' => $all,
             'title' => "Visa alla användare",
         ]);
     }

    /**
     * Index action to be used when rout setup is called.
     *
     */
    public function setupAction()
    {
      $all = $this->users->setup();

      $this->theme->setTitle("Users has been setup");
      $this->views->add('admin/list-all', [
          'users' => $all,
          'title' => "Users has been setup",
      ]);
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
       $this->users = new \Anax\Admin\Admin();
       $this->users->setDI($this->di);

       $user = $this->users->find($id);

       $this->theme->setTitle("Användare");
       $this->views->add('admin/view', [
         'id' => $id,
         'user' => $user,
         'title' => "Användare",
       ]);
    }

    /**
    * Edit a user.
    *
    * @return void
    */
    public function editAction()
    {
      $this->di->session();

      $content = $this->di->fileContent->get('editAdminUser.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
          'content' => $content,
      ]);

      $this->users = new \Anax\Admin\Admin();
      $this->users->setDI($this->di);

      $form = new \Anax\HTMLForm\CFormAdminEditUser($this->users->find($_GET['id']));
      $form->setDI($this->di);
      $form->check();

      $this->di->views->add('default/page', [
          'title' => "",
          'content' => $form->getHTML()
      ]);

      //To Display byline
      $byline = $this->di->fileContent->get('byline.md');
      $byline = $this->di->textFilter->doFilter($byline, 'shortcode, markdown');
      $this->di->views->add('me/pagebyline', [
        'byline' => $byline,
      ]);
  }

    /**
    * Save an editid admin user.
    *
    * @param $id with admin user id number.
    *
    * @return void
    */
    public function saveEditAction($id)
    {
      $isPosted = $this->request->getPost('doSaveEdit');

      if (!$isPosted) {
        $this->response->redirect($this->request->getPost('redirect'));
      }

      $this->users = new \Anax\Admin\Admin();
      $this->users->setDI($this->di);

      $editedUser = [
        'name'      => $this->request->getPost('name'),
        'mail'      => $this->request->getPost('mail'),
        'timestamp' => time(),

        'acronym' => $this->request->getPost('acronym'),
        'email' => $this->request->getPost('mail'),
        'name' => $this->request->getPost('name'),
       // 'password' => password_hash($_POST['addacronym'], PASSWORD_DEFAULT),
       'password' => $this->request->getPost('password'),
        'created' => $now,
        'active' => $now,
      ];

      $comments->saveEdit($editedComment, $id,$key);

      $this->response->redirect($this->request->getPost('redirect'));
    }

}
