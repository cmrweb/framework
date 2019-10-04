<?php
date_default_timezone_set("Europe/Paris");
if (isset($_POST))
    switch ($url) {
        case $url[0] == 'ajax' and $url[1] == "insert":
            switch ($url[2]) {
                case 'chat':
                    $data = explode(",", preg_replace('/\"/', '', json_encode($_POST['currentdata'])));
                    foreach ($data as $key => $value) {
                        $data[$key] = $value;
                    }
                    dump($data);
                    $chat = new chat();
                    $chat->setData([
                        "nom" => $username,
                        "message" => addslashes($data[0]),
                        "date" => date("Y-m-d H:i:s"),
                        "sendby" => $data[2],
                        "sendto" => $data[1]
                    ]);
                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'ajax' and $url[1] == "select":
            switch ($url[2]) {
                case 'chat':
                    //receved chat 
                    $chat = new chat("sendby=$userid OR sendto=$userid");
                    if ($chat->getData()) {
                        foreach ($chat->getData() as $key => $value) :
                            echo $value['sendto'] == $userid ?
                                $html->code(
                                    "section",
                                    $html->h(4, "<span>" . $value['nom'] . "</span>") .  
                                        $html->p($value['message']."<br><small>". date("d/m/Y H:i:s", strtotime($value['date'])) . "</small>"),
                                    "xlarge chat chat-receive"
                                ) : $html->code(
                                    "section",
                                    $html->h(4, "</small><span>" . $value['nom'] . "</span>") .
                                        $html->p($value['message']."<br><small>" . date("d/m/Y H:i:s", strtotime($value['date'])) . "</small>"),
                                    "xlarge chat chat-send"
                                );
                        endforeach;
                    }
                    //sended chat
                    // $received = new chat("sendby=$userid");
                    // if ($received->getData()) {
                    //     foreach ($received->getData() as $key => $value) :
                    //         echo $html->code(
                    //             "section",
                    //             $html->h(4,"<span>". $value['nom'] . "</span><small>" . date("d/m/Y H:i", strtotime($value['date'])) . "</small>") .
                    //                 $html->p($value['message']),
                    //             "xlarge chat "
                    //         );
                    //     endforeach;
                    // }

                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'ajax' and $url[1] == "delete":
            switch ($url[2]) {
                case 'chat':
                    $data = explode(",", preg_replace('/\"/', '', json_encode($_POST['currentdata'])));
                    foreach ($data as $key => $value) {
                        $data[$key] = $value;
                    }
                    dump($data);
                    $chat = new chat();
                    $chat->deletePrivate($data[0]);
                    break;
                default:
                    break;
            }

            break;
        default:
            # code...
            break;
    }
