<?php

namespace App\Form;

use App\Entity\CalibrationPoint;
use App\Entity\Device;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalibrationPointForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('airPressure')
            ->add('temperature')
            ->add('axleWeight')
            ->add('device', EntityType::class, [
                'class' => Device::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CalibrationPoint::class,
        ]);
    }
}
