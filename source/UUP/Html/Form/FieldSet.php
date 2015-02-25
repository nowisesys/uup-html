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

namespace UUP\Html\Form;

use UUP\Html\Base\Container;

/**
 * This class represents a fieldset container element.
 * 
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
class FieldSet extends Container
{

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("fieldset");
        }

        /**
         * Set label (legend) for this fieldset.
         * @param string $text The label text.
         */
        public function setLabel($text)
        {
                parent::addElement(new Legend($text));
        }

}
