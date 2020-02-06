<?php
namespace extas\components\quality\crawlers\jira\qualifications\indexes;

use extas\components\repositories\Repository;
use extas\interfaces\quality\crawlers\jira\qualifications\indexes\IJiraIssuesIndexRepository;

/**
 * Class JiraIssuesIndexRepository
 *
 * @package extas\components\quality\crawlers\jira\qualifications\indexes
 * @author jeyroik@gmail.com
 */
class JiraIssuesIndexRepository extends Repository implements IJiraIssuesIndexRepository
{
    protected $itemClass = JiraIssuesIndex::class;
    protected $name = 'jira_qualification__issues_indexes';
    protected $pk = JiraIssuesIndex::FIELD__MONTH;
    protected $scope = 'extas';
    protected $idAs = '';
}
