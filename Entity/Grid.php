<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Grid
{
    protected $items;

    protected $paginator;

    protected $filter;

    /**
     * Array of columns.
     * @var Doctrine\Common\Collections\ArrayCollection;
     */
    protected $columns;

    /**
     * Array of batches actions.
     * @var Doctrine\Common\Collections\ArrayCollection;
     */
    protected $batchActions;

    protected $sortedColumn;

    protected $sortedDirection;

    protected $rowIdentifier;

    public function __construct(Paginator $paginator, Filter $filter = null)
    {
        $this->paginator = $paginator;

        if($filter)
            $this->filter = $filter;

        $this->columns = new ArrayCollection();
        $this->batchActions = new ArrayCollection();
        $this->currentPage = 1;
        $this->sortedDirection = 'desc';
    }

    public function prepare()
    {
        $this->filter->prepare();

        $this->paginator->prepare();
        $qb = $this->items = $this->paginator->getQueryBuilder(); 

        if($this->sortedColumn !== null)
            $qb->orderBy($this->columns->get($this->sortedColumn)->getColumnName(), $this->sortedDirection);

        $this->items = $qb->getQuery()->getResult();

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
     * Gets the value of paginator.
     *
     * @return mixed
     */
    public function getPaginator()
    {
        return $this->paginator;
    }

    /**
     * Sets the value of paginator.
     *
     * @param mixed $paginator the paginator
     *
     * @return self
     */
    public function setPaginator($paginator)
    {
        $this->paginator = $paginator;

        return $this;
    }

    /**
     * Gets the value of filter.
     *
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Sets the value of filter.
     *
     * @param mixed $filter the filter
     *
     * @return self
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Gets the Array of columns..
     *
     * @return Doctrine\Common\Collections\ArrayCollection;
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Sets the Array of columns..
     *
     * @param Doctrine\Common\Collections\ArrayCollection; $columns the columns
     *
     * @return self
     */
    public function setColumns(Doctrine\Common\Collections\ArrayCollection $columns)
    {
        $this->columns = $columns;

        return $this;
    }

    public function addColumn($title, $columnName = null, $htmlAttributes = array(), $size = null)
    {
        $column = new Column($title, $columnName, $htmlAttributes, $size);
        $this->columns->add($column);

        return $this;
    }

    public function removeColumn($columnOrName)
    {
        $this->columns->remove($columnOrName);
    }

    /**
     * Gets the Array of batche actions..
     *
     * @return Doctrine\Common\Collections\ArrayCollection;
     */
    public function getBatchActions()
    {
        return $this->batchActions;
    }

    /**
     * Sets the Array of batches actions..
     *
     * @param Doctrine\Common\Collections\ArrayCollection; $batchActions the batches actions
     *
     * @return self
     */
    public function setBatchActions(Doctrine\Common\Collections\ArrayCollection $batchActions)
    {
        $this->batchActions = $batchActions;

        return $this;
    }

    public function addBatchAction($title, $route, $routeParams = array())
    {
        $batch = new BatchAction($title, $route, $routeParams);
        $this->batchActions->add($batch);
    }

    public function removeBatchAction($batchActionOrName)
    {
        $this->batchActions->remove($batchActionOrName);
    }

    /**
     * Gets the value of sortedColumn.
     *
     * @return mixed
     */
    public function getSortedColumn()
    {
        return $this->sortedColumn;
    }

    /**
     * Sets the value of sortedColumn.
     *
     * @param mixed $sortedColumn the sorted column
     *
     * @return self
     */
    public function setSortedColumn($sortedColumn)
    {
        $this->sortedColumn = $sortedColumn;

        return $this;
    }

    /**
     * Gets the value of sortedDirection.
     *
     * @return mixed
     */
    public function getSortedDirection()
    {
        return $this->sortedDirection;
    }

    /**
     * Sets the value of sortedDirection.
     *
     * @param mixed $sortedDirection the sorted direction
     *
     * @return self
     */
    public function setSortedDirection($sortedDirection)
    {
        $this->sortedDirection = $sortedDirection;

        return $this;
    }

    /**
     * Gets the value of currentPage.
     *
     * @return mixed
     */
    public function getCurrentPage()
    {
        $this->paginator->getCurrentPage();
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
        $this->paginator->setCurrentPage($currentPage);

        return $this;
    }

    /**
     * Gets the value of rowIdentifier.
     *
     * @return mixed
     */
    public function getRowIdentifier()
    {
        return $this->rowIdentifier;
    }

    /**
     * Sets the value of rowIdentifier.
     *
     * @param mixed $rowIdentifier the row identifier
     *
     * @return self
     */
    public function setRowIdentifier($rowIdentifier)
    {
        $this->rowIdentifier = $rowIdentifier;

        return $this;
    }
}