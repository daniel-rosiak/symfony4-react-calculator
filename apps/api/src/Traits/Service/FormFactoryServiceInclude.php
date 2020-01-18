<?php

namespace App\Traits\Service;

use Symfony\Component\Form\FormFactoryInterface;

trait FormFactoryServiceInclude
{
    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @required
     * @param FormFactoryInterface $formFactory
     */
    public function setFormFactory(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }
}