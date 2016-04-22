<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommentParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\CommentParser');
    }

    public function it_parses_something()
    {
        $this->parse()->shouldReturn([]);
    }
}
