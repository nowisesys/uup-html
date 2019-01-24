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

namespace UUP\Html\Table;

/**
 * Represent an tbody element.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class TBody extends TContainer
{

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("tbody");
        }

        /**
         * Set the horizontal align attribute.
         * @param string $value
         * @see TableItem::setAlign
         */
        public function setAlign($value)
        {
                parent::setAttr("align", $value);
        }

        /**
         * Set the vertical align attribute.
         * @param string $value
         * @see TableItem::setValign
         */
        public function setValign($value)
        {
                parent::setAttr("valign", $value);
        }

        /**
         * Set the char attribute.
         * @param string $char A single character.
         * @see TableItem::setChar
         */
        public function setChar($char)
        {
                parent::setAttr("char", $char);
        }

        /**
         * Set the charoff attribute.
         * @param <type> $num
         * @see TableItem::setCharOffset
         */
        public function setCharOffset($num)
        {
                parent::setAttr("charoff", $num);
        }

}
