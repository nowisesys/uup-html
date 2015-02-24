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
 * An option item for the ComboBox class.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 * @see ComboBox
 */
class Option extends Container
{

        /**
         * Construct.
         * @param string $value The option value.
         * @param string $text The option text.
         */
        public function __construct($value, $text)
        {
                parent::__construct("option");
                parent::setAttr("value", $value);
                parent::setText($text);
        }

        /**
         * Set this option object as selected.
         */
        public function setSelected()
        {
                parent::setAttr("selected", "selected");
        }

        /**
         * Set this option object as disabled.
         */
        public function setDisabled()
        {
                parent::setAttr("disabled", "disabled");
        }

}
