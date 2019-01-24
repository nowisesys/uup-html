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

/**
 * The default locale dependent format string for date.
 */
if (!defined('TREE_NODE_DATE_FORMAT')) {
        define('TREE_NODE_DATE_FORMAT', '%X');
}
/**
 * The default locale dependent format string for time.
 */
if (!defined('TREE_NODE_TIME_FORMAT')) {
        define('TREE_NODE_TIME_FORMAT', '%x');
}
/**
 * The default locale dependent format string for datetime.
 */
if (!defined('TREE_NODE_DATETIME_FORMAT')) {
        define('TREE_NODE_DATETIME_FORMAT', '%X %x');
}

/**
 * Utility class for building trees.
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 * @see TreeBuilder
 *
 * @package UUP
 * @subpackage Html
 */
class TreeNode
{

        private $label;                // Node text
        private $links = array();      // Optional links
        private $items = array();      // Optional text items
        private $childs = array();     // Array of TreeNode objects.
        private $link = null;

        /**
         * Constructor.
         * @param string $label The node text.
         */
        public function __construct($label)
        {
                $this->label = $label;
        }

        /**
         * Sets a link on this tree node.
         *
         * @param string $url The target URL.
         * @param string $title The tooltip for this link.
         */
        public function setLink($url, $title = null)  // This node links to...
        {
                if (isset($title)) {
                        $this->link = array("href" => $url, "title" => $title);
                } else {
                        $this->link = array("href" => $url);
                }
        }

        /**
         * Adds a link to this tree node.
         *
         * @param string $name The text.
         * @param string $url The target URL.
         * @param string $title The tooltip (optional).
         * @param array $attr An associative array of link attributes.
         */
        public function addLink($name, $url, $title = null, $attr = null)
        {
                if (isset($title)) {
                        $this->links[$name] = array("href" => $url, "title" => $title);
                } else {
                        $this->links[$name] = array("href" => $url);
                }
                if (isset($attr)) {
                        foreach ($attr as $key => $value) {
                                $this->links[$name][$key] = $value;
                        }
                }
        }

        /**
         * Add plain text child node.
         * @param string $text The text.
         */
        public function addText($text)
        {
                $this->items[] = $text;
        }

        /**
         * Adds an child node to this node.
         *
         * @param TreeNode|string $child The child node.
         * @return TreeNode
         */
        public function addChild($child)
        {
                if (is_object($child)) {
                        $this->childs[] = $child;
                } else {
                        $child = new TreeNode($child);
                        $this->childs[] = $child;
                }
                return $child;
        }

        /**
         * Add dates sub nodes to this tree node. This is an utility method
         * that creates a time span if start and end date is on the same day.
         *
         * @param int $sdate A UNIX timestamp for start time.
         * @param int $edate A UNIX timestamp for end time.
         */
        public function addDates($sdate, $edate)
        {
                if (date('Ymd', $sdate) == date('Ymd', $edate)) {
                        $this->addChild(sprintf("%s: %s %s - %s", _("Occasion"), strftime(TREE_NODE_DATE_FORMAT, $sdate), strftime(TREE_NODE_TIME_FORMAT, $sdate), strftime(TREE_NODE_TIME_FORMAT, $edate)));
                } else {
                        $this->addChild(sprintf("%s: %s", _("Starts"), strftime(TREE_NODE_DATETIME_FORMAT, $sdate)));
                        $this->addChild(sprintf("%s: %s", _("Ends"), strftime(TREE_NODE_DATETIME_FORMAT, $edate)));
                }
        }

        /**
         * Get array of all child nodes.
         * @return TreeNode
         */
        public function getChilds()
        {
                return $this->childs;
        }

        /**
         * Helper funtion for formatting the link attributes. Returns the
         * formatted string.
         *
         * @param array $attr Associative array of attribute values.
         * @return string
         */
        private function attr($attr)
        {
                $str = "";
                foreach ($attr as $name => $value) {
                        $str .= sprintf("%s=\"%s\" ", $name, $value);
                }
                return $str;
        }

        /**
         * Output this node and any child nodes.
         */
        public function output()
        {
                printf("<ul><li>");
                if (isset($this->link)) {
                        printf("<a %s>%s</a>", $this->attr($this->link), $this->label);
                } else {
                        printf("%s", $this->label);
                }
                foreach ($this->items as $text) {
                        printf("<br />%s", $text);
                }
                $links = array();
                if (count($this->links) != 0) {
                        printf("<span class=\"links\">");
                        foreach ($this->links as $name => $attr) {
                                $links[] = sprintf("<a %s>%s</a>", $this->attr($attr), $name);
                        }
                        printf("%s</span>", implode(", ", $links));
                }
                printf("</li>");
                foreach ($this->childs as $child) {
                        $child->output();
                }
                printf("</ul>\n");
        }

}

?>
