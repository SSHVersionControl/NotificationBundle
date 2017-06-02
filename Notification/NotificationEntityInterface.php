<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Notification;

/**
 * This interface is responsible to force type-hinting for all the notification senders
 * that need to be processed.
 */
interface NotificationEntityInterface
{
     /**
     * Get id
     *
     * @return int
     */
    public function getId();
    
    /**
     * Get title
     * @return string
     */
    public function getTitle();

    /**
     * Get message
     * @return string
     */
    public function getMessage();
}
