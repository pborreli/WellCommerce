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

namespace WellCommerce\Bundle\CategoryBundle\Controller\Box;

use WellCommerce\Bundle\CoreBundle\Controller\Box\AbstractBoxController;

/**
 * Class CategoryMenuBoxController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CategoryMenuBoxController extends AbstractBoxController
{
    /**
     * {@inheritdoc}
     */
    public function indexAction()
    {
        return $this->displayTemplate('index', [
            'active' => $this->manager->getCategoryContext()->getCurrentCategoryIdentifier()
        ]);
    }
}
