<?php

/*
 * Copyright (C) 2010-2015 Anders Lövgren
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace UUP\Html\Lists;

use UUP\Html\Base\Container;

/**
 * Respresents a DD element.
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (Computing Department at BMC, Uppsala University)
 */
class DescriptionData extends Container
{

        /**
         * Constructor
         * @param string $text The data text.
         */
        public function __construct($text)
        {
                parent::__construct("dd");
                parent::setText($text);
        }

}
