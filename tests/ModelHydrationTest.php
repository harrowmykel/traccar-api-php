<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PiccmaQ\TraccarApi\Models\DeviceModel;
use PiccmaQ\TraccarApi\TraccarApi;

$mock = new MockHandler([
    new Response(200, ['Content-Type' => 'application/json'], '[{"id":1,"name":"Alpha","uniqueId":"u1"}]'),
    new Response(200, ['Content-Type' => 'application/json'], '{"id":2,"name":"Beta","uniqueId":"u2"}'),
]);

$handlerStack = HandlerStack::create($mock);
$client = new Client(['handler' => $handlerStack]);

$api = new TraccarApi(['httpClient' => $client, 'baseUrl' => 'https://example.test/api']);

$listResponse = $api->devices()->list();
if (!$listResponse->isSuccessful()) {
    throw new RuntimeException('List request should be successful.');
}

$structuredBody = $listResponse->getStructuredBody();
if (!is_array($structuredBody) || count($structuredBody) !== 1) {
    throw new RuntimeException('Collection response should hydrate to an array of models.');
}

$firstDevice = $structuredBody[0];
if (!$firstDevice instanceof DeviceModel || $firstDevice->getName() !== 'Alpha') {
    throw new RuntimeException('Collection response should hydrate DeviceModel instances.');
}

$getResponse = $api->devices()->get(2);
$singleDevice = $getResponse->getStructuredBody();
if (!$singleDevice instanceof DeviceModel || $singleDevice->getName() !== 'Beta') {
    throw new RuntimeException('Single response should hydrate a DeviceModel instance.');
}

echo "Model hydration test passed\n";
