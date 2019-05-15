<?php

namespace Zhangbingliang\CountryCodeConverter;

class StateCodeConverter extends CodeConverter
{

    public function __construct()
    {
        parent::__construct(include 'states.php');
    }
}