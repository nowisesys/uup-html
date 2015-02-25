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
 * Respresents a DL element.
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (Computing Department at BMC, Uppsala University)
 */
class DescriptionList extends Container
{

        /**
         * Constructor.
         */
        public function __construct()
        {
                parent::__construct("dl");
        }

        /**
         * Adds a description term to this description list. 
         * @param string $text The description term.
         * @return DescriptionTerm
         */
        public function addTerm($text)
        {
                return parent::addElement(new DescriptionTerm($text));
        }

        /**
         * Adds a description data to this description list.
         * @param string $text The description data.
         * @return DescriptionData
         */
        public function addData($text)
        {
                return parent::addElement(new DescriptionData($text));
        }

}
