<?php

namespace ArrowebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class ReferenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', TextType::class)
        ->add('description', TextareaType::class)
        ->add('statut', ChoiceType::class, array(
                'choices' => array('En ligne' => 'En ligne', 'Hors ligne' => 'Hors ligne'),
                'expanded' => true,
                'multiple' => false
                ))
        ->add('url', TextType::class)
        ->add('annee', TextType::class)
        ->add('picture', PictureType::class, array('required' => false))
        ->add('thumbnail', ThumbnailType::class, array('required' => false))
        ->add('save', SubmitType::class, array('label' => 'Valider')
        );

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ArrowebBundle\Entity\Reference'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'arrowebbundle_reference';
    }


}
