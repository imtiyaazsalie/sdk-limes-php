<?php

namespace Tests\Services\API\Payment;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use SDKLimes\Client;
use SDKLimes\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DynamicServicesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testInitialize(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->api->payment->dynamicServices->initialize(
            services: [[]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testInitializeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->api->payment->dynamicServices->initialize(
            services: [
                [
                    'definitionCode' => 'VOICE',
                    'expiryDate' => 'expiryDate',
                    'priceInCents' => 0,
                    'transactionID' => 'transactionId',
                    'value' => 0,
                ],
            ],
            msisdn: 'msisdn',
            shippingCostInCents: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRecurring(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->api->payment->dynamicServices->recurring(
            msisdn: 'x',
            paymentMethodID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            services: [[]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRecurringWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->api->payment->dynamicServices->recurring(
            msisdn: 'x',
            paymentMethodID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            services: [
                [
                    'definitionCode' => 'VOICE',
                    'expiryDate' => 'expiryDate',
                    'priceInCents' => 0,
                    'transactionID' => 'transactionId',
                    'value' => 0,
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
