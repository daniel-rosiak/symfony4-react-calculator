<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Operation;
use App\Model\Operation as OperationModel;
use App\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

class OperationForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arguments', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'array']),
                    new AppAssert\ArrayOfNumbers(),
                    new AppAssert\Operation()
                ],
                'required' => true
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => OperationModel::toArray(),
                'constraints' => [
                    new Assert\NotBlank()
                ],
                'required' => true
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Operation::class,
            'constraits'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "form.operation";
    }


}