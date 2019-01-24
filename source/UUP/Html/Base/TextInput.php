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

use UUP\Html\Form\Password;
use UUP\Html\Form\TextBox;

/**
 * Decorates an textbox and password class.
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 *
 * @package UUP
 * @subpackage Html
 *
 * @see TextBox
 * @see Password
 */
abstract class TextInput extends Input
{

        /**
         * Sets the value attribute.
         * @param string $text The text.
         */
        public function setText($text)
        {
                parent::setAttr("value", $text);
        }

        /**
         * Sets the size attribute.
         * @param int $size
         */
        public function setSize($size)
        {
                parent::setAttr("size", $size);
        }

        /**
         * Sets the readonly attribute.
         */
        public function setReadOnly()
        {
                parent::setAttr("readonly", "readonly");
        }

        /**
         * Sets the maxlength attribute.
         * @param int $chars
         */
        public function setMaxLength($chars)
        {
                parent::setAttr("maxlength", $chars);
        }

}
