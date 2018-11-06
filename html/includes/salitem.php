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


class SalItem
{
    public $Time;
    public $User;
    public $Text;

    function __construct($_time, $_user, $_text)
    {
        $this->Time = $_time;
        $this->User = $_user;
        $this->Text = $_text;
    }
};
