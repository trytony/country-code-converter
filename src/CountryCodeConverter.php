<?php

namespace Zhangbingliang\CountryCodeConverter;

class CountryCodeConverter extends CodeConverter
{
    public function __construct()
    {
        parent::__construct(include 'countries.php');
    }
}