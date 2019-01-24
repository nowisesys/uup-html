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

/**
 * This class represent a non-containing HTML tag.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Component extends Element
{

        private $label;

        /**
         * Output HTML for this object.
         */
        public function output()
        {
                if (isset($this->label)) {
                        $this->label->output();
                }
                parent::output(Element::OUTPUT_COMPONENT);
        }

        /**
         * Sets a label for this component. Calling this function makes sense
         * only for visual elemements, like textboxes, not for hidden fields.
         *
         * @param string $text
         * @return Label
         */
        public function setLabel($text = null)
        {
                $this->label = new Label($this->getName(), $text);
                return $this->label;
        }

}
