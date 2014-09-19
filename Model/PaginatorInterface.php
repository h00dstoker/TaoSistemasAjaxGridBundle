<?php

namespace TaoSistemas\AjaxGridBundle\Model;

use Doctrine\ORM\QueryBuilder;

interface PaginatorInterface
{
    /**
     * Prepare the paginator to be rendered.
     * @return void
     */
    public function prepare();

    /**
     * Gets the value of pages.
     *
     * @return mixed
     */
    public function getPages();

    /**
     * Sets the total number of pages.
     *
     * @param mixed $pages the pages
     *
     * @return self
     */
    public function setPages($pages);

    /**
     * Gets the total of results items.
     *
     * @return integer
     */
    public function getItems();

    /**
     * Sets the total of results items.
     *
     * @param integer $items the items
     *
     * @return self
     */
    public function setItems($items);

    /**
     * Gets the total of items showed per page.
     *
     * @return integer
     */
    public function getItemsPerPage();

    /**
     * Sets the total of items showed per page.
     *
     * @param integer $itemsPerPage the items per page
     *
     * @return self
     */
    public function setItemsPerPage($itemsPerPage);

    /**
     * Gets the number of the current page.
     *
     * @return integer
     */
    public function getCurrentPage();

    /**
     * Sets the number of the current page.
     *
     * @param integer $currentPage the current page
     *
     * @return self
     */
    public function setCurrentPage($currentPage);

    /**
     * Gets the value of currentPageGroupFirst.
     *
     * @return integer
     */
    public function getCurrentPageGroupFirst();

    /**
     * Sets the value of currentPageGroupFirst.
     *
     * @param integer $currentPageGroupFirst the current page group first
     *
     * @return self
     */
    public function setCurrentPageGroupFirst($currentPageGroupFirst);

    /**
     * Gets the value of currentPageGroupLast.
     *
     * @return integer
     */
    public function getCurrentPageGroupLast();

    /**
     * Sets the value of currentPageGroupLast.
     *
     * @param integer $currentPageGroupLast the current page group last
     *
     * @return self
     */
    public function setCurrentPageGroupLast($currentPageGroupLast);
}
