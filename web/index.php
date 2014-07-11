<?php 
define('DS', DIRECTORY_SEPARATOR);

require_once realpath(__DIR__.DS.'..'.DS.'vendor'.DS.'autoload.php');
require_once realpath(__DIR__.DS.'base.php');

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => realpath(__DIR__.'/views'),
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'blog',
        'host'   => 'localhost',
        'user'   => 'root',
        'password'   => '',
        'charset'   => 'utf8',
    ),
));

$app['debug'] = true;

$defaultValues = Base::getDefaultValues($app);

$app->get('/', function () use ($app, $defaultValues) {
    $sql = "SELECT * FROM post ORDER BY created DESC LIMIT 0,10";
    $posts = $app['db']->fetchAll($sql);
    
    $defaultValues['posts'] = $posts;
    
    return $app['twig']->render('home.twig', $defaultValues);
});

$app->get('/post/{id}', function ($id) use ($app, $defaultValues) {
    $sql = "SELECT * FROM post WHERE id = ?";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));
    
    $defaultValues['post'] = $post;
    
    return $app['twig']->render('post.twig', $defaultValues);
});

$app->get('/archive/{year}/{month}', function ($year, $month) use ($app, $defaultValues) {
    $sql = "SELECT * FROM post WHERE year = ? AND month = ? ORDER BY created DESC";
    $posts = $app['db']->fetchAll($sql, array((int) $year, (int) $month));
    
    $defaultValues['posts'] = $posts;
    $defaultValues['month_name'] = Base::getMonthName($month);
    $defaultValues['year'] = $year;
    
    return $app['twig']->render('archive.twig', $defaultValues);
});

$app->run();