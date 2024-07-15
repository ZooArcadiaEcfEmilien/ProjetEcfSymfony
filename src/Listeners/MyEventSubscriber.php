<?php

namespace App\Listeners;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use App\Entity\Order;
use Documents\Product;

class MyEventSubscriber
{
    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function postLoad(LifecycleEventArgs $eventArgs): void
    {
        $order = $eventArgs->getDocument();

        if (!$order instanceof Order) {
            return;
        }

        $productReflProp = $this->dm->getClassMetadata(Order::class)
            ->reflClass->getProperty('product');
        $productReflProp->setAccessible(true);
        $productReflProp->setValue(
            $order, $this->dm->getReference(Product::class, $order->getProductId())
        );
    }
}
/* <?php

use Doctrine\ODM\MongoDB\DocumentManager;

use Documents\Product;
use App\Entity\Order;
use Doctrine\Persistence\Event\LifecycleEventArgs;
class MyEventSubscriber
{
    private $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function postLoad(LifecycleEventArgs $eventArgs): void
    {
        $order = $eventArgs->getObject();

        if (!$order instanceof Order) {
            return;
        }

        $em = $eventArgs->getObjectManager();
        $productReflProp = $em->getClassMetadata(Order::class)
            ->getReflectionClass()->getProperty('product');
        $productReflProp->setAccessible(true);
        $productReflProp->setValue(
            $order, $this->dm->getReference(Product::class, $order->getProductId())
        );
    }
}
    */