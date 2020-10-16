<?php
declare(strict_types=1);

class ClassName {

    private $val;

    public function __construct(string $val) {
        $this->val = $val;
    }

    public function toString(): string {
        return $this->val;
    }
}

function name(string $s): ClassName {
    return new ClassName($s);
}

echo name("42423")->toString();
