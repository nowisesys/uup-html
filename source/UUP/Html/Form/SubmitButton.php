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

use UUP\Html\Base\Button;

/**
 * An submit button for an form object.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see Form
 */
class SubmitButton extends Button
{

        /**
         * Constructor.
         * @param string $name The button name.
         * @param string $label The button label.
         */
        public function __construct($name = null, $label = null)
        {
                parent::__construct("submit", $name, $label);
        }

}
