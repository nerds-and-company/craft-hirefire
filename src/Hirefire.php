<?php

namespace nerdsandcompany\hirefire;

use craft\base\Plugin;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use yii\base\Event;

/**
 * @author    Nerds & Company
 * @copyright Copyright (c) 2018, Nerds & Company
 * @license   MIT
 *
 * @see      https://nerds.company
 */
class Hirefire extends Plugin
{
    /**
     * @var string
     */
    public $controllerNamespace = 'nerdsandcompany\hirefire\controllers';

    /**
     * Register site route.
     */
    public function init()
    {
        parent::init();

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['hirefire/<token:(.*?)>/info'] = 'hirefire/queue';
            }
        );
    }
}
