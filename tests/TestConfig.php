<?php

class TestConfig
{
    public const BASE_URL = 'https://demo.traccar.org/api';
    public const EMAIL = 'traccar@traccar.org';
    public const PASSWORD = 'traccar';
    public const TEST_DEVICE_ID = 1;
    public const TEST_USER_ID = 1;
    public const TEST_GROUP_ID = 1;
    public const TIMEOUT = 30;

    public static function getBaseUrl(): string
    {
        return getenv('TRACCAR_BASE_URL') ?: self::BASE_URL;
    }

    public static function getEmail(): string
    {
        return getenv('TRACCAR_EMAIL') ?: self::EMAIL;
    }

    public static function getPassword(): string
    {
        return getenv('TRACCAR_PASSWORD') ?: self::PASSWORD;
    }

    public static function getTestDeviceData(): array
    {
        return [
            'name' => 'PHPUnit Test Device ' . time(),
            'uniqueId' => 'PHPUNIT_' . uniqid(),
            'phone' => '+1234567890',
            'model' => 'GT06',
            'category' => 'test',
        ];
    }

    public static function getTestGroupData(): array
    {
        return [
            'name' => 'PHPUnit Test Group ' . time(),
        ];
    }

    public static function getTestUserData(): array
    {
        return [
            'name' => 'PHPUnit Test User ' . time(),
            'email' => 'phpunit+' . uniqid() . '@example.test',
            'password' => 'secret123',
        ];
    }
}
