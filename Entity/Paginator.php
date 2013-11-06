<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

use Doctrine\ORM\QueryBuilder;

class Paginator
{
    protected $queryBuilder;

    protected $countQueryBuilder;

    protected $customCountQueryBuilder;

    protected $countColumn;

    protected $pages;

    protected $items;

    protected $itemsPerPage;

    protected $currentPage;

    protected $currentPageGroupFirst;

    protected $currentPageGroupLast;

    public function __construct(QueryBuilder $query = null, $countColumn = null, $currentPage = 1, $itemsPerPage = 5)
    {
        $this->queryBuilder = clone $query;

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
        if($this->getCustomCountQueryBuilder() !== null)
            return $this->getCustomCountQueryBuilder();

        $this->countQueryBuilder = clone $this->queryBuilder;

        if($this->countColumn === null)
            $countColumn = $this->queryBuilder->getRootAlias();
        else
            $countColumn = $this->countColumn;

        return $this->countQueryBuilder->select("count($countColumn)");
    }

    public function generatePaginator()
    {
        $qb = $this->getCountQueryBuilder();

        $this->items = $qb->getQuery()->getSingleScalarResult();

        $this->pages = intval( $this->items / $this->itemsPerPage ) + 1;

        $this->currentPageGroupFirst = max( 1, $this->currentPage - 5);
        $this->currentPageGroupLast = min( $this->pages, $this->currentPage + 5 );

        $this->queryBuilder->setFirstResult(($this->currentPage - 1) * $this->itemsPerPage)
                    ->setMaxResults($this->itemsPerPage)
        ;
    }


    /**
     * Gets the value of query.
     *
     * @return mixed
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    /**
     * Sets the value of query.
     *
     * @param mixed $query the query
     *
     * @return self
     */
    public function setQueryBuilder(QueryBuilder $query)
    {
        $this->queryBuilder = $query;

        return $this;
    }

    /**
     * Gets the value of customCountQuery.
     *
     * @return mixed
     */
    public function getCustomCountQueryBuilder()
    {
        return $this->customCountQueryBuilder;
    }

    /**
     * Sets the value of customCountQuery.
     *
     * @param mixed $customCountQuery the custom query
     *
     * @return self
     */
    public function setCustomCountQueryBuilder(QueryBuilder $query)
    {
        $this->customCountQueryBuilder = $query;

        return $this;
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

    /**
     * Gets the value of pages.
     *
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Sets the value of pages.
     *
     * @param mixed $pages the pages
     *
     * @return self
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Gets the value of items.
     *
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets the value of items.
     *
     * @param mixed $items the items
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Gets the value of itemsPerPage.
     *
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * Sets the value of itemsPerPage.
     *
     * @param mixed $itemsPerPage the items per page
     *
     * @return self
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    /**
     * Gets the value of currentPage.
     *
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Sets the value of currentPage.
     *
     * @param mixed $currentPage the current page
     *
     * @return self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * Gets the value of currentPageGroupFirst.
     *
     * @return mixed
     */
    public function getCurrentPageGroupFirst()
    {
        return $this->currentPageGroupFirst;
    }

    /**
     * Sets the value of currentPageGroupFirst.
     *
     * @param mixed $currentPageGroupFirst the current page group first
     *
     * @return self
     */
    public function setCurrentPageGroupFirst($currentPageGroupFirst)
    {
        $this->currentPageGroupFirst = $currentPageGroupFirst;

        return $this;
    }

    /**
     * Gets the value of currentPageGroupLast.
     *
     * @return mixed
     */
    public function getCurrentPageGroupLast()
    {
        return $this->currentPageGroupLast;
    }

    /**
     * Sets the value of currentPageGroupLast.
     *
     * @param mixed $currentPageGroupLast the current page group last
     *
     * @return self
     */
    public function setCurrentPageGroupLast($currentPageGroupLast)
    {
        $this->currentPageGroupLast = $currentPageGroupLast;

        return $this;
    }
}
