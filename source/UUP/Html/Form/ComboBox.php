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
 * A combobox (drop down list) class. This is an abstraction of an select
 * element.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see Option
 */
class ComboBox extends Container
{

        /**
         * Constructor.
         * @param string $name The combobox name.
         */
        public function __construct($name)
        {
                parent::__construct("select");
                parent::setAttr("name", $name);
        }

        /**
         * Sets the disabled attribute.
         */
        public function setDisabled()
        {
                parent::setAttr("disabled", "disabled");
        }

        /**
         * Sets the multiple attribute.
         */
        public function setMultiple()
        {
                parent::setAttr("multiple", "multiple");
        }

        /**
         * Sets the size attribute. This is the number of items in the list
         * to display at once.
         *
         * @param int $number The number of items.
         */
        public function setVisibleOptions($number)
        {
                parent::setAttr("size", $number);
        }

        /**
         * Add an option (item) to this combobox.
         *
         * @param string $value The option value.
         * @param string $text The option text.
         * @return Option
         */
        public function addOption($value, $text)
        {
                return parent::addElement(new Option($value, $text));
        }

}
