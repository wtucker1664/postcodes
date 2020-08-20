<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postcode
 *
 * @ORM\Table(name="postcode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostcodeRepository")
 */
class Postcode
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
     * @ORM\Column(name="postcode", type="string")
     */
    private $postcode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="decimal", precision=7, scale=7)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lon", type="decimal", precision=7, scale=7)
     */
    private $lon;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set lon.
     *
     * @param string $lon
     *
     * @return Postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get lon.
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set lat.
     *
     * @param string $lat
     *
     * @return Postcode
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat.
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon.
     *
     * @param string $lon
     *
     * @return Postcode
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon.
     *
     * @return string
     */
    public function getLon()
    {
        return $this->lon;
    }
}
