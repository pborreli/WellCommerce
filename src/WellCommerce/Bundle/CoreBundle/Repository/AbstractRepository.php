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
namespace WellCommerce\Bundle\CoreBundle\Repository;

use Closure;
use WellCommerce\Bundle\CoreBundle\AbstractComponent;
use WellCommerce\Bundle\CoreBundle\Event\RepositoryEvent;

/**
 * Class AbstractRepository
 *
 * Provides methods needed in repositories
 *
 * @package WellCommerce\Bundle\CoreBundle\Component\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractRepository extends AbstractComponent implements RepositoryInterface
{
    /**
     * Wraps callback function into DB transaction
     *
     * @param callable $callback
     *
     * @return mixed
     */
    final protected function transaction(Closure $callback)
    {
        return $this->container->get('database_manager')->getConnection()->transaction($callback);
    }

    /**
     * Dispatches the event for repository action
     *
     * @param       $eventName
     * @param array $data
     * @param       $id
     */
    final protected function dispatchEvent($eventName, $model, array $data = [])
    {
        $event = new RepositoryEvent($model, $data);
        $this->getDispatcher()->dispatch($eventName, $event);

        return $event->getData();
    }
}