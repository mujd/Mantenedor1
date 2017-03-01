<?php

namespace ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClienteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut', TextType::class)
            ->add('nombres', TextType::class)
            ->add('apellidop', TextType::class, array('label'=>'Apellido Paterno'))
            ->add('apellidom', TextType::class, array('label'=>'Apellido Materno'))
            ->add('direccion', TextType::class)
            ->add('email', EmailType::class)
            ->add('fono', TextType::class)
                
            ->add('Guardar', SubmitType::class)
               
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClienteBundle\Entity\Cliente'
        ));
    }
}
