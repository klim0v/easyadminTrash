<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @Vich\Uploadable
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="name", type="string", length=255)
//     */
//    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", length=255)
     */
    private $updatedAt;

    /**
     * @var Service
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="images")
     * @ORM\JoinColumn(onDelete="CASCADE", nullable=false)
     */
    private $gallery;

    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
    }

    public function __toString()
    {
        return 'Image ' . $this->getId();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $image
     */
    public function setImageFile(File $image)
    {
        $this->imageFile = $image;
        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

//    /**
//     * @return string
//     */
//    public function getName()
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param string $name
//     */
//    public function setName($name)
//    {
//        $this->name = $name;
//    }

    /**
     * @return Service
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set all categories of the product.
     *
     * @param Service $gallery
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
    }


}