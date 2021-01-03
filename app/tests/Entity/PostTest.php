<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testPost()
    {
        $post = new Post();
        $this->assertSame(true);
    }
}
