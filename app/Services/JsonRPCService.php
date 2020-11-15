<?php

namespace App\Services;

use App\Entities\FormWidgetData;
use Graze\GuzzleHttp\JsonRpc\Client;
use Graze\GuzzleHttp\JsonRpc\Exception\RequestException;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid;

class JsonRPCService
{
    private Client $httpClient;

    public function __construct()
    {
        $apiUrl = config('app.API_URL');

        $this->httpClient = Client::factory($apiUrl, ['rpc_error' => true]);
    }

    /**
     * @param FormWidgetData $widgetData
     * @return string|null
     */
    public function addWidgetData(FormWidgetData $widgetData)
    {
        $uuid = Uuid::uuid4();

        try
        {
            $response = $this->httpClient->send(
                $this->httpClient->request(
                    $uuid,
                    'addFormData',
                    [
                        'pageUid' => $widgetData->getPageUid(),
                        'userName' => $widgetData->getUserName(),
                        'message' => $widgetData->getMessage()
                    ]
                )
            );

            $rpcResult = $response->getRpcResult();

            if (Arr::get($rpcResult, 'status', null) == 'Success')
            {
                return true;
            }

            return false;
        }
        catch (RequestException $exception)
        {
            die($exception->getResponse()->getReasonPhrase());
        }
    }

    public function getWidgetDataByPageUid(FormWidgetData $widgetData)
    {
        $uuid = Uuid::uuid4();

        try
        {
            $response = $this->httpClient->send(
                $this->httpClient->request(
                    $uuid,
                    'getFormDataByPageUid',
                    [
                        'pageUid' => $widgetData->getPageUid()
                    ]
                )
            );

            return $response->getRpcResult();
        }
        catch (RequestException $exception)
        {
            die($exception->getResponse()->getReasonPhrase());
        }
    }
}
