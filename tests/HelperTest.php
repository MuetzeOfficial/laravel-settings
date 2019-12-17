<?php

namespace MuetzeOfficial\Settings\Test;

use MuetzeOfficial\Settings\Setting;

class HelperTest extends BaseTest
{
    /** @test */
    public function it_can_get_instance()
    {
        $this->assertInstanceOf(Setting::class, setting());
    }

    /** @test */
    public function it_can_set()
    {
        setting(['foo' => 'bar']);

        $this->assertDatabaseHas('settings', ['key' => 'foo', 'value' => 'bar']);
    }

    /** @test */
    public function it_can_get_default()
    {
        $this->assertEquals('baz', setting('foo', 'baz'));
    }

    /** @test */
    public function it_can_get()
    {
        setting(['foo' => 'bar']);

        $this->assertEquals('bar', setting('foo', 'baz'));
    }

    /** @test */
    public function it_can_check_if_exists()
    {
        $this->assertFalse(setting_exists('foo'));

        setting(['foo' => 'bar']);

        $this->assertTrue(setting_exists('foo'));
    }

    /** @test */
    public function it_can_remove()
    {
        setting(['foo' => 'bar']);

        $this->assertDatabaseHas('settings', ['key' => 'foo', 'value' => 'bar']);

        setting()->remove('foo');

        $this->assertDatabaseMissing('settings', ['key' => 'foo', 'value' => 'bar']);
    }
}
