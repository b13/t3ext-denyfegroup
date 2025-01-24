<?php

defined('TYPO3') or	die();

// hook into enable columns to check for group deny restrictions
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_page.php']['addEnableColumns']['denyfegroup']
    = \B13\DenyFeGroup\Hooks\DenyFeGroup::class . '->addEnableColumn';
