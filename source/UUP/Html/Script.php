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

namespace UUP\Html;

/**
 * This class represents an script element.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University)
 */
class Script extends Container
{

        // 
        // Constants for script tag:
        // 
        const TYPE_APPLICATION_JAVASCRIPT = 'application/javascript';
        const TYPE_APPLICATION_ECMASCRIPT = 'application/ecmascript';
        const TYPE_TEXT_VBSCRIPT = 'text/vbscript';
        const TYPE_TEXT_JAVASCRIPT = 'text/javascript';         // Obsolete
        const TYPE_TEXT_ECMASCRIPT = 'text/ecmascript';         // Obsolete

        /**
         * Constructor.
         * @param string|array $text The character data.
         */
        public function __construct($text = null)
        {
                parent::__construct("script");
                parent::setText($text);
        }

        /**
         * Specifies that the script is executed asynchronously (only for external scripts).
         */
        public function setAsync()
        {
                parent::setAttr("async", "async");
        }

        /**
         * Set the charset attribute.
         * @param string $encoding The character set encoding.
         */
        public function setCharSet($encoding)
        {
                parent::setAttr("charset", $encoding);
        }

        /**
         * Specifies that the script is executed when the page has finished 
         * parsing (only for external scripts).
         */
        public function setDefer()
        {
                parent::setAttr("defer", "defer");
        }

        /**
         * Sets the src attribute.
         * @param string $src The URI.
         */
        public function setSource($src)
        {
                parent::setAttr("src", $src);
        }

        /**
         * Set the MIME type for the script element.
         * @param type $type The MIME type. See constants SCRIPT_TYPE_XXX or IANA registrations.
         */
        public function setType($type = SCRIPT_TYPE_APPLICATION_JAVASCRIPT)
        {
                parent::setAttr("type", $type);
        }

}
