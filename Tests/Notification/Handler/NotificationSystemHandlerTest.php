<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Tests\Notification\Manager;

use GitSSH2\NotificationBundle\Entity\Notification;
use GitSSH2\NotificationBundle\Notification\Handler\NotificationSystemHandler;
use Doctrine\ORM\EntityManager;
use GitSSH2\NotificationBundle\Tests\NotificationTestCase;

/**
 * Description of NotificationManagerTest.
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
class NotificationSystemHandlerTest extends NotificationTestCase
{
    /**
     * 
     */
    public function testCanHandleNotificationEntity(){
        
        $entityManager = $this
            ->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $notificationSystemHandler = new NotificationSystemHandler($entityManager);
        
        $notificationEntity = new Notification();
    
        $this->assertTrue($notificationSystemHandler->canHandle($notificationEntity),'NotificationSystemHandler should be able to handle notification Entity');
    }
}