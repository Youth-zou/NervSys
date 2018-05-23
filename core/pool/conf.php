<?php

/**
 * Config Pool
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

namespace core\pool;

class conf
{
    //Config settings
    public static $CGI    = [];
    public static $CLI    = [];
    public static $CORS   = [];
    public static $INIT   = [];
    public static $SIGNAL = [];

    //Runtime settings
    public static $IS_HTTPS = true;
    public static $IS_CGI   = 'cli' !== PHP_SAPI;

    //Config file path
    const CONF_PATH = ROOT . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'conf.ini';
}