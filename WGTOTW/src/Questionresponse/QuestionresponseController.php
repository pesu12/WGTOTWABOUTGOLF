<?php

namespace Anax\Questionresponse;

/**
 * A controller for questions.
 *
 */
class QuestionresponseController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Questionresponse\Questionresponse();
        $this->users->setDI($this->di);
    }

    /**
     * Add new questionsresponses.
     *
     * @param string $acronym of user to add.
     *
     * @return void
     */
    public function addAction()
    {
       $this->di->session();
       $form = new \Anax\HTMLForm\CFormPsWebAddQuestionresponse();
       $form->setDI($this->di);
       $form->check();
       $this->di->theme->setTitle("Nytt svar");
       $this->di->views->add('default/page', [
         'title' => "Nytt svar",
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
        $this->users = new \Anax\Questionresponse\Questionresponse();
        $this->users->setDI($this->di);

        $user = $this->users->find($id);

        $this->theme->setTitle("Användare");
        $this->views->add('question/view', [
          'id' => $id,
          'user' => $user,
          'title' => "Användare",
        ]);
     }
}
