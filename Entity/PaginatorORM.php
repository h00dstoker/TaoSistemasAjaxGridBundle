<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

use TaoSistemas\AjaxGridBundle\Model\PaginatorInterface;
use TaoSistemas\AjaxGridBundle\Model\Paginator;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Collections\ArrayCollection;

class PaginatorORM extends Paginator implements PaginatorInterface
{
    protected $countColumn;

    public function __construct($itemsPerPage = 10, QueryBuilder $query = null, $countColumn = null, $currentPage = 1)
    {
        $this->queryBuilder = $query ? clone $query : null;

        if($countColumn !== null)
            $this->countColumn = $countColumn;

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

        if ( ! $this->queryBuilder ) return null;

        $this->countQueryBuilder = clone $this->queryBuilder;

        if($this->countColumn === null)
            $countColumn = $this->queryBuilder->getRootAlias();
        else
            $countColumn = $this->countColumn;

        return $this->countQueryBuilder->select("count( distinct $countColumn)");
    }

    public function countTotalItems()
    {
        $qb = $this->getCountQueryBuilder();

        if ($qb == null)
            return;

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function prepareQueryBuilderForGrid()
    {
        $this->queryBuilder
             ->setFirstResult(($this->currentPage - 1) * $this->itemsPerPage)
             ->setMaxResults($this->itemsPerPage)
        ;
    }

    public function getResultingItems($sortedColumn = null, $sortedDirection = null)
    {
        $items = new ArrayCollection();
        $qb = $this->getQueryBuilder();

        if (null !== $qb) {
            if( ! empty($sortedColumn) && $sortedColumn->getColumnName() !== null && $sortedDirection !== null)
                $qb->orderBy($sortedColumn->getColumnName(), $sortedDirection);

            $items = $qb->getQuery()->getResult();
        }

        return $items;
    }

    /**
     * Gets the value of countColumn.
     *
     * @return mixed
     */
    public function getCountColumn()
    {
        return $this->countColumn;
    }

    /**
     * Sets the value of countColumn.
     *
     * @param mixed $countColumn the count column
     *
     * @return self
     */
    public function setCountColumn($countColumn)
    {
        $this->countColumn = $countColumn;

        return $this;
    }
}
