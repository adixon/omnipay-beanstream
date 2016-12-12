<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Common\Message\AbstractRequest;

/* 
 * Used for faking requests after failed attempts at profile operations.
 */
class DummyRequest extends AbstractRequest
{
    public function getData()
    {
        return;
    }

    public function sendData($data)
    {
        return $this->response = new DummyResponse($this, $data);
    }
}
