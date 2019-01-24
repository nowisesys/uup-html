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
 * The table row class represents a single table containing table header or
 * data elements.
 *
 * @see TableData
 * @see TableHeader
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class TableRow extends TableItem
{

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("tr");
        }

        /**
         * Add an table header to this table row.
         *
         * @param string $text The header text.
         * @return TableHeader
         */
        public function addHeader($text)
        {
                return parent::addElement(new TableHeader($text));
        }

        /**
         * Add an table data to this table row.
         * @param string $text The cell text.
         * @return TableData
         */
        public function addData($text = "&nbsp;")
        {
                return parent::addElement(new TableData($text));
        }

}
