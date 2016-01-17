<?php
namespace Anax\HTMLForm;
/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormPsWebAddQuestionresponse extends \Anax\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;
    /**
     * Constructor
     *
     */
     public function __construct()
     {
       parent::__construct([], [
         'responsetext' => [
             'type'        => 'text',
             'label'       => 'Svar:',
             'value'       => '<Svar>',
             'required'    => true,
             'validation'  => ['not_empty'],
         ],

         'Nytt_Svar' => [
             'type'      => 'submit',
               'callback'  => [$this, 'callbackSubmit'],
         ],

         'Rensa_Form' => [
             'type'      => 'reset',
               'callback'  => [$this, 'clearform'],
         ],
        ]);
     }

    /**
     * Customise the check() method.
     *
     * @param callable $callIfSuccess handler to call if function returns true.
     * @param callable $callIfFail    handler to call if function returns true.
     */
    public function check($callIfSuccess = null, $callIfFail = null)
    {
        return parent::check([$this, 'callbackSuccess'], [$this, 'callbackFail']);
    }

    /**
     * Callback for submit-button.
     *
     * @param $form.
     */
    public function callbackSubmit($form)
    {
        $form->AddOutput("<p><i>DoSubmit(): Form was submitted</i></p>");
        return true;
    }

    /**
     * Callback for clearform button.
     *
     * @param $form.
     */
    public function clearform($form)
    {
       $this->redirectTo('index.php/comment');
    }

    /**
     * Callback for submit-button.
     *
     * @param $form.
     */
    public function callbackSubmitFail($form)
    {
        $form->AddOutput("<p><i>DoSubmitFail(): Form was submitted but I failed to process/save/validate it</i></p>");
        return false;
    }

    /**
     * Callback What to do if the form was submitted?
     *
     * @param $form.
     */
    public function callbackSuccess($form)
    {
      $this->users = new \Anax\MVC\CQuestionresponseModel();
      $this->filter = new \Anax\Content\CTextFilter();
      $this->users->setDI($this->di);
      if($_POST['responsetext']=='<Svar>') {
        $this->callbackFail($form);
      }
      else{

        $this->users->saveToDB([

           'responsetext' => $this->filter->markdown($_POST['responsetext']),
       ]);
      // $this->redirectTo('index.php');
      }
    }

    /**
     * Callback What to do when form could not be processed?
     *
     * @param $form.
     */
    public function callbackFail($form)
    {
        $form->AddOutput("<p><i>Incorrect type of input in a field.</i></p>");
        $this->redirectTo();
    }

    /**
     * Redirect to current or another route.
     *
     * @param string $route the route to redirect to,
     * null to redirect to current route, "" to redirect to baseurl.
     *
     * @return void
     */
    public function redirectTo($route = null)
    {
        if (is_null($route)) {
            $url = $this->di->request->getCurrentUrl();
        } else {
            $url = $this->di->url->create($route);
        }
        $this->di->response->redirect($url);
    }
}
