<?php

namespace Anax\Firstpage;
/**
 * A controller for the firstpage.
 *
 */
class FirstPageController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->page = new \Anax\Firstpage\Firstpage();
        $this->page->setDI($this->di);

        $this->users = new \Anax\Admin\Admin();
        $this->users->setDI($this->di);

        $this->questions = new \Anax\Question\Question();
        $this->questions->setDI($this->di);

        $this->tags = new \Anax\Tag\Tag();
        $this->tags->setDI($this->di);
    }


    /**
     * Index action.
     *
     */
    public function indexAction()
    {
      $all = $this->users->findMostActiveUser();

      $this->theme->setTitle("Visa mest aktiva användare");
      $this->views->add('admin/list-all-first-page', [
          'users' => $all,
          'title' => "Visa mest aktiva användare",
      ]);

      $all = $this->questions->findLatestQuestions();
      $this->theme->setTitle("Visa senaste frågorna");
      $this->views->add('question/list-all-first-page', [
          'users' => $all,
          'title' => "Visa senaste frågorna",
      ]);

      $all = $this->tags->findPopulartags();

      $this->theme->setTitle("De mest populära taggarna");
      $this->views->add('tag/list-all-first-page', [
          'users' => $all,
          'title' => "De mest populära taggarna",
      ]);
    }
   }
