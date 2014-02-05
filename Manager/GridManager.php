<?php

namespace TaoSistemas\AjaxGridBundle\Manager;

use TaoSistemas\AjaxGridBundle\Entity\Paginator;
use TaoSistemas\AjaxGridBundle\Entity\Filter;
use TaoSistemas\AjaxGridBundle\Entity\Grid;

class GridManager
{
    protected $itemsPerPage = null;

    public function __construct($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function newGrid($query = null)
    {
        $paginator = new Paginator($this->itemsPerPage, $query);
        $filter = new Filter();

        $grid = new Grid($paginator, $filter);

        return $grid;
    }
}