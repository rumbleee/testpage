<?php
    class CryptoModel
    {
        const URL = 'https://coinlib.io/api/v1/coinlist?key=2dd926915f8c7b53&pref=BTC&page=1&order=volume_desc';

        public function getURL()
        {
            return self::URL.$this->name;
        }

    }