<?php
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
                        "date" => date("Y-m-d"),
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
                    //private chat
                    $chat = new chat("sendto=$userid");
                    if ($chat->getData()) {
                        echo $html->h('2', 'Private');
                        foreach ($chat->getData() as $key => $value) :
                            echo $html->code(
                                "section",
                                $html->h(4, $value['nom'] . "<span>" . date("d/m/Y", strtotime($value['date'])) . "</span>") .
                                    $html->p($value['message']),
                                "large chat"
                            );

                        endforeach;
                    }
                    //global chat
                    $chat = new chat("sendto=0");
                    if ($chat->getData()) {
                        echo $html->h('2', 'Global');
                        foreach ($chat->getData() as $key => $value) :
                            echo $html->code(
                                "section",
                                $html->h(4, $value['nom'] . "<span>" . date("d/m/Y", strtotime($value['date'])) . "</span>") .
                                    $html->p($value['message']),
                                "large chat"
                            );
                        endforeach;
                    }

                    break;
                default:
                    break;
            }

            break;
        default:
            # code...
            break;
    }
