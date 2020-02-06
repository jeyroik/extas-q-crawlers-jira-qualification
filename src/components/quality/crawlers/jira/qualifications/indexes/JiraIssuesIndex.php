<?php
namespace extas\components\quality\crawlers\jira\qualifications\indexes;

use extas\components\Item;
use extas\components\SystemContainer;
use extas\interfaces\quality\crawlers\jira\IJiraIssue;
use extas\interfaces\quality\crawlers\jira\qualifications\indexes\IJIraIssuesIndex;
use extas\interfaces\quality\crawlers\jira\qualifications\indexes\IJiraIssuesIndexRepository;

/**
 * Class JiraIssuesIndex
 *
 * @package extas\components\quality\crawlers\jira\qualifications\indexes
 * @author jeyroik@gmail.com
 */
class JiraIssuesIndex extends Item implements IJIraIssuesIndex
{
    /**
     * @return IJIraIssuesIndex
     */
    public function commit(): IJIraIssuesIndex
    {
        /**
         * @var $repo IJiraIssuesIndexRepository
         */
        $repo = SystemContainer::getItem(IJiraIssuesIndexRepository::class);
        $this->setTimestamp(time());
        $repo->update($this);

        return $this;
    }

    /**
     * @param string $issueKey
     *
     * @return bool
     */
    public function hasIssue(string $issueKey): bool
    {
        $issues = $this->getIssues();

        return isset($issues[$issueKey]);
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->config[static::FIELD__MONTH] ?? 0;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->config[static::FIELD__TIMESTAMP] ?? 0;
    }

    /**
     * @return array
     */
    public function getIssues(): array
    {
        return $this->config[static::FIELD__ISSUES] ?? [];
    }

    /**
     * @param int $month
     *
     * @return IJIraIssuesIndex
     */
    public function setMonth(int $month): IJIraIssuesIndex
    {
        $this->config[static::FIELD__MONTH] = $month;

        return $this;
    }

    /**
     * @param IJiraIssue $issue
     *
     * @return IJIraIssuesIndex
     */
    public function addIssue(IJiraIssue $issue): IJIraIssuesIndex
    {
        $issues = $this->getIssues();
        $issues[$issue->getKey()] = true;
        $this->setIssues($issues);

        return $this;
    }

    /**
     * @param int $timestamp
     *
     * @return IJIraIssuesIndex
     */
    public function setTimestamp(int $timestamp): IJIraIssuesIndex
    {
        $this->config[static::FIELD__TIMESTAMP] = $timestamp;

        return $this;
    }

    /**
     * @param array $items
     *
     * @return IJIraIssuesIndex
     */
    public function setIssues(array $items): IJIraIssuesIndex
    {
        $this->config[static::FIELD__ISSUES] = $items;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
