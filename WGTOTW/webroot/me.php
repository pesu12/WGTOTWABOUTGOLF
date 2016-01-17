<?php
/**
 * This is a Anax pagecontroller.
 *
 */

// Get environment & autoloader.
require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$di->set('form', '\Anax\HTMLForm\CForm');

$di->set('FirstpageController', function() use ($di) {
    $controller = new \Anax\Firstpage\FirstpageController();
    $controller->setDI($di);
    return $controller;
});

$di->set('FormController', function () use ($di) {
    $controller = new \Anax\HTMLForm\FormController();
    $controller->setDI($di);
    return $controller;
});
$di->set('FormSmallController', function () use ($di) {
    $controller = new \Anax\HTMLForm\FormSmallController();
    $controller->setDI($di);
    return $controller;
});

$di->setShared('db', function() {
    $db = new \Anax\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});

$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$di->set('SetupController', function() use ($di) {
    $controller = new \Anax\Users\SetupController();
    $controller->setDI($di);
    return $controller;
});

$di->set('AdminController', function() use ($di) {
    $controller = new \Anax\Admin\AdminController();
    $controller->setDI($di);
    return $controller;
});

$di->set('QuestionController', function() use ($di) {
    $controller = new \Anax\Question\QuestionController();
    $controller->setDI($di);
    return $controller;
});

$di->set('QuestionresponseController', function() use ($di) {
    $controller = new \Anax\Question\QuestionresponseController();
    $controller->setDI($di);
    return $controller;
});


$di->set('TagController', function() use ($di) {
    $controller = new \Anax\Tag\TagController();
    $controller->setDI($di);
    return $controller;
});


//For the first page
$app->router->add('', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'firstpage',
  'action'         => 'index',
  'params'        => [],
  ]);

});


//For the question page
$app->router->add('question', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'question',
  'action'         => 'index',
  'params'        => [],
  ]);
});

//For the Questionresponse page
$app->router->add('questionresponse', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'questionresponse',
  'action'         => 'index',
  'params'        => [],
  ]);
});

//For the Comment page
$app->router->add('comment', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'comment',
  'action'         => 'index',
  'params'        => ['comment'],
  ]);
});

//For the admin login register page
$app->router->add('admin', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'admin',
  'action'         => 'index',
  'params'        => [],
  ]);
});

$app->router->add('users', function() use ($app) {

  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'users',
  'action'         => 'index',
  'params'        => [],
  ]);
});

$app->router->add('userdbsetup', function() use ($app) {
  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'admin',
  'action'         => 'setup',
  'params'        => [],
  ]);
});

$app->router->add('questiondbsetup', function() use ($app) {
  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'question',
  'action'         => 'setup',
  'params'        => [],
  ]);
});

$app->router->add('tagdbsetup', function() use ($app) {
  $app->theme->addStylesheet('css/anax-grid/style.php');
  $app->dispatcher->forward([
  'controller'    => 'tag',
  'action'         => 'setup',
  'params'        => [],
  ]);
});

//For the about page
$app->router->add('about', function() use ($app) {
      $app->theme->addStylesheet('css/anax-grid/style.php');
      $app->theme->setTitle("Om WGTOTW");
      $content = $app->fileContent->get('about.md');
      $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
      $byline = $app->fileContent->get('byline.md');
      $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
      $app->views->add('me/page', [
          'content' => $content,
          'byline' => $byline,
      ]);
});

$app->router->handle();
$app->theme->render();
