<?php

namespace nerdsandcompany\hirefire\controllers;

use Craft;
use craft\web\Controller;
use yii\base\UserException;
use yii\web\Response;

/**
 * @author    Nerds & Company
 * @copyright Copyright (c) 2018, Nerds & Company
 * @license   MIT
 *
 * @see      https://nerds.company
 */
class InfoController extends Controller
{
    /**
     * @var bool
     */
    public $allowAnonymous = true;

    /**
     * @param string $token
     *
     * @return Response
     */
    public function actionIndex(string $token): Response
    {
        // Verify hirefire token
        if ($token != getenv('HIREFIRE_TOKEN')) {
            throw new UserException(Craft::t('hirefire', 'Invalid Hirefire token.'));
        }

        // Return pending queue for worker
        return $this->asJson([[
            'name' => 'worker',
            'quantity' => Craft::$app->queue->getTotalWaiting(),
        ]]);
    }
}
