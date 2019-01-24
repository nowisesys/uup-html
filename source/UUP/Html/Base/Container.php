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

namespace UUP\Html\Base;

use UUP\Html\Form\Label;
use UUP\Html\Link;
use UUP\Html\Text\Cdata;

/**
 * This class represent a containing tag, like table, form or table row.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Container extends Element
{

        /**
         * The character data object.
         * @var Cdata 
         */
        private $cdata;
        /**
         * Optional label.
         * @var string 
         */
        private $label;
        /**
         * Contained elements.
         * @var type 
         */
        private $childs = array();

        /**
         * Add a child element (component, container or character data (cdata))
         * to this objects child element collection. Returns the newly added
         * object.
         *
         * @param Element|Cdata $child The child element.
         * @return Element|Cdata
         */
        public function addElement($child)
        {
                $this->childs[] = $child;
                return $child;
        }

        /**
         * Get number of immediate child elements.
         * @return int 
         */
        public function count()
        {
                return count($this->childs);
        }

        /**
         * Set a block of text (as cdata).
         * 
         * This function replaces any previous character data. Returns the 
         * new cdata object.
         * 
         * @param string $text The character data.
         * @return Cdata 
         */
        public function setText($text)
        {
                $this->cdata = new Cdata($text);
                return $this->cdata;
        }

        /**
         * Append a block of text (as cdata).
         *
         * This function should be called after setText() has been called. It
         * is an error to call this function without a previous call to 
         * setText().
         * 
         * @param string $text The character data.
         * @return Cdata 
         */
        public function addText($text)
        {
                $this->cdata->addText($text);
                return $this->cdata;
        }

        /**
         * Sets a label for this component. Calling this function makes sense
         * only for visual elemements, like textboxes, not for hidden fields.
         *
         * @param string $text The label text.
         * @return Label
         */
        public function setLabel($text = null)
        {
                $this->label = new Label($this->getName(), $text);
                return $this->label;
        }

        /**
         * Set the link object.
         * 
         * If link is a string, then a new link (href) is created.
         * 
         * @param Link|string $link The link object or string.
         * @return Link
         */
        public function setLink($link)
        {
                if (is_string($link)) {
                        $link = new Link(Link::TYPE_HREF, $link);
                }
                $this->cdata->setLink($link);
                return $link;
        }

        /**
         * Output HTML for this container and its child elements (if any).
         */
        public function output()
        {
                if (isset($this->label)) {
                        $this->label->output();
                }
                parent::output(Element::OUTPUT_CONTAINER_START);
                if (count($this->childs) > 1) {
                        printf("\n");
                }
                foreach ($this->childs as $child) {
                        $child->output();
                }
                if (isset($this->cdata)) {
                        $this->cdata->output();
                }
                parent::output(Element::OUTPUT_CONTAINER_END);
        }

}
