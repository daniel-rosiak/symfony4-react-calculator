<?php

namespace App\Exception;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Helpers\FormError;

/**
 * Class InvalidFormException
 * @package App\Exception
 */
class InvalidFormException extends HttpException
{
    /** @var Form form */
    protected $form;

    /**
     * @var int
     */
    private $statusCode;
    
    /**
     * InvalidFormException constructor.
     *
     * @param $message
     * @param null $form
     * @param array $parameters
     * @param int $statusCode
     */
    public function __construct($message, $form = null, $parameters = [], $statusCode = 400)
    {
        $this->statusCode = $statusCode;
        $this->form = $form;

        parent::__construct($statusCode, $message);
    }

    /**
     * @return array|null
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        $formErrorHelper = new FormError();
        return $formErrorHelper->getFormErrors($this->form);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * 
     */
    public function getHeaders()
    {

    }


}