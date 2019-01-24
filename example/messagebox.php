<!DOCTYPE html>
<!--
Copyright (C) 2015 Anders Lövgren (Nowise Systems/BMC-IT, Uppsala University).

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
        <title>Messagebox Example</title>
    </head>
    <body>
        <style>
                /**
 *  Message box style (#1: mostly square boxes with background).
**/
div.mbox {
    padding: 12px;
    padding-right: 40px;
    margin: 20px 0px 10px 0px;
    min-width: 350px;
    max-width: 600px;
    box-shadow: 1px 1px 6px #999999;
}
div.mbox-head {
    font-weight: bold;
    font-size: 1.5em;
    padding-bottom: 10px;
}
div.mbox-text {
    position: relative;
    left: 20px;
}
div.hint {
    border: 1px solid #aaaaaa;
    background: #f3f3f3;
}
div.success {
    border: 1px dotted #009900;
    background: #ddffaa;
}
div.info {
    border: 2px solid #000099;
    background: #ffffff;
    border-radius: 10px 10px 10px 10px;
}
div.warn {
    border: 1px dotted darkorange;
    background: #ffffcc;
}
div.error {
    border: 1px dotted #990000;
    background: #ffddcc;
}

/**
 *  Message box style (#2: rounded boxes without background).
**/
/*
div.mbox {
    padding: 12px;
    margin: 10px;
    box-shadow: 1px 1px 6px #999999;
    border-radius: 10px 10px 10px 10px;
    background: #ffffff;
}
div.mbox-head {
    font-weight: bold;
    font-size: 1.5em;
    padding-bottom: 10px;
}
div.mbox-text {
    position: relative;
    left: 20px;
}
div.hint {
    border: 1px solid #aaaaaa;
    background: #f3f3f3;
}
div.success {
    border: 2px solid #00cc00;
}
div.info {
    border: 2px solid #000099;
}
div.warn {
    border: 2px solid yellow;
}
div.error {
    border: 2px solid #cc0000;
}
*/


        </style>
            
        <h1>Messagebox Example</h1>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use UUP\Html\Utility\MessageBox;

        // ========================================================
        //  Message boxes in various styles.
        // ========================================================
        
        printf("<h4>Using MessageBox::show() without title:</h4>\n");
        MessageBox::show(MessageBox::HINT, "Hint message", null);
        MessageBox::show(MessageBox::INFORMATION, "Information message", null);
        MessageBox::show(MessageBox::SUCCESS, "Success message", null);
        MessageBox::show(MessageBox::WARNING, "Warning message", null);
        MessageBox::show(MessageBox::ERROR, "Error message", null);

        printf("<h4>Using MessageBox::show() with supplied title:</h4>\n");
        MessageBox::show(MessageBox::HINT, "Hint message", "Hint title");
        MessageBox::show(MessageBox::INFORMATION, "Information message", "Information title");
        MessageBox::show(MessageBox::SUCCESS, "Success message", "Success title");
        MessageBox::show(MessageBox::WARNING, "Warning message", "Warning title");
        MessageBox::show(MessageBox::ERROR, "Error message", "Error title");

        printf("<h4>Using MessageBox::show() with default title:</h4>\n");
        MessageBox::show(MessageBox::HINT, "Hint message");
        MessageBox::show(MessageBox::INFORMATION, "Information message");
        MessageBox::show(MessageBox::SUCCESS, "Success message");
        MessageBox::show(MessageBox::WARNING, "Warning message");
        MessageBox::show(MessageBox::ERROR, "Error message");

        printf("<h4>An MessageBox with multiple sections:</h4>\n");
        $text = sprintf("<p><b><u>%s</u></b><p/><p>%s</p>\n", "SELF CORRECTING EXAMINATIONS:", "If questions are of single- or multiple choice type, then the answer to " .
            "those are self correcting. The system will automatic assign an score for " .
            "answers to these questions, but the teacher (the one correcting the exam) " .
            "has the opportunity to override the score.");

        $text .= sprintf("<p><b><u>%s</u></b></p><p>%s</p><p>%s</p>\n", "MULTIMEDIA (VIDEO AND AUDIO):", "Multimedia is supported by adding an URL to the question. The system will " .
            "make an HTTP HEAD request to determine the content type of the media.", "Different content types can be handled by different media players (actually " .
            "classes that generates the HTML to embed the media on the HTML page). The " .
            "default media handling can be customized inside conf/config.inc.");

        MessageBox::show(MessageBox::INFORMATION, $text);

        ?>
    </body>
</html>
