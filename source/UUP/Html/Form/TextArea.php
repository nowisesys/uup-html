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
 * A textarea container. The textarea is a bit special in that it is actually
 * a container, but is commonly used as a component in forms.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see Form
 */
class TextArea extends Container
{

        /**
         * Constructor.
         * @param string $name The textarea name.
         * @param string $text The textarea content.
         */
        public function __construct($name, $text = null)
        {
                parent::__construct("textarea");
                parent::setAttr("name", $name);
                parent::setText($text);
        }

        /**
         * Sets the cols attribute, that is, the number of columns to display
         * at once.
         *
         * @param int $cols
         */
        public function setColumns($cols)
        {
                parent::setAttr("cols", $cols);
        }

        /**
         * Sets the rows attribute, that is, the number of rows to display
         * at once.
         *
         * @param int $rows
         */
        public function setRows($rows)
        {
                parent::setAttr("rows", $rows);
        }

}
