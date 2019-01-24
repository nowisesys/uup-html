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

use UUP\Html\Base\Input;

/**
 * An image button is an ordinary img element, but with an form post trigger.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see Form
 */
class ImageButton extends Input
{

        /**
         * Constructor.
         * @param string $name The button element name.
         * @param string $value The button element value.
         * @param string $src The URI of the image data.
         * @param string $alt An alternative text to display.
         */
        public function __construct($name = null, $value = null, $src = null, $alt = null)
        {
                parent::__construct("image", $name, $value);
                if (isset($src)) {
                        parent::setAttr("src", $src);
                }
                if (isset($alt)) {
                        parent::setAttr("alt", $alt);
                }
        }

        /**
         * Sets the src attribute.
         * @param string $src The URI.
         */
        public function setSource($src)
        {
                parent::setAttr("src", $src);
        }

        /**
         * Sets the alt attribute.
         * @param string $text An alternative text.
         */
        public function setAltText($text)
        {
                parent::setAttr("alt", $text);
        }

}
