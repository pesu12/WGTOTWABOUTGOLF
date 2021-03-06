<?php
namespace Anax\HTMLForm;
/**
 * Anax base class for wrapping sessions.
 *
 */
class CFormAdminEditUser extends \Anax\HTMLForm\CForm
{
    use \Anax\DI\TInjectionaware,
        \Anax\MVC\TRedirectHelpers;
    /**
     * Constructor
     *
     * @param array $comment with all details.
     */
     public function __construct($adminuser)
     {
       parent::__construct([], [
         'name' => [
             'type'        => 'text',
             'label'       => 'Namn:',
             'value'       => $adminuser->name,
             'required'    => true,
             'validation'  => ['not_empty'],
         ],

         'email' => [
             'type'        => 'text',
             'label'       => 'Epost-adress:',
             'value'       => $adminuser->email,
             'required'    => true,
            'validation'  => ['not_empty', 'email_adress'],
         ],

         'acronym' => [
             'type'        => 'text',
             'label'       => 'Användarnamn:',
             'value'       => $adminuser->acronym,
             'required'    => true,
             'validation'  => ['not_empty'],
         ],

         'password' => [
             'type'        => 'text',
             'label'       => 'Lösenord:',
             'value'       => $adminuser->password,
             'required'    => true,
             'validation'  => ['not_empty'],
         ],

         'Uppdatera' => [
             'type'      => 'submit',
               'callback'  => [$this, 'callbackSubmit'],
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
      $this->users = new \Anax\Admin\Admin();
      $this->users->setDI($this->di);
      $now = gmdate('Y-m-d H:i:s');
       $this->users->saveToDB([
         'name' => $_POST['name'],
         'email' => $_POST['email'],
         'acronym' => $_POST['acronym'],
         'password' => $_POST['password'],
         'created' => $now,
         'active' => $now,
         'id' => $_GET['id'],
       ]);
         $this->redirectTo('index.php/admin/id/'.$_GET['id']);
    }

    /**
     * Callback What to do when form could not be processed?
     *
     * @param $form.
     */
    public function callbackFail($form)
    {
        $form->AddOutput("<p><i>Incorrect type of input in a field, see detailed info under the field that was incorrect.</i></p>");
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
