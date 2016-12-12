<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Dummy Response
 *
 * This is the response class for dummy requests.
 *
 */
class DummyResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return FALSE;
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
