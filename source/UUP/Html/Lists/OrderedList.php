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
 * HTML ordered list (OL).
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (Computing Department at BMC, Uppsala University)
 */
class OrderedList extends Container
{

        /**
         * Decimal numbers (1, 2, 3, 4). Default for ordered list.
         */
        const TYPE_DECIMAL = "1";
        /**
         * Alphabetically ordered list, lowercase (a, b, c, d)
         */
        const TYPE_LOWER_ALPHA = "a";
        /**
         * Alphabetically ordered list, uppercase (A, B, C, D)
         */
        const TYPE_UPPER_ALPHA = "A";
        /**
         * Roman numbers, lowercase (i, ii, iii, iv)
         */
        const TYPE_LOWER_ROMAN = "i";
        /**
         * Roman numbers, uppercase (I, II, III, IV)
         */
        const TYPE_UPPER_ROMAN = "I";

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("ol");
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
         * Set start attribute.
         * Specifies the start value of an ordered list.
         * 
         * @param int $number The first number.
         */
        public function setStart($number)
        {
                parent::setAttr("start", $number);
        }

        /**
         * Set enumeration type.
         * 
         * The type attribute specifies the kind of marker to use in the list (letters 
         * or numbers). The value is one of the TYPE_XXX constants.
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
