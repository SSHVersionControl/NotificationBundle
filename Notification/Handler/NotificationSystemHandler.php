<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Notification\Handler;

use GitSSH2\NotificationBundle\Notification\NotificationEntityInterface;
use \GitSSH2\NotificationBundle\Notification\Handler\NotificationHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;

class NotificationSystemHandler implements NotificationHandlerInterface
{

    /**
     * EntityManager
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Handles the notification
     *
     * @return string
     */
    public function handle(NotificationEntityInterface $notification)
    {
        $this->em->persist($notification);
        $this->em->flush();
    }

    /**
     * Checks if this handler can handle this notification
     *
     * @param NotificationEntityInterface $notification
     */
    public function canHandle(NotificationEntityInterface $notification)
    {
        if ($notification instanceof \GitSSH2\NotificationBundle\Entity\Notification) {     
            return true;
        }else{
            return false;
        }
    }
}
