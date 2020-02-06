<?php
namespace extas\components\plugins;

use extas\components\quality\crawlers\jira\qualifications\indexes\JiraIssuesIndex;
use extas\interfaces\quality\crawlers\jira\qualifications\indexes\IJiraIssuesIndexRepository;

/**
 * Class PluginInstallJiraQualificationIssuesIndex
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallJiraQualificationIssuesIndex extends PluginInstallDefault
{
    protected $selfUID = JiraIssuesIndex::FIELD__MONTH;
    protected $selfRepositoryClass = IJiraIssuesIndexRepository::class;
    protected $selfSection = 'jira_qualification_issues_index';
    protected $selfName = 'jira qualification issues index';
    protected $selfItemClass = JiraIssuesIndex::class;
}
