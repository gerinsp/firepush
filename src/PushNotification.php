<?php

namespace Sena\Firepush;

class PushNotification
{
    public static function sendPush($to, $title, $body, $icon, $url)
    {
        $fcmAuthKey = config('firepush.server_key');

        $fields = array(
            'registration_ids' => [$to],
            'data' => array(
                "title"         => $title,
                "message"       => json_encode(["push_type" => "event", "title" => $title, "message" => $body, "images" => $icon, "url_browser" => $url]),
                "request_code"  => '1',
                'images'        => $icon,
                'push_id'       => "",
                'url_browser'   => $url
            )
        );

        $headers = array(
            'Authorization: key=' . $fcmAuthKey,
            'Content-Type: application/json'
        );

        $response = "";

        header('Content-Type: application/json');

        //curl connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
