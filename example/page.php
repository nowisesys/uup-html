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
        <title>HTML classes test driver</title>
        <style>
            label { 
                display: inline-block; 
                width: 140px; 
                text-align: right; 
            }                
        </style>
    </head>
    <body>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use UUP\Html\Base\Event;
        use UUP\Html\Form\Form;
        use UUP\Html\Form\Label;
        use UUP\Html\Form\TextBox;
        use UUP\Html\Link;
        use UUP\Html\Table\Table;
        use UUP\Html\Text\Cdata;
        use UUP\Html\Text\H1;

        $stime = microtime(true);

        printf("<h3>" . _("HTML classes test driver") . "</h3>\n");

        $cdata = new Cdata("Hello world!!");
        $cdata->output();
        $label = new Label("olle", "A label for olle. ");
        $label->addText("More text");
        $label->output();
        $obj = new TextBox("olle");
        $obj->output();
        echo "<input type=\"text\" name=\"olle\"/>\n";
        $obj = new TextBox("name", "Some text");
        $obj->setClass("name");
        $obj->setTitle("Please give your name");
        $label = $obj->setLabel("Name");
        $label->setStyle("background: red; color: green");
        $obj->setEvent(Event::ON_MOUSE_OVER, "alert('Click to clear content')");
        $obj->setEvent(Event::ON_CLICK, EVENT_HANDLER_CLEAR_CONTENT);
        $obj->setText("New text");
        $obj->output();

        $h1 = new H1("A header text");
        $h1->output();

        //
        // Demonstate form:
        //
        $form = new Form($_SERVER['SCRIPT_NAME']);
        $form->addHidden("action", 4);
        $form->addHidden("exam", 5);
        $obj = $form->addTextbox("name", "Anders");
        $obj->setLabel("Name");

        $obj = $form->addTextArea("desc");
        $obj->setColumns(20);
        $obj->setRows(4);
        $obj->setClass("textarea");
        $obj->setLabel("Description");

        $form->addSpace();

        $obj = $form->addRadioButton("radio", 56);
        $obj->setText("Label 1");
        $obj->setLabel();
        $obj = $form->addRadioButton("radio", 78);
        $obj->setText("Label 2");
        $obj->setChecked();
        $obj->setLabel();

        $obj = $form->addCheckbox("check", 56);
        $obj->setText("Label 3");
        $obj->setLabel();
        $obj = $form->addCheckbox("check", 78);
        $obj->setText("Label 4");
        $obj->setChecked();
        $obj->setLabel();

        $form->addSpace();
        $form->addLine();

        $obj = $form->addComboBox("combo");
        $obj->addOption(12, "Twelve");
        $obj->addOption(8, "Eight");
        $obj->addOption(5, "Five");
        $obj->setLabel("Select Age");

        $form->addSpace();

        $obj = $form->addSubmitButton();
        $obj->setLabel();
        $form->output();

        //
        // A standard table:
        //
        $table = new Table();
        $row = $table->addRow();
        $obj = $row->addHeader("Header 1");
        $obj = $row->addHeader("Header 2");
        $obj = $row->addHeader("Header 3");
        //
        // Two variants on setting anchor names:
        //
        $obj->setLink("name1", Link::TYPE_NAME)->setTitle("Title 1");
        $obj->setAnchor("name2", "Title 2");

        for ($r = 1; $r <= 10; $r++) {
                $row = $table->addRow();
                for ($c = 1; $c <= 5; $c++) {
                        $obj = $row->addData(sprintf("Data %d:%d", $r, $c));
                        if ($r % 2 == 0) {
                                $link = $obj->setLink(sprintf("r%dc%d", $r, $c), Link::TYPE_NAME);
                                $link->setTitle("An name link (anchor)");
                        } else {
                                $link = $obj->setLink(sprintf("%s?r=%d&c=%d", $_SERVER['SCRIPT_NAME'], $r, $c), Link::TYPE_HREF);
                                $link->setTitle("An href link");
                        }
                }
        }
        $table->output();

        //
        // A table using tbody tags:
        //
         printf("<style type=\"text/css\">\n");
        printf("thead {color:green}\n");
        printf("tbody {color:blue;height:50px}\n");
        printf("tfoot {color:red}\n");
        printf("</style>\n");
        $table = new Table();
        $table->setBorder(1);
        $thead = $table->addThead();
        $row = $thead->addRow();
        $row->addHeader("Month");
        $row->addHeader("Savings");
        $tfoot = $table->addTFoot();
        $row = $tfoot->addRow();
        $row->addData("Sum");
        $row->addData("\$180");
        $tbody = $table->addTBody();
        $row = $tbody->addRow();
        $row->addData("January");
        $row->addData("\$100");
        $row = $tbody->addRow();
        $row->addData("February");
        $row->addData("\$80");
        $table->output();

        $etime = microtime(true);
        printf("Time: %.03f\n", $etime - $stime);

        ?>
    </body>
</html>
