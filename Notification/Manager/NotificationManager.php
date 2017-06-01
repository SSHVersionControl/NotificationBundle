<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GitSSH2\NotificationBundle\Notification\Manager;

use GitSSH2\NotificationBundle\Notification\NotificationEntityInterface;
use GitSSH2\NotificationBundle\Exception\InvalidNotificationHandlerException;

class NotificationManager
{
    
    /**
     * @var array
     */
    protected $handlers = array();
    
    public function __construct(array $handlers = array())
    {
        $this->handlers = $handlers;
    }
    
    public function handle(NotificationEntityInterface $notification)
    {
        foreach ($this->handlers as $handler) {
            if ($handler instanceof \GitSSH2\NotificationBundle\Notification\Handler\NotificationHandlerInterface) {
                if ($handler->canHandle($notification)) {
                    $handler->handle($notification);
                }
            } else {
                throw new InvalidNotificationHandlerException('Handler must be an instance of "\GitSSH2\NotificationBundle\Notification\Handler\NotificationHandlerInterface"');
            }
        }
    }
}
