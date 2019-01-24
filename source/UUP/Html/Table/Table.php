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
 * HTML table class.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Table extends Container
{

        // 
        // Table frame attribute constants:
        // 
        const FRAME_VOID = "void";
        const FRAME_ABOVE = "above";
        const FRAME_BELOW = "below";
        const FRAME_HSIDES = "hsides";
        const FRAME_LHS = "lhs";
        const FRAME_RHS = "rhs";
        const FRAME_VSIDES = "vsides";
        const FRAME_BOX = "box";
        const FRAME_BORDER = "border";
        // 
        // Table rules attribute constants:
        // 
        const RULES_NONE = "none";
        const RULES_GROUPS = "groups";
        const RULES_ROWS = "rows";
        const RULES_COLS = "cols";
        const RULES_ALL = "all";
        // 
        // Constants for TBody and TableItem (base class of TableRow, TableHeader 
        // and TableData) align and valign attributes:
        // 
        const ALIGN_RIGHT = "right";
        const ALIGN_LEFT = "left";
        const ALIGN_CENTER = "center";
        const ALIGN_JUSTIFY = "justify";
        const ALIGN_CHAR = "char";
        const VALIGN_TOP = "top";
        const VALIGN_MIDDLE = "middle";
        const VALIGN_BOTTOM = "bottom";
        const VALIGN_BASELINE = "baseline";
        // 
        // Constants for the scope attribute of TableCell:
        // 
        const SCOPE_COL = "col";
        const SCOPE_ROW = "row";
        const SCOPE_COLGROUP = "colgroup";
        const SCOPE_ROWGROUP = "rowgroup";

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("table");
        }

        /**
         * Set border attribute.
         * @param int $width
         */
        public function setBorder($width)
        {
                parent::setAttr("border", $width);
        }

        /**
         * Set cell padding attribute.
         * @param int $pixels
         */
        public function setCellPadding($pixels)
        {
                parent::setAttr("cellpadding", $pixels);
        }

        /**
         * Set cell spacing attribute
         * @param int $pixels
         */
        public function setCellSpacing($pixels)
        {
                parent::setAttr("cellspacing", $pixels);
        }

        /**
         * See http://www.w3schools.com/tags/tag_table.asp for argument info
         * and the constants TABLE_FRAME_XXX.
         */
        public function setFrame($str)
        {
                parent::setAttr("frame", $str);
        }

        /**
         * See http://www.w3schools.com/tags/tag_table.asp for argument info.
         * and the constants TABLE_RULES_XXX.
         */
        public function setRules($str)
        {
                parent::setAttr("rules", $str);
        }

        /**
         * Set table summary attribute.
         * @param string $text
         */
        public function setSummary($text)
        {
                parent::setAttr("summary", $text);
        }

        /**
         * Add an row to the HTML table object.
         * @return TableRow
         */
        public function addRow()
        {
                return parent::addElement(new TableRow());
        }

        /**
         * Add an table header object.
         * @return THead
         */
        public function addTHead()
        {
                return parent::addElement(new THead());
        }

        /**
         * Add an table footer object.
         * @return TFoot
         */
        public function addTFoot()
        {
                return parent::addElement(new TFoot());
        }

        /**
         * Add an table body object.
         * @return TBody
         */
        public function addTBody()
        {
                return parent::addElement(new TBody());
        }

}
