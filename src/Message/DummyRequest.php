<?php

namespace Omnipay\Beanstream\Message;

/* 
 * Used for faking requests after failed attempts at profile operations.
 */
class DummyRequest extends \Omnipay\Common\Message\AbstractRequest
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
