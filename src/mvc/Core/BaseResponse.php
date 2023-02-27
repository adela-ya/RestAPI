<?php

namespace mvc\Core;

abstract class BaseResponse {
    abstract public function send(): void;
}
