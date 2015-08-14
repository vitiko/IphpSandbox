<?php
#src/Iphpsandbox/PhotoBundle/Entity/Photo.php
namespace Iphpsandbox\PhotoBundle\Entity;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @FileStore\Uploadable
 */
class Photo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;


    /**
     * @var \Datetime
     */
    private $date;

    /**
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="photo")
     **/
    private $photo;



    /**
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="image", filedata_property="image")
     **/
    private $imageUpload;

    private $image;

    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title
     * @return Photo
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param array $photo
     * @return Photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return array 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param \Datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $imageUpload
     */
    public function setImageUpload($imageUpload)
    {
        $this->imageUpload = $imageUpload;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageUpload()
    {
        return $this->imageUpload;
    }




}
