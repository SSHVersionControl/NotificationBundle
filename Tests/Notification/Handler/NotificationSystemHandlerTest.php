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
use Doctrine\ORM\EntityManagerInterface;



/**
 * Description of NotificationManagerTest.
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
class NotificationSystemHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * 
     */
    public function testCanHandleNotificationEntity(){
        
        $entityManager = $this
            ->getMockBuilder(EntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $notificationSystemHandler = new NotificationSystemHandler($entityManager);
        
        $notificationEntity = new Notification();
    
        $this->assertTrue($notificationSystemHandler->canHandle($notificationEntity),'NotificationSystemHandler should be able to handle notification Entity');
    }
}