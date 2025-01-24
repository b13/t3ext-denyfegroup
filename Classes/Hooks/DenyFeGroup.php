<?php

declare(strict_types=1);

namespace B13\DenyFeGroup\Hooks;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DenyFeGroup
{
    private const FIELD_NAME = 'fe_group_deny';

    public function addEnableColumn(array $params, PageRepository $pageRepository): string
    {
        $sql = '';
        if ($params['table'] == 'pages' || $params['table'] == 'tt_content') {
            /** @var Context $context */
            $context = GeneralUtility::makeInstance(Context::class);
            $userGroupIds = $context->getPropertyFromAspect('frontend.user', 'groupIds');
            if (count($userGroupIds)) {
                $sql = $this->getMultipleGroupsWhereClause(
                    $userGroupIds,
                    $params['table']
                );
            }
        }
        return $sql;
    }

    protected function getMultipleGroupsWhereClause(
        array $groupIds,
        string $table
    ): string {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);

        $andChecks = [];
        foreach ($groupIds as $value) {
            $andChecks[] = $queryBuilder->expr()->notInSet(self::FIELD_NAME, $queryBuilder->quote($value));
        }

        return (string)$queryBuilder->expr()->or(
            // if the field is empty or 0 then OK
            $queryBuilder->expr()->eq(self::FIELD_NAME, $queryBuilder->quote('')),
            $queryBuilder->expr()->eq(self::FIELD_NAME, $queryBuilder->quote('0')),
            // if none of the selected groups are present, OK as well
            $queryBuilder->expr()->and(
                ...$andChecks
            )
        );
    }
}
