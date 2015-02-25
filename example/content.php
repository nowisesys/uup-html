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
        <title>Content Example</title>
    </head>
    <body>
        <h1>Content Example</h1>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use UUP\Html\Utility\Content;
        
        // ========================================================
        //  Use generic content container.
        // ========================================================

        $content = new Content();
        $content->addHeader("Header 1");

        $table = $content->addTable();
        $row = $table->addRow();
        $row->addData()->setText("Text 1");
        $row->addData()->setText("Text 2");
        $row->addData()->setText("Text 3");
        $row = $table->addRow();
        $row->addData()->setText("Text 4");
        $row->addData()->setText("Text 5");
        $row->addData()->setText("Text 6");

        $content->addHeader("Sub header", 4);
        $content->addParagraph("Some paragraph text...");
        $content->addParagraph("Next paragraph...");

        $content->output();

        ?>
    </body>
</html>
