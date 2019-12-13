<?php

declare(strict_types=1);

namespace App\Model\Product\Filter;

/**
 * Class GetFilter.
 */
class GetFilter
{
    /**
     * @var integer $page Page.
     */
    public $page;

    /**
     * @var integer $limit Limit.
     */
    public $limit;

    /**
     * GetFilter constructor.
     *
     * @param integer $page  Page.
     * @param integer $limit Limit.
     */
    public function __construct(int $page, int $limit)
    {
        $this->page = $page;
        $this->limit = $limit;
    }
}