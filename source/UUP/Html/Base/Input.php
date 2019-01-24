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

namespace UUP\Html\Base;

use UUP\Html\Form\Form;

/**
 * This class represent an input element (text, hidden, ...). In essential,
 * all child objects in a form inherits from this class.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see Form
 */
abstract class Input extends Component
{

        /**
         * Constructor.
         * @param string $type The input element type.
         * @param string $name The input element name (optional).
         * @param string $value The input element value (optional).
         */
        public function __construct($type, $name = null, $value = null)
        {
                parent::__construct("input");
                parent::setAttr("type", $type);
                if (isset($name)) {
                        parent::setAttr("name", $name);
                }
                if (isset($value)) {
                        parent::setAttr("value", $value);
                }
        }

        /**
         * Set the disable attribute.
         */
        public function setDisabled()
        {
                parent::setAttr("disabled", "disabled");
        }

}
