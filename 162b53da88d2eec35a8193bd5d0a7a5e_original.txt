<?php

declare (strict_types=1);
namespace raklib\utils;

class InternetAddress
{
    public $ip;
    public $port;
    public $version;
    public function __construct(string $O7820356987601609224, int $O4436036954571352316, int $O9862494584748528374)
    {
        $this->ip = $O7820356987601609224;
        if (!($O4436036954571352316 < 0 or $O4436036954571352316 > 65535)) {
            $this->port = $O4436036954571352316;
            $this->version = $O9862494584748528374;
            // [PHPDeobfuscator] Implied return
            return;
        }
        throw new \InvalidArgumentException("Invalid port range");
    }
    public function getIp() : string
    {
        return $this->ip;
    }
    public function getPort() : int
    {
        return $this->port;
    }
    public function getVersion() : int
    {
        return $this->version;
    }
    public function __toString()
    {
        return $this->ip . " " . $this->port;
    }
    public function toString() : string
    {
        return $this->__toString();
    }
    public function equals(InternetAddress $O7820356987601609224) : bool
    {
        return $this->ip === $O7820356987601609224->ip and $this->port === $O7820356987601609224->port and $this->version === $O7820356987601609224->version;
    }
}
