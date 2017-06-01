<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitSSH2\NotificationBundle\Notification\Event;

use Symfony\Component\EventDispatcher\Event;
use GitSSH2\NotificationBundle\Notification\NotificationEntityInterface;

/**
 * This event is triggered whenever a notification is triggered
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
class NotificationEvent extends Event
{
    const NAME = 'gitssh2.notification';

    /**
     *
     * @var \GitSSH2\NotificationBundle\Notification\NotificationEntityInterface
     */
    private $notification;

    /**
     * @param NotificationEntityInterface $notification
     */
    public function __construct(NotificationEntityInterface $notification)
    {
        $this->notification = $notification;
    }
    
    public function getNotification()
    {
        return $this->notification;
    }

    public function setNotification(\GitSSH2\NotificationBundle\Notification\NotificationEntityInterface $notification)
    {
        $this->notification = $notification;
    }
}
