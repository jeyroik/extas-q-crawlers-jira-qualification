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
    protected string $selfUID = JiraIssuesIndex::FIELD__MONTH;
    protected string $selfRepositoryClass = IJiraIssuesIndexRepository::class;
    protected string $selfSection = 'jira_qualification_issues_index';
    protected string $selfName = 'jira qualification issues index';
    protected string $selfItemClass = JiraIssuesIndex::class;
}
