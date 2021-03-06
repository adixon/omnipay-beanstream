<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Tests\TestCase;

class FetchProfileCardsRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new FetchProfileCardsRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize();
    }

    public function testSendSuccess()
    {
        $this->request->setProfileId('8F10Ab54FC434b71972cF2E442c0fb4f');
        $this->setMockHttpResponse('FetchProfileCardsSuccess.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame(1, $response->getCode());
        $this->assertSame('Operation Successful', $response->getMessage());
        $this->assertSame('8F10Ab54FC434b71972cF2E442c0fb4f', $response->getCustomerCode());
    }

    public function testSendError()
    {
        $this->request->setProfileId('8F10Ab54FC434b71972cF2E442c0fb4f');
        $this->setMockHttpResponse('FetchProfileCardsFailure.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame(15, $response->getCode());
        $this->assertSame(3, $response->getCategory());
        $this->assertSame('Customer code to modify does not exist', $response->getMessage());
    }

    public function testEndpoint()
    {
        $this->assertSame($this->request, $this->request->setProfileId('1'));
        $this->assertSame('1', $this->request->getProfileId());
        $this->assertSame('https://www.beanstream.com/api/v1/profiles/' . $this->request->getProfileId() . '/cards', $this->request->getEndpoint());
    }

    public function testHttpMethod()
    {
        $this->assertSame('GET', $this->request->getHttpMethod());
    }
}
