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

use UUP\Html\Base\Container;

/**
 * An href or name (anchor) link.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Link extends Container
{

        // 
        // Link types:
        // 
        const TYPE_HREF = "href";
        const TYPE_NAME = "name";
        // 
        // Link attributes:
        // 
        const SHAPE_DEFAULT = "default";
        const SHAPE_RECT = "rect";
        const SHAPE_CIRCLE = "circle";
        const SHAPE_POLY = "poly";
        const TARGET_BLANK = "_blank";
        const TARGET_PARENT = "_parent";
        const TARGET_SELF = "_self";
        const TARGET_TOP = "_top";

        /**
         * Constructor.
         * @param string $type The link type. See LINK_TYPE_XXX
         * @param string $link The resource target.
         */
        public function __construct($type, $link)
        {
                parent::__construct("a");
                parent::setAttr($type, $link);
        }

        /**
         * Set the href attribute.
         * @param string $url The resource target.
         */
        public function setHref($url)
        {
                parent::setAttr("href", $url);
        }

        /**
         * Set the name attribute.
         * @param string $name The resource target.
         */
        public function setName($name)
        {
                parent::setAttr("name", $name);
        }

        /**
         * Set the charset attribute.
         * @param string $encoding The character set encoding.
         */
        public function setCharSet($encoding)
        {
                parent::setAttr("charset", $encoding);
        }

        /**
         * Set the coords attribute.
         * @param string $coords
         */
        public function setCoordinates($coords)
        {
                parent::setAttr("coords", $coords);
        }

        /**
         * Set the hreflang attribute.
         * @param string $lang
         */
        public function setHrefLang($lang)
        {
                parent::setAttr("hreflang", $lang);
        }

        /**
         * Set the rel attribute. This attribute is used by documentatiation
         * parsers to create document relations.
         * @param string $text
         */
        public function setRelation($text)
        {
                parent::setAttr("rel", $text);
        }

        /**
         * Set the rev attribute. This attribute is used by documentatiation
         * parsers to create document relations.
         * @param string $text
         */
        public function setReverse($text)
        {
                parent::setAttr("rev", $text);
        }

        /**
         * Set the shape attribute. See LINK_SHAPE_XXX.
         * @param string $shape
         */
        public function setShape($shape)
        {
                parent::setAttr("shape", $shape);
        }

        /**
         * Set the target attribute. See LINK_TARGET_XXX.
         * @param string $target
         */
        public function setTarget($target)
        {
                parent::setAttr("target", $target);
        }

}
