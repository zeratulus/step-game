    <?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:14
 */

ini_set('display_errors', 1);

require_once 'startup.php';
require_once 'helper.php';

$app = new GameSystem\Application();

define('APP_DEBUG', $app->isDebug);

$app->router->getRoute($app->request);
