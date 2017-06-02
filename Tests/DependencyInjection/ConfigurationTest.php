<?php
/*
 * This file is part of the GitSSH2\NotificationBundle package.
 *
 * (c) Paul Schweppe <paulschweppe@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GitSSH2\NotificationBundle\Tests\DependencyInjection;

use GitSSH2\NotificationBundle\DependencyInjection\Configuration;
use GitSSH2\NotificationBundle\Tests\NotificationTestCase;

class ConfigurationTest extends NotificationTestCase
{
    public function testGetConfigTreeBuilderReturnsTreeBuilderIntance()
    {
        $configuration = new Configuration();
        $treeBuilder = $configuration->getConfigTreeBuilder();
        
        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder',$treeBuilder);
    }
    
 
}

