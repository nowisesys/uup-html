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

namespace UUP\Html\Lists;

use UUP\Html\Base\Container;

/**
 * HTML ordered list (UL).
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (Computing Department at BMC, Uppsala University)
 */
class UnorderedList extends Container
{

        /**
         * A filled circle. Default for unordered list.
         */
        const TYPE_DISC = "disc";
        /**
         * An unfilled circle.
         */
        const TYPE_CIRCLE = "circle";
        /**
         * A filled square.
         */
        const TYPE_SQUARE = "square";

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("ul");
        }

        /**
         * Set compact attribute.
         * Specifies that the list should render smaller than normal.
         */
        public function setCompact()
        {
                parent::setAttr("compact");
        }

        /**
         * Set enumeration type.
         * 
         * Specifies the kind of marker to use in the list. The value is one of the 
         * TYPE_XXX constants.
         * 
         * @param string $type The enumeration type.
         */
        public function setType($type)
        {
                parent::setAttr("type", $type);
        }

        /**
         * Add list item.
         * @param string $text The list item text.
         * @return ListItem
         */
        public function addItem($text)
        {
                return parent::addElement(new ListItem($text));
        }

        /**
         * Add child list.
         * @param OrderedList|UnorderedList $list The child list.
         * @return OrderedList|UnorderedList
         */
        public function addList($list)
        {
                return parent::addElement($list);
        }

}
