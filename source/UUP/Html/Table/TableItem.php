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

use UUP\Html\Base\Container;

/**
 * The abstract base class for TableCell and TableRow classes.
 *
 * @see TableCell
 * @see TableRow
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
abstract class TableItem extends Container
{

        /**
         * Set the horizontal alignment attribute. See TABLE_ALIGN_XXX.
         * @param string $value
         */
        public function setAlign($value)
        {
                parent::setAttr("align", $value);
        }

        /**
         * Set the vertical alignment attribute. See TABLE_VALIGN_XXX.
         * @param string $value
         */
        public function setValign($value)
        {
                parent::setAttr("valign", $value);
        }

        /**
         * Aligns the content in a cell to a character.
         * @param string $char A single character
         */
        public function setChar($char)
        {
                parent::setAttr("char", $char);
        }

        /**
         * Sets the number of characters the content will be aligned from the
         * character specified by the char attribute.
         *
         * @param int $num
         */
        public function setCharOffset($num)
        {
                parent::setAttr("charoff", $num);
        }

}
