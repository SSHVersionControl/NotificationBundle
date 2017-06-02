<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Tests;



if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase')) {
  class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
}

/**
 * Notification Test Case.
 *
 * @author Paul Schweppe <paulschweppe@gmail.com>
 */
abstract class NotificationTestCase extends \PHPUnit_Framework_TestCase
{

    
}