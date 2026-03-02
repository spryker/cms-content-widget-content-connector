<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsContentWidgetContentConnector;

use Spryker\Zed\CmsContentWidgetContentConnector\Dependency\Facade\CmsContentWidgetContentConnectorToContentFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \Spryker\Zed\CmsContentWidgetContentConnector\CmsContentWidgetContentConnectorConfig getConfig()
 */
class CmsContentWidgetContentConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_CONTENT = 'FACADE_CONTENT';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addContentFacade($container);

        return $container;
    }

    protected function addContentFacade(Container $container): Container
    {
        $container->set(static::FACADE_CONTENT, function (Container $container) {
            return new CmsContentWidgetContentConnectorToContentFacadeBridge(
                $container->getLocator()->content()->facade(),
            );
        });

        return $container;
    }
}
