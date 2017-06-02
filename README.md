Simple Notification Bundle  [![Build Status](https://travis-ci.org/SSHVersionControl/git-web-client.svg?branch=master)](https://travis-ci.org/SSHVersionControl/git-web-client) 
========================

## Installation

To use this bundle in your Symfony project add the following to your `composer.json`:

    {
        "require": {
            // ...
            "": "dev-master"
        }
    }

and enable it in your kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new GitSSH2\NotificationBundle\GitSSH2NotificationBundle(),
        );
    }

## Configuration
If you want to use the default system handle which stores the notifications in the database you 
will need to update the database

```
    php bin/console doctrine:schema:update --force
```

The default configuration is to use system handler. You can create you own handlers and register them. 

```
    gitssh2.notification.manager:
        class: GitSSH2\NotificationBundle\Notification\Manager\NotificationManager
        arguments: [["@gitssh2.notification.handler.system"]]
```


## Usage
This bundle is a bases for a simple notification system. To trigger and notification you just need to 
use Symfony's event dispatcher e.g.

    <?php

        $notification = new Notification();
        $notification->setTitle('Hello');
        $notification->setMessage('Welcome message');
        ...

        $notifcationEvent = new NotificationEvent($notification);
        $dispatcher = $this->get('event_dispatcher');
        $dispatcher->dispatch($notifcationEvent::NAME, $notifcationEvent);

It is advised to use your own notification entity. All you need to do is implement GitSSH2\NotificationBundle\Notification\NotificationEntityInterface

You also should implement your own notification handlers. For example you could create a email handler.

Code example to follow