<?php

namespace Anax\Tag;

/**
 * A controller for questions.
 *
 */
class TagController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Tag\Tag();
        $this->users->setDI($this->di);
    }

    /**
     * Add new tags.
     *
     * @param string $tag of user to add.
     *
     * @return void
     */
    public function addAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormTagAdd();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Ny Tag");
       $this->di->views->add('default/page', [
         'title' => "Ny Tag",
         'content' => $form->getHTML()
       ]);
    }

    /**
    * List all tags.
    *
    * @return void
    */
     public function listAction()
     {
         $all = $this->users->findAll();

         $this->theme->setTitle("Visa alla Taggar");
         $this->views->add('tag/list-all', [
             'users' => $all,
             'title' => "Visa alla taggar",
         ]);
     }

    /**
     * Index action to be used when rout setup is called.
     *
     */
    public function setupAction()
    {
      $all = $this->users->setup();

      $this->theme->setTitle("Tags has been setup");
      $this->views->add('tag/list-all', [
          'users' => $all,
          'title' => "Tags has been setup",
      ]);
    }
}
