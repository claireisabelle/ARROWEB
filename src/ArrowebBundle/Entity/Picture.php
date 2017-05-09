<?php

namespace ArrowebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="arroweb_picture")
 * @ORM\Entity(repositoryClass="ArrowebBundle\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     *
     * 
     * @ORM\OneToOne(targetEntity="Reference", inversedBy="picture")
     * @ORM\JoinColumn(name="reference_id", referencedColumnName="id")
     */
    private $reference;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Picture
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Picture
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set reference
     *
     * @param \ArrowebBundle\Entity\Reference $reference
     *
     * @return Picture
     */
    public function setReference(\ArrowebBundle\Entity\Reference $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \ArrowebBundle\Entity\Reference
     */
    public function getReference()
    {
        return $this->reference;
    }
}
