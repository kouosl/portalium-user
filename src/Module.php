<?php

namespace portalium\user;

use Yii;

class Module extends \portalium\base\Module
{
    public static function moduleInit()
    {
        self::registerTranslation('user','@portalium/user/messages',[
            'user' => 'user.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::t('user', $message, $params);
    }

    public static function initRules(){
        return $rules = [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [
                    'user/users',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>'
                ],
            ],
        ] ;
    }
}