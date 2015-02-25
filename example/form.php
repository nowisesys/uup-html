<!DOCTYPE html>
<!--
Copyright (C) 2015 Anders Lövgren (QNET/BMC CompDept).

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Example</title>
        <style>
            label { 
                display: inline-block; 
                width: 140px; 
                text-align: right; 
            }                
        </style>
    </head>
    <body>
        <script>
                function check_form(obj, msg) {
                    if (obj.value === "") {
                        alert(msg);
                        obj.focus();
                        obj.style.background = 'yellow';
                        return false;
                    } else {
                        obj.style.background = 'white';
                        return true;                            
                    }
                }
        </script>
        <h1>Form Example</h1>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use UUP\Html\Base\Button;
        use UUP\Html\Base\Event;
        use UUP\Html\Form\Form;

        $domains = array(
                'example1.com' => 'Domain1',
                'example2.com' => 'Domain2',
                'example3.com' => 'Domain3'
        );

        $form = new Form("");
        
        $input = $form->addTextBox('user');
        $input->setLabel('Username');
        $input->setEvent(Event::ON_BLUR, EVENT_HANDLER_CHECK_EMPTY);
        
        $input = $form->addTextBox('pass');
        $input->setLabel('Password');
        $input->setEvent(Event::ON_BLUR, EVENT_HANDLER_CHECK_EMPTY);
        
        $input = $form->addComboBox('domain');
        $input->setLabel('Domain');
        foreach ($domains as $domain => $name) {
                $input->addOption($domain, $name);
        }
        
        $form->addSpace();
        $input = $form->addButton(Button::SUBMIT, 'Login');
        $input->setLabel();
        
        $form->output();

        ?>
    </body>
</html>
