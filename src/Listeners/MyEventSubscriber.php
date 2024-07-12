<?php

namespace App\Listeners;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use App\Entity\Order;
use Documents\Product;
class MyEventSubscriber
{
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

        $dm = $eventArgs->getDocumentManager();
        $productReflProp = $dm->getClassMetadata(Order::class)
            ->reflClass->getProperty('product');
        $productReflProp->setAccessible(true);
        $productReflProp->setValue(
            $order->$this->dm->getReference(Product::class, $order->getProductId())
        );
    }
}
