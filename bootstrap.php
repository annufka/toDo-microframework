<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    'src/Models',
];
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'database',
    'user'     => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PASS'),
    'dbname'   => getenv('MYSQL_DB_NAME'),
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
global $entityManager;
$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager(): EntityManager {
    global $entityManager;
    return $entityManager;
}