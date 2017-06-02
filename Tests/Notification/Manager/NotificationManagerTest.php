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

use GitSSH2\NotificationBundle\Notification\Manager\NotificationManager;
use GitSSH2\NotificationBundle\Notification\Handler\NotificationSystemHandler;
use Doctrine\ORM\EntityManager;
use GitSSH2\NotificationBundle\Entity\Notification;
use GitSSH2\NotificationBundle\Tests\NotificationTestCase;


/**
 * Notification Manager Tests.
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
class NotificationManagerTest extends NotificationTestCase
{
    /**
     * @expectedException GitSSH2\NotificationBundle\Exception\InvalidNotificationHandlerException
     */
    public function testInvalidHandler(){
        $object = new \stdClass();
        $object->test = "test";
        $NotificationManager = new NotificationManager(array($object));
        $notificationEntity = new Notification();
        $NotificationManager->handle($notificationEntity);
    }
    
    
    public function testValidHandler(){
        
        $entityManager = $this
            ->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $notificationSystemHandler = new NotificationSystemHandler($entityManager);

        $NotificationManager = new NotificationManager(array($notificationSystemHandler));
        
        $notificationEntity = new Notification();
        $exception = null;
        try{
            $NotificationManager->handle($notificationEntity);
        }catch(\GitSSH2\NotificationBundle\Exception\InvalidNotificationHandlerException $exception){}
        
        $this->assertNull($exception, 'Unexpected InvalidNotificationHandlerException');
    }
}