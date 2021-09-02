<?php

namespace shockuccu\api\LINEBot;


class EchoBot
{
    private $httpClient, $bot;
    protected $options = array();

    function __construct($options = null, $initialize = true)
    {
        $this->options = $options;

        $this->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($this->options['settings']['bot']['channelToken']);
        $this->bot = new \LINE\LINEBot($this->httpClient, ['channelSecret' => $this->options['settings']['bot']['channelSecret']]);

        if ($options)
            $this->options = $options + $this->options;

        if ($initialize)
            $this->initialize();
    }

    function initialize()
    {
    }

    function run()
    {
        //讀取資訊
        $HttpRequestBody = file_get_contents('php://input');
        $arr_request_data = json_decode($HttpRequestBody, true);

        #指令
        if (substr($arr_request_data['events'][0]['message']['text'], 0, 1) == '!') {
            $get_command = substr($arr_request_data['events'][0]['message']['text'], 1);

            $datetime = date('Y-m-d H:i:s');

            if ($get_command == '指令')
                $msg = '輸入指令!time、!name、!detail';
            if ($get_command == 'time')
                $msg = '現在時間是' . $datetime;
            if ($get_command == 'name')
                $msg = '我的名字是Shock';
            if ($get_command == 'detail')
                $msg = <<< asdf
現在時間: {$datetime}
資訊: {$HttpRequestBody}
destination: {$arr_request_data['destination']}
type: {$arr_request_data['events'][0]['type']}
message type: {$arr_request_data['events'][0]['message']['type']}
message id: {$arr_request_data['events'][0]['message']['id']}
message text: {$arr_request_data['events'][0]['message']['text']}
timestamp: {$arr_request_data['events'][0]['timestamp']}
source type: {$arr_request_data['events'][0]['source']['type']}
source userId: {$arr_request_data['events'][0]['source']['userId']}
replyToken: {$arr_request_data['events'][0]['replyToken']}
asdf;
        }

        $response = $this->bot->replyText($arr_request_data['events'][0]['replyToken'], $msg);

        // $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
        // $response = $bot->pushMessage('Ud30de8b416e07ecc6e4550014b7ed554', $textMessageBuilder);
        // $response = $bot->broadcast($textMessageBuilder);

        echo json_encode(array(
            $response->getHTTPStatus(), $response->getRawBody()
        ));
    }
}
