<?php

set_include_path(get_include_path() . PATH_SEPARATOR . "/var/www/html");
require_once "include/utils/utils.php";
require_once "/var/www/html/Workflow2.php";
require_once "/var/www/html/WfManager.php";
require_once "/var/www/html/VtUtils.php";
require_once "/var/www/html/WfUtils.php";
require_once "/var/www/html/lib/Workflow/EntityDelta.php";
require_once "/var/www/html/lib/Workflow/Task.php";
require_once "/var/www/html/lib/Workflow/Main.php";
require_once "/var/www/html/lib/Workflow/Queue.php";
require_once "/var/www/html/lib/Workflow/VTEntity.php";
require_once "/var/www/html/lib/Workflow/VTInventoryEntity.php";
require_once "/var/www/html/lib/Workflow/Execute.php";
if (version_compare(phpversion(), "5.3.0", ">")) {
    require_once "/var/www/html/lib/Workflow/Scheduler.php";
}
require_once "/var/www/html/VTConditionCheck.php";
require_once "/var/www/html/WfMain.php";
require_once "/var/www/html/VTEntity.php";
require_once "/var/www/html/VTInventoryEntity.php";
require_once "/var/www/html/VTWfExpressionParser.php";
require_once "/var/www/html/VTTemplate.php";
