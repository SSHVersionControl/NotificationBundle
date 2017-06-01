<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitSSH2\NotificationBundle\Notification\EventListener;

use GitSSH2\NotificationBundle\Notification\Event\NotificationEvent;
use GitSSH2\NotificationBundle\Notification\Manager\NotificationManager;

class NotificationEventListener
{
    

    /**
     *
     * @var type
     */
    private $notificationManager;
    
    public function __construct(NotificationManager $notificationManager)
    {
        $this->notificationManager = $notificationManager;
    }
     
    public function manageNotification(NotificationEvent $notificationEvent)
    {
        $notification = $notificationEvent->getNotification();
        
        if ($notification instanceof \GitSSH2\NotificationBundle\Notification\NotificationEntityInterface) {
            $this->notificationManager->handle($notification);
        }
    }
}
