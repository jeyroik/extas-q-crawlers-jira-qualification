<?php
namespace extas\components\plugins\quality\crawlers\jira;

use extas\components\plugins\Plugin;
use extas\interfaces\quality\crawlers\jira\qualifications\IJiraQualificationConfiguration as I;

/**
 * Class JiraQualificationConfigPlugin
 *
 * @package extas\components\plugins\quality\crawlers\jira
 * @author jeyroik@gmail.com
 */
class JiraQualificationConfigPlugin extends Plugin
{
    /**
     * @param array $config
     */
    public function __invoke(array &$config)
    {
        $qConfigPath = getenv('EXTAS__Q_JIRA_QUALIFIFCATION_PATH') ?: '';
        if (is_file($qConfigPath)) {
            $qConfig = include $qConfigPath;
            $config[I::FIELD__QUALIFICATION] = $qConfig[I::FIELD__QUALIFICATION] ?? [];
        }
    }
}
