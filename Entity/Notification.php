<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Entity\Notification;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use GitSSH2\NotificationBundle\Notification\NotificationEntityInterface;

/**
 * Notification Default Entity.
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="fk_notification_notification_tag1", columns={"notification_tag_id"}) })
 * @ORM\Entity(repositoryClass="GitSSH2\NotificationBundle\Repository\NotificationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Notification implements NotificationEntityInterface
{
  
    /**
     * @var guid
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;

    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="text", length=80, nullable=false)
     */
    private $title;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="message", type="text", length=80, nullable=false)
     */
    private $message;
    
    /**
     * @var \GitSSH2\NotificationBundle\Entity\Notification\NotificationTag
     *
     * @ORM\ManyToOne(targetEntity="GitSSH2\NotificationBundle\Entity\Notification\NotificationTag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notification_tag_id", referencedColumnName="id")
     * })
     */
    private $fcNotificationTag;
    
    /**
     * Absolute link.
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=255, nullable=true)
     */
    private $link;


    /**
     * Read Status eg readed/unreaded
     * @var boolean
     *
     * @ORM\Column(name="readed", type="boolean", nullable=false)
     */
    private $readed = 0;


    /**
     * Constructor.
     */
    public function __construct()
    {
    }

   
    /**
     * Set creationDate.
     *
     * @param \DateTime $creationDate
     *
     * @return Card
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set updateDate.
     *
     * @param \DateTime $updateDate
     *
     * @return Card
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate.
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }


    /**
     * Get id.
     *
     * @return binary
     */
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * @ORM\PrePersist
     */
    public function setCreationDateValue()
    {
        $this->creationDate = new \DateTime();
        $this->updateDate = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setModifiedDateValue()
    {
        $this->updateDate = new \DateTime();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getNotificationTag()
    {
        return $this->fcNotificationTag;
    }

    public function getReaded()
    {
        return $this->readed;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setNotificationTag(\GitSSH2\NotificationBundle\Entity\Notification\NotificationTag $fcNotificationTag)
    {
        $this->fcNotificationTag = $fcNotificationTag;
    }

    public function setReaded($readed)
    {
        $this->readed = $readed;
    }
    
    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }
}
