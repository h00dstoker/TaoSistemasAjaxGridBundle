<?php

namespace TaoSistemas\AjaxGridBundle\Manager;

use TaoSistemas\AjaxGridBundle\Entity\PaginatorORM;
use TaoSistemas\AjaxGridBundle\Entity\PaginatorODM;
use TaoSistemas\AjaxGridBundle\Entity\Filter;
use TaoSistemas\AjaxGridBundle\Entity\Grid;

class GridManager
{
    protected $itemsPerPage;
    protected $defaultPaginator;

    public function __construct($itemsPerPage, $defaultPaginator)
    {
        $this->itemsPerPage = $itemsPerPage;
        $this->defaultPaginator = $defaultPaginator;
    }

    public function newGrid($query = null)
    {
        switch ($this->defaultPaginator) {
            case 'odm':
                return $this->newODMGrid($query);
                break;

            case 'orm':
            default:
                return $this->newORMGrid($query);
                break;
        }
    }

    public function newORMGrid($query = null)
    {
        $paginator = new PaginatorORM($this->itemsPerPage, $query);
        $filter = new Filter();

        $grid = new Grid($paginator, $filter);

        return $grid;
    }

    public function newODMGrid($query = null)
    {
        $paginator = new PaginatorODM($this->itemsPerPage, $query);
        $filter = new Filter();

        $grid = new Grid($paginator, $filter);

        return $grid;
    }
}