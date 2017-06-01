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

/**
 * This interface is responsible to force type-hinting for all the notification senders
 * that need to be processed.
 */
interface NotificationHandlerInterface
{
    
    /**
     * Handles the notification
     *
     * @return string
     */
    public function handle(NotificationEntityInterface $notification);
    
    /**
     * Checks if this handler can handle this notification
     *
     * @param NotificationEntityInterface $notification
     */
    public function canHandle(NotificationEntityInterface $notification);
}
