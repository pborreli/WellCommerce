<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\OrderBundle\Collector;

use WellCommerce\Bundle\OrderBundle\Entity\OrderInterface;

/**
 * Class OrderShippingCostCollector
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderShippingCostCollector extends AbstractDataCollector
{
    /**
     * {@inheritdoc}
     */
    public function visitOrder(OrderInterface $order)
    {
        $shippingCostTotal  = $order->getShippingTotal();
        $shippingCostDetail = $this->initResource();

        $shippingCostDetail->setOrderTotal($shippingCostTotal);
        $shippingCostDetail->setOrder($order);

        $order->addTotal($shippingCostDetail);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'shipping_cost';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 100;
    }
}