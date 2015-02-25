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
 * This class represent the top node in the tree.
 *
 * <code>
 * <?php
 *
 * //
 * // Display a two level deep tree with links.
 * //
 * function display($data) {
 *     $tree = new TreeBuilder($name);
 *     $root = $tree->getRoot();
 *     foreach($data as $c) {
 *         //
 *         // First level has 'add' link.
 *         //
 *         $node = $root->addChild($c->name);
 *         $node->setLink($c->link->show):
 *         $node->addLink($c->link->add);
 *         foreach($c as $d) {
 *             //
 *             // Second level has 'edit' and 'delete' links.
 *             // 
 *             $node->addChild($d->name);
 *             $node->addLink($d->link->edit);
 *             $node->addLink($d->link->delete);
 *         }
 *     }
 *     $tree->output();
 * }
 *
 * ?>
 * </code>
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
class TreeBuilder
{

        private $root;   // The root node

        /**
         * Constructor.
         * @param string $label The root node text.
         */

        public function __construct($label = "")
        {
                $this->root = new TreeNode($label);
        }

        /**
         * Get the root node.
         * @return TreeNode
         */
        public function getRoot()
        {
                return $this->root;
        }

        /**
         * Calls $root->output() on the root tree node. This will recursive
         * output any child node set in this tree.
         */
        public function output()
        {
                $this->root->output();
        }

}

?>
