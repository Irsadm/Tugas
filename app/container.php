<?php
$container = new \Slim\Container;

$container = $app->getContainer();
$container['db'] = function ($c) {
    $setting = $c->get('settings')['db'];
    $config = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'dbname'   => $setting['name'],
        'user'     => $setting['user'],
        'password' => $setting['pass'],
        'host'     => $setting['host'],
        'driver'   => $setting['driver'],
    );
        $connection = \Doctrine\DBAL\DriverManager::getConnection
        ($connectionParams, $config);
        return $connection->createQueryBuilder();

};

$container['view'] = function ($c) {
    $settings = $c->get('settings');

    $view = new Slim\Views\Twig(
        $c->get('settings')['view_path'],
        ['cache' => false]
    );
    $view->addExtension(new Slim\Views\TwigExtension(
    $c->router,
    $c->request->getUri()
    ));
    // $view->addExtension(new Twig_Extension_Debug());
    if (isset($_SESSION['old'])){
        $view->getEnvironment()->addGlobal('old', $_SESSION['old']);
        unset($_SESSION['old']);
    }

    if (isset($_SESSION['errors'])){
        $view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);
        unset($_SESSION['errors']);
    }


    return $view;
};

$container['validation'] = function ($c) {
    $settings = $c->get('settings');
    $param = $c['request']->getParams();
    $lang = $settings['lang'];

    return new \Valitron\Validator($param, [], $lang['default']);
}



 ?>
