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

use UUP\Html\Link;

/**
 * The abstract base class for TableHeader or TableData class.
 *
 * @see TableHeader
 * @see TableData
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
abstract class TableCell extends TableItem
{

        /**
         * Sets a link for this table cell. The link type is either of href
         * or an name (anchor) type. Returns the link object.
         *
         * @param string $str The resource target.
         * @param string $type The link type
         * @return Link
         */
        public function setLink($str, $type = Link::TYPE_HREF)
        {
                return parent::setLink(new Link($type, $str));
        }

        /**
         * Set the abbr attribute.
         * @param string $text
         */
        public function setAbbr($text)
        {
                parent::setAttr("abbr", $text);
        }

        /**
         * Set the axis attribute.
         * @param string $category
         */
        public function setAxis($category)
        {
                parent::setAttr("axis", $category);
        }

        /**
         * Set the column span attribute.
         * @param int $num
         */
        public function setColspan($num)
        {
                parent::setAttr("colspan", $num);
        }

        /**
         * Set the row span attribute.
         * @param int $num
         */
        public function setRowspan($num)
        {
                parent::setAttr("rowspan", $num);
        }

        /**
         * Set the no wrap attribute.
         * @deprecated This property is deprecated in favor of CSS.
         */
        public function setNoWrap()    // Deprecated
        {
                parent::setAttr("nowrap", "nowrap");
        }

        /**
         * Set the scope attribute. See TABLE_ITEM_SCOPE_XXX.
         * @param string $scope
         */
        public function setScope($scope)
        {
                parent::setAttr("scope", $scope);
        }

        /**
         * This is a convenience function for:
         *
         * <code>
         * <?php
         * $cell->setLink($name, LINK_TYPE_NAME)->setTitle($str);
         * ?>
         * </code>
         *
         * @param string $str The resource target.
         * @param string $title Tooltip
         */
        public function setAnchor($str, $title)
        {
                parent::setLink(new Link(Link::TYPE_NAME, $str))->setTitle($title);
        }

}
