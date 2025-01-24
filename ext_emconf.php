<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "denyfegroup".
 *
 * Auto generated 08-12-2013 12:40
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Deny Usergroup Access',
	'description' => 'Explicitly denies a page or content to a certain usergroup.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '1.0.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'TYPO3_version' => '',
	'PHP_version' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'constraints' => [
		'depends' => [
			'typo3' => '12.4.0-12.9.99',
		],
		'conflicts' => [],
		'suggests' => [],
	],
	'author' => 'Benjamin Mack',
	'author_email' => 'typo3@b13.de',
	'author_company' => 'b:dreizehn GmbH',
	'CGLcompliance' => NULL,
	'CGLcompliance_note' => NULL,
];
