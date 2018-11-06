<?php

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// Copyright (c) Petr Bena <petr@bena.rocks> 2018

require_once("psf/psf.php");
require_once("includes/salitem.php");
require_once("includes/backends/text.php");

$backend = new SalBackend_Text();

$w = new HtmlPage("Server admin log");
bootstrap_init($w);

$w->AppendHeader("Server admin log");
$w->AppendHtmlLine("<samp>\n");
foreach ($backend->Read() as $item)
{
    $w->AppendHtmlLine(date(DATE_ATOM, $item->Time) . " " . $item->User . ": " . htmlspecialchars($item->Text) . "<br>");
}
$w->AppendHtmlLine("</samp>\n");

$w->PrintHtml();
