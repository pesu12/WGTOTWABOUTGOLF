<?php

namespace Anax\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
    * Display Comment index page for comment page 1.
    *
    * @param $key with comment page.
    *
    * @return void
    */
    public function indexAction($key=null)
    {
      $page=1;
      if($key=='comment2')
      {
        $page=2;
      }

      $this->di->session();

      $content = $this->di->fileContent->get('comment.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
          'content' => $content,
      ]);

      if($page==1) {
        $form = new \Anax\HTMLForm\CFormPsWebAddComment();
        $form->setDI($this->di);
        $form->check();

        $this->di->views->add('default/page', [
            'title' => "",
            'content' => $form->getHTML()
        ]);
      }

      if($page==2) {
        $form = new \Anax\HTMLForm\CFormPsWebAddComment2();
        $form->setDI($this->di);
        $form->check();

        $this->di->views->add('default/page', [
            'title' => "",
            'content' => $form->getHTML()
        ]);
      }

      //To Display Header for the written comments
      $content = $this->di->fileContent->get('titleWrittenComments.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
        'content' => $content,
      ]);

      $comments = new \Anax\MVC\CCommentModel();
      $comments->setDI($this->di);

      $all = $comments->findAll($page);

      $this->views->add('comment/comments', [
          'comments' => $all,
          'page' => $page,
      ]);

      //To Display byline
      $byline = $this->di->fileContent->get('byline.md');
      $byline = $this->di->textFilter->doFilter($byline, 'shortcode, markdown');
      $this->di->views->add('me/pagebyline', [
        'byline' => $byline,
      ]);
    }

    /**
    * View all comments.
    *
    * @param $key with comment page.
    *
    * @return void
    */
    public function viewAction($key = null)
    {
        $comments = new \Anax\MVC\CCommentModel();
        $comments->setDI($this->di);

        $all = $comments->findAll($key);

        $this->views->add('comment/comments', [
            'comments' => $all,
            'key' => $key,
        ]);
    }

    /**
    * Add a comment.
    *
    * @return void
    */
    public function addAction()
    {
      $this->di->session();

      $content = $this->di->fileContent->get('comment.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
          'content' => $content,
      ]);

      $comments = new \Anax\MVC\CCommentModel();
      $comments->setDI($this->di);
      $form = new \Anax\HTMLForm\CFormPsWebAddComment();
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
    * Edit a comment.
    *
    * @return void
    */
    public function editAction()
    {
      $this->di->session();

      $content = $this->di->fileContent->get('editComment.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
          'content' => $content,
      ]);

      $comments = new \Anax\MVC\CCommentModel();
      $comments->setDI($this->di);

      $form = new \Anax\HTMLForm\CFormPsWebEditComment($comments->find($_GET['id'],$_GET['pageKey']));
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
   * setup database and add default users.
   *
   * @return array
   */
    public function setupCommentDbAction()
    {
      $this->db->dropTableIfExists('comment')->execute();

      $this->db->createTable(
          'comment',
          [
              'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
              'content' => ['varchar(255)'],
              'name' => ['varchar(80)'],
              'email' => ['varchar(80)'],
              'web' => ['varchar(255)'],
              'timestamp' => ['datetime'],
              'ip' => ['varchar(80)'],
              'page' => ['varchar(10)'],

          ]
      )->execute();

      $this->db->dropTableIfExists('comment2')->execute();

      $this->db->createTable(
          'comment2',
          [
              'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
              'content' => ['varchar(255)'],
              'name' => ['varchar(80)'],
              'email' => ['varchar(80)'],
              'web' => ['varchar(255)'],
              'timestamp' => ['datetime'],
              'ip' => ['varchar(80)'],
              'page' => ['varchar(10)'],

          ]
      )->execute();
      $this->di->session();

      $content = $this->di->fileContent->get('setup_comment_db.md');
      $content = $this->di->textFilter->doFilter($content, 'shortcode, markdown');
      $this->di->views->add('me/pagetitle', [
          'content' => $content,
      ]);

      //To Display byline
      $byline = $this->di->fileContent->get('byline.md');
      $byline = $this->di->textFilter->doFilter($byline, 'shortcode, markdown');
      $this->di->views->add('me/pagebyline', [
        'byline' => $byline,
      ]);

    }
}
