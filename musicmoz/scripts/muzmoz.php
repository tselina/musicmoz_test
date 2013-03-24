<?php



// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
//// Define application environment
//defined('APPLICATION_ENV')
//    || define('APPLICATION_ENV',
//(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

$base = dirname(dirname(realpath(__FILE__)));
require_once($base . '/common.php');
//require('common.php');
//var_dump(set_include_path(implode(PATH_SEPARATOR, array(
//    realpath(APPLICATION_PATH . '/../../library'),
//    get_include_path(),
//))));
//
//require_once 'Zend/Loader/Autoloader.php';
//Zend_Loader_Autoloader::getInstance();

//define('APPLICATION_PATH',realpath(dirname(__FILE__) . '/../application'));
define('APPLICATION_ENV', 'development');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPLICATION_PATH . '/../library'));


try {
    $opts = new Zend_Console_Getopt(array(
        'date|d=s' => 'date for the releases included into the selection',
        'url|u=s'  => 'url for the XML file',
    ));
    $options = $opts->parse();
} catch (Zend_Console_Getopt_Exception $e) {
    echo $e->getUsageMessage();
    exit();
}

$dateParameter = $opts->getOption('date');
$urlParameter  = $opts->getOption('url');

///** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
$application->bootstrap()->run();

