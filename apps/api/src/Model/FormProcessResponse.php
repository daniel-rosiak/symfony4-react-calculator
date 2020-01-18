<?php

namespace App\Model;

use Symfony\Component\Form\Form;

/**
 * Class FormProcessResponse
 * @package App\Core\Handler\Object
 */
class FormProcessResponse
{
    /** @var  mixed */
    private $item;

    /** @var  Form */
    private $form;

    /**
     * FormProcessResponse constructor.
     * @param Form $form
     * @param object|null $item
     */
    public function __construct(Form $form, $item = null)
    {
        $this->form = $form;
        $this->item = $item;
    }

    /**
     * Get item
     *
     * @return object|null
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set item
     *
     * @param object|null $item
     * @return FormProcessResponse
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * Get form
     *
     * @return Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set form
     *
     * @param Form $form
     * @return FormProcessResponse
     */
    public function setForm(Form $form) : FormProcessResponse
    {
        $this->form = $form;
        return $this;
    }

    /**
     * Check if item is instance of specific class
     *
     * @param $entityClass
     *
     * @return bool
     */
    public function isItemHasClass($entityClass) : bool
    {
        if (!empty($this->item) && $this->item instanceof $entityClass) {
            return true;
        }

        return false;
    }

    /**
     * Check is not empty item
     *
     * @return bool
     */
    public function isItem() : bool
    {
        if (!empty($this->item)) {
            return true;
        }

        return false;
    }

}