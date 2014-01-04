<?php

namespace MD\NyanFormattersExtension;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

use RuntimeException;

/**
 * Extension
 */
class Extension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ServiceContainer $container)
    {
        if (!class_exists('NyanCat\Scoreboard')) {
            throw new RuntimeException(
                'Nyan formatters require whatthejeff/nyancat-scoreboard:~1.1'
            );
        }

        $this->addFormatter($container, 'cat', 'MD\NyanFormattersExtension\Formatter\NyanFormatter');
        $this->addFormatter($container, 'dino', 'MD\NyanFormattersExtension\Formatter\DinoFormatter');
        $this->addFormatter($container, 'crab', 'MD\NyanFormattersExtension\Formatter\CrabFormatter');
    }

    /**
     * Add a formatter to the service container
     *
     * @param ServiceContainer $container
     * @param string           $name
     * @param string           $class
     */
    protected function addFormatter(ServiceContainer $container, $name, $class)
    {
        $container->set('formatter.formatters.nyan.' . $name, function($c) use($class) {
            /** @var ServiceContainer $c */
            return new $class(
                $c->get('formatter.presenter'),
                $c->get('console.io'),
                $c->get('event_dispatcher.listeners.stats')
            );
        });
    }
}
