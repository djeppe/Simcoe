<?php
//
// PHASE: BOOTSTRAP
// Initiating phase.
define('SIMCOE_INSTALL_PATH', dirname(__FILE__));
define('SIMCOE_SITE_PATH', SIMCOE_INSTALL_PATH . '/site');

require(SIMCOE_INSTALL_PATH.'/src/CSimcoe/bootstrap.php');

$sim = CSimcoe::GetInstance();

//
// PHASE: FRONTCONTROLLER ROUTE
// Which controller to use?
$sim->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
// Create end result.
$sim->ThemeEngineRender();

?>