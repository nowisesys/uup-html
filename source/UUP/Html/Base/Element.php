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

/**
 * This class serves as the base class for component and container classes.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Element
{

        // 
        // Output mode for HTML element:
        // 
        const OUTPUT_COMPONENT = 1;
        const OUTPUT_CONTAINER_START = 2;
        const OUTPUT_CONTAINER_END = 3;

        private $tag;                // The tag name (i.e. h2)
        private $class;              // The classname (CSS)
        private $id;                 // The unique ID (CSS)
        private $style;              // Inline style
        private $title;              // The title attribute.
        private $event = array();    // Event attributes
        private $attr = array();     // HTML tag attributes

        /**
         * Contruct the HTML tag element.
         *
         * @param string $tag The element name.
         */

        protected function __construct($tag)
        {
                $this->tag = $tag;
        }

        /**
         * Set classname (CSS)
         *
         * @param string $class  The class name.
         */
        public function setClass($class)
        {
                $this->class = $class;
        }

        /**
         * Set unique ID (CSS)
         *
         * @param string $id The ID
         */
        public function setId($id)
        {
                $this->id = $id;
        }

        /**
         * Set inline style.
         *
         * @param string $style
         */
        public function setStyle($style)
        {
                $this->style = $style;
        }

        /**
         * Set optional title (tooltip)
         *
         * @param string $title
         */
        public function setTitle($title)
        {
                $this->title = $title;
        }

        /**
         * Set javascript code for event.
         *
         * @param string $event The event name
         * @param string $code Javascript code.
         */
        public function setEvent($event, $code)
        {
                $this->event[$event] = $code;
        }

        /**
         * Set an HTML attribute (i.e. name or selected).
         *
         * @param string $name
         * @param string $value
         */
        protected function setAttr($name, $value = null)
        {
                $this->attr[$name] = $value;
        }

        /**
         * Get the name of this element.
         * @return string
         */
        public function getName()
        {
                return $this->attr['name'];
        }

        /**
         * Get the unique ID of this element.
         * 
         * @return string 
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Output this HTML element. See Element::OUTPUT_XXX
         *
         * @param int $mode
         */
        protected function output()
        {
                $mode = func_get_arg(0);
                
                if ($mode == Element::OUTPUT_CONTAINER_START ||
                    $mode == Element::OUTPUT_COMPONENT) {
                        printf("<%s", $this->tag);
                        if (isset($this->class)) {
                                printf(" class=\"%s\"", $this->class);
                        }
                        if (isset($this->id)) {
                                printf(" id=\"%s\"", $this->id);
                        }
                        if (isset($this->style)) {
                                printf(" style=\"%s\"", $this->style);
                        }
                        if (count($this->attr) != 0) {
                                foreach ($this->attr as $name => $value) {
                                        if (isset($name)) {
                                                if (isset($value)) {
                                                        printf(" %s=\"%s\"", $name, $value);
                                                } else {
                                                        printf(" %s", $name);
                                                }
                                        }
                                }
                        }
                        if (count($this->event) != 0) {
                                foreach ($this->event as $event => $code) {
                                        printf(" %s=\"%s\"", $event, $code);
                                }
                        }
                        if (isset($this->title)) {
                                printf(" title=\"%s\"", $this->title);
                        }

                        if ($mode == Element::OUTPUT_COMPONENT) {
                                printf("/>\n");
                        } else {
                                printf(">");
                        }
                }
                if ($mode == Element::OUTPUT_CONTAINER_END) {
                        printf("</%s>\n", $this->tag);
                }
        }

}
