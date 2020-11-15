<?php

namespace App\Http\Controllers;

use App\Entities\FormWidgetData;
use App\Services\JsonRPCService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AjaxController extends Controller
{
    private JsonRPCService $jsonRPCService;

    public function __construct(JsonRPCService $jsonRPCService)
    {
        $this->jsonRPCService = $jsonRPCService;
    }

    public function ajaxRequest(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'pageUid' => ['bail', 'required']
        ]);

        $formWidgetData = new FormWidgetData(
            Arr::get($input, 'pageUid'),
            Arr::get($input, 'userName', null),
            Arr::get($input, 'message', null)
        );

        try
        {
            $status = 'fail';
            $result = null;
            if (($result = $this->jsonRPCService->getWidgetDataByPageUid($formWidgetData)) !== false)
            {
                $status = 'success';
            }

            return response()->json(['status' => $status, 'result' => $result]);
        }
        catch (\Exception $exception)
        {
            return response()->json(['status' => 'Fail', 'reason' => $exception->getMessage()]);
        }
    }

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'userName' => ['bail', 'required'],
            'message' => ['required', 'max:255']
        ]);

        $formWidgetData = new FormWidgetData(
            Arr::get($input, 'pageUid'),
            Arr::get($input, 'userName'),
            Arr::get($input, 'message')
        );

        try
        {
            $status = 'fail';
            if ($this->jsonRPCService->addWidgetData($formWidgetData))
            {
                $status = 'success';
            }

            return response()->json(['status' => $status]);
        }
        catch (\Exception $exception)
        {
            return response()->json(['status' => 'Fail']);
        }
    }

    public function messages()
    {
        return [
            'userName.required' => 'A name is required',
            'message.required' => 'A message is required',
        ];
    }
}
