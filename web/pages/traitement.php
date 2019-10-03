<?php
if (isset($_POST))
    switch ($url) {
        case $url[0] == 'traitement' and $url[1] == "insert":
            switch ($url[2]) {
                case 'chat':
                    $data = explode(",", preg_replace('/\"/', '', json_encode($_POST['currentdata'])));
                    foreach ($data as $key => $value) {
                        $data[$key] = $value;
                    }
                    dump($data);
                    $chat = new chat();
                    $chat->setData([
                        "nom" => $data[0],
                        "message" => $data[1]
                    ]);
                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'traitement' and $url[1] == "select":
            switch ($url[2]) {
                case 'chat':
                    $chat = new chat();
                    if ($chat->getData()) {
                        echo $html->h('1', 'Read Update Delete');
                        foreach ($chat->getData() as $key => $value) :
                            echo $html->code(
                                "section",
                                $html->h(4, $value['nom']) .
                                $html->p($value['message']),
                                "large"
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
