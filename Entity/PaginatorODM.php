<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

use TaoSistemas\AjaxGridBundle\Model\PaginatorInterface;
use TaoSistemas\AjaxGridBundle\Model\Paginator;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\MongoDB\Query\Builder;

class PaginatorODM extends Paginator implements PaginatorInterface
{
    protected $eagerCursor = false;

    public function __construct($itemsPerPage = 10, Builder $query = null, $currentPage = 1)
    {
        $this->queryBuilder = null !== $query ? clone $query : null;

        $this->currentPage = $currentPage;
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * Returns the query that will be used to count number of results.
     *
     * @return QueryBuilder
     */
    public function getCountQueryBuilder()
    {
        if ($this->getCustomCountQueryBuilder() !== null)
            return $this->getCustomCountQueryBuilder();

        if (!$this->queryBuilder)
            return null;

        $this->countQueryBuilder = clone $this->queryBuilder;

        return $this->countQueryBuilder->count();
    }

    public function countTotalItems()
    {
        $qb = $this->getCountQueryBuilder();

        if ($qb == null)
            return;

        return $qb->getQuery()->execute();
    }

    public function prepareQueryBuilderForGrid()
    {
        $this->queryBuilder
             ->skip(($this->currentPage - 1) * $this->itemsPerPage)
             ->limit($this->itemsPerPage)
        ;

        if ($this->eagerCursor === true)
            $this->queryBuilder->eagerCursor(true);
    }

    public function getResultingItems($sortedColumn = null, $sortedDirection = null)
    {
        $items = new ArrayCollection();
        $qb = $this->getQueryBuilder();

        if (null !== $qb) {
            if($sortedColumn !== null)
                $qb->sort($sortedColumn->getColumnName(), $sortedDirection);

            $items = $qb->getQuery()->execute();
        }

        return $items;
    }

    /**
     * Gets the value of eagerCursor.
     *
     * @return mixed
     */
    public function getEagerCursor()
    {
        return $this->eagerCursor;
    }

    /**
     * Sets the value of eagerCursor.
     *
     * @param mixed $eagerCursor the eager cursor
     *
     * @return self
     */
    public function setEagerCursor($eagerCursor)
    {
        $this->eagerCursor = $eagerCursor;

        return $this;
    }
}
