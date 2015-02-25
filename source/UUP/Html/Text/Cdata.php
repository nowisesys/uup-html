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

namespace UUP\Html\Text;

use UUP\Html\Link;

/**
 * This class represent a block of text (CDATA).
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
class Cdata
{

        const separator = ' ';

        private $text;
        private $link;

        /**
         * Constructor.
         * @param string|array $text The text.
         */
        public function __construct($text)
        {
                self::addText($text);
        }

        /**
         * Append text.
         * @param string|array $text The text to append.
         * @param string $space Add space between this text and previous.
         */
        public function addText($text, $space = self::separator)
        {
                if (isset($this->text)) {
                        $this->text .= $space;
                }
                if (is_array($text)) {
                        $this->text .= implode($space, $text);
                } else {
                        $this->text .= $text;
                }
        }

        /**
         * Set a link to this block of text. This makes the link a container
         * of this object.
         *
         * @param Link $link 
         */
        public function setLink($link)
        {
                $this->link = $link;
                $this->link->setText($this->text);
        }

        /**
         * Output HTML for this object.
         */
        public function output()
        {
                if (isset($this->link)) {
                        $this->link->output();
                } else {
                        echo $this->text;
                }
        }

        /**
         * Get this object as string.
         * @return string 
         */
        public function __toString()
        {
                return $this->text;
        }

}
