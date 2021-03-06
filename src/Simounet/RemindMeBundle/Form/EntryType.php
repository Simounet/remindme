<?php

namespace Simounet\RemindMeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('who', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Julie'
                )
            ))
            ->add('what', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'A ring'
                )
            ))
            ->add('type', TextType::class, array(
                'label' => 'Occasion',
                'attr' => array(
                    'placeholder' => 'Gift'
                )
            ))
            ->add('date', null, array(
                'label' => 'When',
                'attr' => array(
                    'class' => 'form-date'
                )
            ))
            ->add('submit', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Simounet\RemindMeBundle\Entity\Entry'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'simounet_remindmebundle_entry';
    }


}
