<?php

namespace ArrowebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('attr' => array('placeholder' => 'Votre nom'), 
                'required' => false,
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de renseigner votre nom")),
                )
            ))
            ->add('subject', TextType::class, array('attr' => array('placeholder' => 'Société ou organisme'), 'required' => false
                
            ))
            ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Votre adresse e-mail'),
                'required' => false,
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de renseigner votre e-mail")),
                    new Email(array("message" => "Votre e-mail semble ne pas être valide")),
                )
            ))
            ->add('message', TextareaType::class, array('attr' => array('placeholder' => 'Parlez moi de votre projet ou besoin'),
                'required' => false,
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de préciser votre message")),
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}