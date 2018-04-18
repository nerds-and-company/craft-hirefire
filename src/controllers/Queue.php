<?php

namespace nerdsandcompany\hirefire\controllers;

use Craft;
use yii\base\UserException;
use craft\web\Controller;

/**
 * @author    Nerds & Company
 * @copyright Copyright (c) 2018, Nerds & Company
 * @license   MIT
 *
 * @see      https://nerds.company
 */
class Queue extends Controller
{
    /**
     * @var bool
     */
    public $allowAnonymous = true;

    /**
     * @param array $variables
     */
    public function actionIndex(array $variables = [])
    {
        $this->requireAcceptsJson();

        // Verify hirefire token
        if ($variables['token'] != getenv('HIREFIRE_TOKEN')) {
            throw new UserException(Craft::t('Invalid Hirefire token.'));
        }

        // Return pending queue for worker
        $this->asJson([[
            'name' => 'worker',
            'quantity' => Craft::$app->queue->getTotalWaiting(),
        ]]);
    }
}
