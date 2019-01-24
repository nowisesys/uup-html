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

namespace UUP\Html\Form;

use UUP\Html\Base\Container;

/**
 * This class represent a label for an element (i.e. a textbox).
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Label extends Container
{

        /**
         * Constructor.
         * @param string $for The name of the buddy element.
         * @param string $text The label text.
         */
        public function __construct($for, $text = null)
        {
                parent::__construct("label");
                parent::setAttr("for", $for);
                parent::setText(isset($text) ? $text . ":" : "&nbsp;");
        }

        /**
         * Output HTML for this label.
         */
        public function output()
        {
                printf("<br/>\n");
                parent::output();
        }

}
