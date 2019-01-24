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

use UUP\Html\Form\CheckBox;
use UUP\Html\Form\RadioButton;
use UUP\Html\Link;
use UUP\Html\Text\Cdata;

/**
 * Decorates the radio button and checkbox class.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see RadioButton
 * @see CheckBox
 */
abstract class OptionInput extends Input
{

        private $text;

        /**
         * Constructor.
         * @param string $type The input element type.
         * @param string $name The input element name.
         * @param string $value The input element value.
         * @param string $text The text associated with this element (e.g. label).
         */
        public function __construct($type, $name, $value, $text = null)
        {
                parent::__construct($type, $name, $value);
                $this->text = isset($text) ? $text : $value;
        }

        /**
         * Sets the text for this input element.
         * @param string $text
         */
        public function setText($text)
        {
                $this->text = $text;
        }

        public function setLink($link, $type = LINK_TYPE_HREF)
        {
                $this->text = new Cdata($this->text);
                $this->text->setLink(new Link($type, $link));
        }

        /**
         * Sets the checked attribute.
         */
        public function setChecked()
        {
                parent::setAttr("checked", "checked");
        }

        /**
         * Output HTM for this object.
         */
        public function output()
        {
                parent::output();
                if (is_string($this->text)) {
                        echo $this->text;
                } else {
                        $this->text->output();
                }
        }

}
