<?php

namespace Omnipay\Beanstream\Message;


/**
 * Dummy Response
 *
 * This is the response class for dummy requests.
 */
class DummyResponse extends \Omnipay\Common\Message\AbstractResponse
{
    public function isSuccessful()
    {
        return false;
    }

    public function getTransactionReference()
    {
        return null;
    }

    public function getMessage()
    {
        return 'Unexpected error accessing profile';
    }
}
