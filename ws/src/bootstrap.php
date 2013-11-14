<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/lib/tcpdf/tcpdf.php';
require_once __DIR__.'/../vendor/lib/mytcpdf.php';


use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

// Repository per DB
use Repository\UtenteRepository;
use Repository\OrarioRepository;
use Repository\AccessoRepository;

$env = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development';
$ini_config = parse_ini_file(__DIR__.'/config.ini', TRUE);
$config = $ini_config[$env];

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates',
    'twig.options' => array('cache' => __DIR__.'/../cache'),
));

$app->register(new DoctrineServiceProvider);
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

$app['db.options'] = array(
    'driver'   => $config['db.driver'],
    'dbname'   => $config['db.dbname'],
    'host'     => $config['db.host'],
    'user'     => $config['db.user'],
    'password' => $config['db.password'],
);

// DB TABLE
$app->before(function() use ($app) {
    $app['db.utente'] = $app->share(function($app) {
        return new UtenteRepository($app['db']);
    });
    $app['db.orario'] = $app->share(function($app) {
        return new OrarioRepository($app['db']);
    });
    $app['db.accesso'] = $app->share(function($app) {
        return new AccessoRepository($app['db']);
    });

    $app['mapping_mese_string'] = array(
    'january' => 'Gennaio',
    'february' => 'Febbraio',
    'march' => 'Marzo',
    'april' => 'Aprile',
    'may' => 'Maggio',
    'june' => 'Giugno',
    'july' => 'Luglio',
    'august' => 'Agosto',
    'september' => 'Settembre',
    'october' => 'Ottobre',
    'november' => 'Novembre',
    'december' => 'Dicembre');
});



return $app;