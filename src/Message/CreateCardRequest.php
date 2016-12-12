<?php namespace Omnipay\Beanstream\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        return $this->endpoint . '/profiles';
    }

    public function getProfileId()
    {
        return $this->getParameter('profile_id');
    }

    public function setProfileId($value)
    {
        return $this->setParameter('profile_id', $value);
    }

    public function getCardId()
    {
        return $this->getParameter('card_id');
    }

    public function setCardId($value)
    {
        return $this->setParameter('card_id', $value);
    }

    public function getComment()
    {
        return $this->getParameter('comment');
    }

    public function setComment($value)
    {
        return $this->setParameter('comment', $value);
    }


    public function getData()
    {
        $data = array(
            'language' => $this->getLanguage(),
            'comment' => $this->getComment(),
            'billing' => $this->getBilling()
        );

        if ($this->getCard()) {
            $this->getCard()->validate();

            $data['card'] = array(
                'number' => $this->getCard()->getNumber(),
                'name' => $this->getCard()->getName(),
                'expiry_month' => $this->getCard()->getExpiryDate('m'),
                'expiry_year' => $this->getCard()->getExpiryDate('y'),
                'cvd' => $this->getCard()->getCvv(),
            );

            $billing = $this->getBilling();

            if (empty($billing)) {
                $data['billing'] = array(
                    'name' => $this->getCard()->getBillingName(),
                    'address_line1' => $this->getCard()->getBillingAddress1(),
                    'address_line2' => $this->getCard()->getBillingAddress2(),
                    'city' => $this->getCard()->getBillingCity(),
                    'province' => $this->getCard()->getBillingState(),
                    'country' => $this->getCard()->getBillingCountry(),
                    'postal_code' => $this->getCard()->getBillingPostcode(),
                    'phone_number' => $this->getCard()->getBillingPhone(),
                    'email_address' => $this->getCard()->getEmail(),
                );
            }
        }

        if ($this->getToken()) {
            $data['token'] = $this->getToken();
        }

        return $data;
    }

}
