<?php
date_default_timezone_set("Europe/Paris");
header('Content-Type: text/plain; charset=utf-8');
if (isset($_POST))
    switch ($url) {
        case $url[0] == 'ajax' and $url[1] == "insert":
            switch ($url[2]) {
                case 'chat':
                    $data = explode(",", preg_replace('/\"/', '', json_encode($_POST['currentdata'])));
                    foreach ($data as $key => $value) {
                        $data[$key] = $value;
                    }
                    //dump($data);
                    $chat = new chat();
                    $chat->setData([
                        "nom" => $username,
                        "message" => htmlspecialchars($data[0]),
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
                    // chat 
                    $chat = new chat("sendby=$userid OR sendto=$userid");
                    if ($chat->getData()) {
                        foreach ($chat->getData() as $key => $value) :
                            echo $value['sendto'] == $userid ?
                                $html->code(
                                    "section",
                                    $html->h(4, "<span>" . $value['nom'] . "</span>") .
                                        $html->p($value['message'] . "<br><small>" . date("d/m/Y H:i:s", strtotime($value['date'])) . "</small>"),
                                    "xlarge chat chat-receive"
                                ) : $html->code(
                                    "section",
                                    $html->h(4, "</small><span>" . $value['nom'] . "</span>") .
                                        $html->p($value['message'] . "<br><small>" . date("d/m/Y H:i:s", strtotime($value['date'])) . "</small>"),
                                    "xlarge chat chat-send"
                                );
                        endforeach;
                    }
                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'ajax' and $url[1] == "delete":
            switch ($url[2]) {
                case 'chat':
                    $data =$_POST['currentdata'];
                    $chat = new chat();
                    $chat->deletePrivate($data);
                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'ajax' and $url[1] == "search":
        
            $data = '%'.$_POST['keyword'].'%';
            $search = new DB();
            $search->select("id,username","cmr_user","username LIKE '$data' AND id!=$userid");
            //echo "<section>". json_encode($search->result)."</section>";
            foreach ($search->result as $key => $value) :?>
              <section onclick="set_item('<?=$value['id']?>','<?=$value['username']?>')"><?=$value['username']?></section> 
        <?php endforeach;?>
          <?php  break;
        default:
            # code...
            break;
    }
