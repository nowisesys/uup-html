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
use UUP\Html\Text\BR;
use UUP\Html\Text\H4;
use UUP\Html\Text\HR;

/**
 * This class represent a HTML form.
 *
 * Convenience function is provided for commonly used form elements, for others,
 * use the addElement() function from the Container class.
 *
 * <code>
 * <?php
 *
 * $options = array('opt1' => 'val1', 'opt2' => 'val2');
 * $form = new Form('script.php');
 * $form->addHidden('arg1', $val);
 * $combo = $form->addComboBox('opt');
 * foreach($options as $name => $value) {
 *     $combo->addOption($value, $name);
 * }
 * $form->addSubmitButton();
 * $form->output();
 *
 * ?>
 * </code>
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
class Form extends Container
{

        /**
         * Constructor.
         *
         * The default action method can be overridden by defining
         * FORM_ACTION_DEFAULT before including this script.
         *
         * @param string $action The action attribute.
         * @param string $method The method attribute.
         */
        public function __construct($action, $method = FORM_ACTION_DEFAULT)
        {
                parent::__construct("form");
                parent::setAttr("action", $action);
                parent::setAttr("method", $method);
        }

        /**
         * Sets the name attribute of this form.
         * @param string $name
         */
        public function setName($name)
        {
                parent::setAttr("name", $name);
        }

        /**
         * Sets the encoding attribute.
         * @param string $mime
         */
        public function setEncodingType($mime)
        {
                parent::setAttr("enctype", $mime);
        }

        /**
         * Set the accept attribute. The value is a comma separated list of
         * accepted MIME types.
         *
         * @param string $mime
         */
        public function setAccept($mime)
        {
                parent::setAttr("accept", $mime);
        }

        /**
         * Sets the accept-charset attribute. The value is a comma and/or
         * space separated list of accepted charset values.
         *
         * @param string $charset
         */
        public function setAcceptCharset($charset)
        {
                parent::setAttr("accept-charset", $charset);
        }

        /**
         * Adds an hidden field to this form. Returns the hidden field object.
         * @param string $name The hidden field name.
         * @param string $value The hidden field value.
         * @return HiddenField
         */
        public function addHidden($name, $value)
        {
                return parent::addElement(new HiddenField($name, $value));
        }

        /**
         * Adds an textbox to this form. Returns the textbox object.
         * @param string $name The textbox name.
         * @param string $text The textbox text.
         * @return TextBox
         */
        public function addTextBox($name, $text = null)
        {
                return parent::addElement(new TextBox($name, $text));
        }

        /**
         * Adds an password input to this form. Returns the password input object.
         * @param string $name The password input name.
         * @param string $text The password input text.
         * @return Password
         */
        public function addPassword($name, $text = null)
        {
                return parent::addElement(new Password($name, $text));
        }

        /**
         * Adds an combobox to this form. Returns the combobox object.
         * @param string $name The combobox name.
         * @return ComboBox
         */
        public function addComboBox($name)
        {
                return parent::addElement(new ComboBox($name));
        }

        /**
         * Adds an checkbox to this form. Returns the checkbox object.
         * @param string $name The checkbox name.
         * @param string $value The checkbox value.
         * @param string $text The optional buddy text for the checkbox (label).
         * @return CheckBox
         */
        public function addCheckBox($name, $value, $text = null)
        {
                return parent::addElement(new CheckBox($name, $value, $text));
        }

        /**
         * Adds an radio button to this form. Returns the radio button object.
         * @param string $name The button name.
         * @param string $value The button value.
         * @param string $text The optional buddy text for the radio button (label).
         * @return RadioButton
         */
        public function addRadioButton($name, $value, $text = null)
        {
                return parent::addElement(new RadioButton($name, $value, $text));
        }

        /**
         * Adds an textarea to this form. Returns the textarea object.
         * @param string $name The textarea name.
         * @param string $text The textarea content.
         * @return TextArea
         */
        public function addTextArea($name, $text = null)
        {
                return parent::addElement(new TextArea($name, $text));
        }

        /**
         * Adds an file upload field to this form. Returns the file input object.
         * @param string $name The file upload name.
         * @return FileInput
         */
        public function addFileInput($name)
        {
                return parent::addElement(new FileInput($name));
        }

        /**
         * Adds an submit button to this form. Returns the submit button object.
         * @param string $name The submit button name (optional).
         * @param string $label The button label (optional).
         * @return SubmitButton
         */
        public function addSubmitButton($name = "submit", $label = null)
        {
                return parent::addElement(new SubmitButton($name, $label));
        }

        /**
         * Adds an reset button to this form. Returns the reset button object.
         * @param string $name The reset button name (optional).
         * @param string $label The button label (optional).
         * @return ResetButton
         */
        public function addResetButton($name = "reset", $label = null)
        {
                return parent::addElement(new ResetButton($name, $label));
        }

        /**
         * Adds an standard button to this form. Returns the button object.
         * @param string $name The button name.
         * @param string $label The button label (optional).
         * @return StandardButton
         */
        public function addStandardButton($name, $label = null)
        {
                return parent::addElement(new StandardButton($name, $label));
        }

        /**
         * Alternative function for adding a button to this form. Returns the
         * button object.
         * @param string $type One of the BUTTON_XXX constants.
         * @param string $label The button label.
         * @return SubmitButton|ResetButton|StandardButton
         */
        public function addButton($type = BUTTON_SUBMIT, $label = null)
        {
                switch ($type) {
                        case BUTTON_SUBMIT:
                                return parent::addElement(new SubmitButton($type, $label));
                        case BUTTON_RESET:
                                return parent::addElement(new ResetButton($type, $label));
                        case BUTTON_STANDARD:
                                return parent::addElement(new StandardButton($type, $label));
                }
        }

        /**
         * Adds an empty line to this form.
         * @return BR
         */
        public function addSpace()
        {
                return parent::addElement(new BR());
        }

        /**
         * Adds an hrozontal row (HR) to this form.
         * @return HR
         */
        public function addLine()
        {
                return parent::addElement(new HR());
        }

        /**
         * Adds an section header to this form. This is useful for dividing
         * a big form into multiple sections. The section header is using CSS
         * style secthead by default.
         *
         * @param string $text The section header text.
         * @param string $class The CSS class.
         * @return H4
         */
        public function addSectionHeader($text, $class = null)
        {
                $header = parent::addElement(new H4($text));
                $header->setClass(isset($class) ? $class : "secthead");
                return $header;
        }

}
