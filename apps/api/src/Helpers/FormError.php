<?php

namespace App\Helpers;

use Symfony\Component\Form\Form;

/**
 * Class FormError
 * @package App\Helper
 */
class FormError
{
    /**
     * Ger all error from form
     *
     * @param Form $form
     * @return array
     */
    public function getFormErrors(Form $form): array
    {
        $errors = [];

        if ($form instanceof Form) {
            foreach ($form->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }

            foreach ($form->all() as $key => $child) {
                /** @var $child Form */
                if ($err = $this->getFormErrors($child)) {
                    $errors[$key] = $err;
                }
            }
        }

        return $errors;
    }
}
