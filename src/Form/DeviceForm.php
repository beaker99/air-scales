<?php

namespace App\Form;

use App\Entity\Device;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeviceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serial_number')
            ->add('mac_address')
            ->add('entity_type')
            ->add('firmware_version')
            ->add('notes')
            ->add('order_date')
            ->add('ship_date')
            ->add('tracking_id')
            ->add('sold_to', EntityType::class, [
                'class' => User::class,
                'required'=> false,
                'choice_label' => 'email',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Device::class,
        ]);
    }
}
