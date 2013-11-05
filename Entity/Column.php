<?php

namespace TaoSistemas\AjaxGridBundle\Entity;

class Column
{
    protected $name;

    protected $title;

    protected $sortable;

    protected $htmlAttributes;

    public function __construct($name, $title, $sortable = true, $htmlAttributes = array())
    {
        $this->name = $name;
        $this->title = $title;
        $this->sortable = $sortable;
        $this->htmlAttributes = $htmlAttributes;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of sortable.
     *
     * @return mixed
     */
    public function getSortable()
    {
        return $this->sortable;
    }

    /**
     * Sets the value of sortable.
     *
     * @param mixed $sortable the sortable
     *
     * @return self
     */
    public function setSortable($sortable)
    {
        $this->sortable = $sortable;

        return $this;
    }

    /**
     * Gets the value of htmlAttributes.
     *
     * @return mixed
     */
    public function getHtmlAttributes()
    {
        return $this->htmlAttributes;
    }

    /**
     * Sets the value of htmlAttributes.
     *
     * @param mixed $htmlAttributes the html attributes
     *
     * @return self
     */
    public function setHtmlAttributes($htmlAttributes)
    {
        $this->htmlAttributes = $htmlAttributes;

        return $this;
    }
}
