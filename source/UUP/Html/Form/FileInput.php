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

use UUP\Html\Base\Input;

/**
 * This class represents an file upload field in a form object.
 *
 * @package UUP
 * @subpackage Html
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 * @see Form
 */
class FileInput extends Input
{

        /**
         * Constructor.
         * @param string $name The file upload name.
         */
        public function __construct($name)
        {
                parent::__construct("file", $name);
        }

        /**
         * A comma separated list of accepted MIME types.
         *
         * @param string $mime Accepted MIME types (advisory only).
         */
        public function setAccept($mime)
        {
                parent::setAttr("accept", $mime);
        }

}
