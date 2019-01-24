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

namespace UUP\Html\Utility;

use UUP\Html\Base\Element;
use UUP\Html\Form\Form;
use UUP\Html\Table\Table;
use UUP\Html\Text\Cdata;
use UUP\Html\Text\Header;
use UUP\Html\Text\Paragraph;

/**
 * Generic HTML container.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Content
{

        private $content = array();

        /**
         * Add content object to this object.
         *
         * @param CData|Element $content
         * @return CData|Element
         */
        public function addContent($content)
        {
                $this->content[] = $content;
                return $content;
        }

        /**
         * Adds an header to this object.
         *
         * @param string $text The header text.
         * @param int $size The header size.
         * @return Header
         */
        public function addHeader($text, $size = 3)
        {
                return $this->addContent(new Header($size, $text));
        }

        /**
         * Add a section of plain text.
         * @param string|array $text The text.
         * @return Cdata
         */
        public function addText($text)
        {
                return $this->addContent(new Cdata($text));
        }
        
        /**
         * Add an paragraph object. The text argument might contain an array
         * of string that's going to be concatenated.
         * @param string|array $text The paragraph content.
         * @return Paragraph
         */
        public function addParagraph($text)
        {
                return $this->addContent(new Paragraph($text));
        }
        
        /**
         * Add an table object.
         * @return Table
         */
        public function addTable()
        {
                return $this->addContent(new Table());
        }

        /**
         * Add an form object. See the documentation of class Form for more
         * information.
         * 
         * @param string $action The action attribute.
         * @param string $method The method attribute.
         * @return Form
         */
        public function addForm($action, $method = FORM_ACTION_DEFAULT)
        {
                return $this->addContent(new Form($action, $method));
        }

        public function output()
        {
                foreach ($this->content as $content) {
                        $content->output();
                }
        }

}
