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

namespace UUP\Html\Text;

use UUP\Html\Base\Container;

/**
 * The standard H1 to H6 header, implemented as text container.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Header extends Container
{

        /**
         * Constructor.
         * @param int $size The header size.
         * @param string $text The header text.
         */
        public function __construct($size, $text)
        {
                parent::__construct(sprintf("h%d", $size));
                parent::setText($text);
        }

}
