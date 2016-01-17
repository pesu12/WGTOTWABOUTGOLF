<?php

namespace Anax\Question;

/**
 * A controller for questions.
 *
 */
class QuestionController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Question\Question();
        $this->users->setDI($this->di);
    }

    /**
     * Add new questions.
     *
     * @param string $acronym of user to add.
     *
     * @return void
     */
    public function addAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormQuestionAdd();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Ny Fråga");
       $this->di->views->add('default/page', [
         'title' => "Ny fråga",
         'content' => $form->getHTML()
       ]);
    }

    /**
    * List all questions.
    *
    * @return void
    */
     public function listAction()
     {
         $all = $this->users->findAll();

         $this->theme->setTitle("Visa alla frågor");
         $this->views->add('question/list-all', [
             'users' => $all,
             'title' => "Visa alla frågor",
         ]);
     }

     /**
      * List question with id.
      *
      * @param int $id of user to display
      *
      * @return void
      */
     public function idAction($id = null)
     {
        $this->users = new \Anax\Question\Question();
        $this->users->setDI($this->di);

        $user = $this->users->find($id);

        $this->theme->setTitle("Användare");
        $this->views->add('question/view', [
          'id' => $id,
          'user' => $user,
          'title' => "Användare",
        ]);
     }


     /**
     * edit a questions by adding response or comment
     *
     * @return void
     */
      public function editAction($id = null)
      {
          $all = $this->users->findAll();

          $this->theme->setTitle("Visa fråga");
          $this->views->add('question/listbyId', [
              'users' => $this->users,
              'title' => "Visa fråga",
          ]);
      }

    /**
     * Index action to be used when rout setup is called.
     *
     */
    public function setupAction()
    {
      $all = $this->users->setup();

      $this->theme->setTitle("Questions has been setup");
      $this->views->add('question/list-all', [
          'users' => $all,
          'title' => "Questions has been setup",
      ]);
    }
}
