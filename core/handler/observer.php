<?php

/**
 * Observer Handler
 *
 * Copyright 2016-2018 秋水之冰 <27206617@qq.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace core\handler;

use core\pool\conf as pool_conf;

use core\parser\cmd as parser_cmd;
use core\parser\conf as parser_conf;
use core\parser\data as parser_data;

use core\handler\operator as handler_operator;

class observer
{
    /**
     * Start observer
     */
    public static function start(): void
    {
        //Load config settings
        parser_conf::load();

        //Check CORS permission
        self::chk_cors();

        //Call INIT setting functions
        handler_operator::call_init();

        //Prepare data
        parser_data::prep_data();

        //Prepare cmd
        parser_cmd::prep_cmd();


    }

    public static function output(): void
    {

    }


    /**
     * Check Cross-origin resource sharing permission
     */
    public static function chk_cors(): void
    {
        if (
            empty(pool_conf::$CORS)
            || !isset($_SERVER['HTTP_ORIGIN'])
            || $_SERVER['HTTP_ORIGIN'] === (pool_conf::$IS_HTTPS ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']
        ) {
            return;
        }

        if (!isset(pool_conf::$CORS[$_SERVER['HTTP_ORIGIN']])) {
            //todo log (debug): CORS failed
            exit;
        }

        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Headers: ' . pool_conf::$CORS[$_SERVER['HTTP_ORIGIN']]);

        if ('OPTIONS' === $_SERVER['REQUEST_METHOD']) {
            exit;
        }
    }
}