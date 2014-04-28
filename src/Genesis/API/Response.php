<?php

namespace Genesis\API;


class Response
{
    private $responseObj;

    /**
     * Check whether the transaction was approved and
     * whether the response_code is acceptable
     *
     * @return bool
     */
    public function checkResponseCode()
    {
        $status = false;

        if (isset($this->responseObj->status) && $this->responseObj->status == 'approved') {
            if (intval($this->responseObj->response_code) === Errors::SUCCESS) {
                $status = true;
            }
        }

        return $status;
    }

    /**
     * Return the parsed response
     *
     * @return mixed
     */
    public function getResponseObject()
    {
        return $this->responseObj;
    }

    /**
     * Parse Genesis response to SimpleXMLElement
     * @param $response \SimpleXMLElement
     */
    public function parseResponse($response)
    {
        $this->responseObj = simplexml_load_string($response);
    }

    /**
     * Parse the POST data received from Genesis Notification
     */
    public function parseNotification($data)
    {
        if(!is_object($this->responseObj)) {
            $this->responseObj = new \stdClass();
        }

        foreach ($data as $var => $value) {
            $this->responseObj->$var = trim(urldecode($value));
        }
    }


} 