<?php

namespace App\EventSubscriber;

use App\Attributes\RequestLogAttribute;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestLogSubscriber implements EventSubscriberInterface
{
    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        $reflectionMethod = new \ReflectionMethod($controller, "method");

        $reflectionClass = new \ReflectionClass($controller);

        $attributes = $reflectionClass->getAttributes(RequestLogAttribute::class);

        if(!empty($attributes)) {
            /**
             * @var \ReflectionAttribute $attribute
             */
            $attribute = current($attributes);
            dump($attribute->getName());
            dump($attribute->isRepeated());
            dump($attribute->getArguments());

            die;
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
