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

require("backend.php");

class SalBackend_Text extends SalBackend
{
    public $Path = "/var/log/sal/sal.txt";

    public function Write($item)
    {
        $item->User = str_replace("|", "_", $item->User);
        if (!file_put_contents($this->Path, $item->Time . "|" . $item->User . "|" . $item->Text . "\n", FILE_APPEND | LOCK_EX))
            return false;
        return true;
    }

    public function Read()
    {
        $result = [];
        $text = file_get_contents($this->Path);
        $items = explode("\n", $text);
        foreach ($items as $item)
        {
            if (strlen($item) < 2)
                continue;
            $parts = explode("|", $item);
            $result[] = new SalItem($parts[0], $parts[1], $parts[2]);
        }
        return $result;
    }
};
