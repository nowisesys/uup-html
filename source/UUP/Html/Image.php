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

namespace UUP\Html;

use UUP\Html\Base\Component;

/**
 * This class represents an image (IMG) element.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
class Image extends Component
{

        /**
         * Constructor.
         * @param string $src The image source (URI).
         * @param string $alt The alt attribute.
         */
        public function __construct($src, $alt)
        {
                parent::__construct("img");
                parent::setAttr("src", $src);
                parent::setAttr("alt", $alt);
        }

        /**
         * Set the height attribute.
         * @param int $pixels
         */
        public function setHeight($pixels)
        {
                parent::setAttr("height", $pixels);
        }

        /**
         * Set the width attribute.
         * @param int $pixels
         */
        public function setWidth($pixels)
        {
                parent::setAttr("width", $pixels);
        }

        /**
         * Set the longdesc attribute.
         * @param string $url
         */
        public function setLongDescription($url)
        {
                parent::setAttr("longdesc", $url);
        }

        /**
         * Set the usemap attribute.
         * @param string $name
         */
        public function setUseMap($name)
        {
                parent::setAttr("usemap", $name);
        }

}
