<?php

declare(strict_types=1);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    [
        'fe_group_deny' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:denyfegroup/Resources/Private/Language/locallang_db.xlf:fe_group_deny',
            'config' => $GLOBALS['TCA']['pages']['columns']['fe_group']['config'],
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'fe_group_deny',
    '',
    'after:fe_group'
);
