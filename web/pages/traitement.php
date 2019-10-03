<?php
if (isset($_POST))
    switch ($url) {
        case $url[0] == 'traitement' and $url[1] == "insert":
            switch ($url[2]) {
                case 'resa':
                    $data = explode(",", preg_replace('/\"/', '', json_encode($_POST['currentdata'])));
                    foreach ($data as $key => $value) {
                        $data[$key] = $value;
                    }
                    dump($data);
                    $reservation = new Reservation();
                    $reservation->setData([
                        "date" => "2019-10-03",
                        "lieu" => $data[2],
                        "nom" => $data[0],
                        "prix" => $data[1]
                    ]);
                    break;
                default:
                    break;
            }

            break;
        case $url[0] == 'traitement' and $url[1] == "select":
            switch ($url[2]) {
                case 'resa':
                    $reservation = new Reservation();
                    //^(\{)+(.*|\s)(\})/
                    // $file = json_encode($reservation->getData());
                    // preg_match("/^(\{)+(.*|\s)(\})/", $file, $render);
                    // echo $file;
        if ($reservation->getData())
         foreach ($reservation->getData() as $key => $value) :
        echo $html->formOpen('', 'post', 'large dark') .
                $html->input("hidden", "id", "", "", $value['id'],$value['id']) . 
                $html->input("date", "date", "date", "", $value['date'],$value['date']) .
                $html->input("text", "lieu", "lieu", "", $value['lieu'],$value['lieu']) .
                $html->input("text", "nom", "nom", "", $value['nom'],$value['nom']) .
                $html->input("number", "prix", "prix", "", $value['prix'],$value['prix']) .
                $html->button('submit', 'success center', 'mettre a jour', 'update') .
                $html->button('delete', 'danger center', 'supprimer', 'delete') .
                $html->formClose();
        endforeach;
                    break;
                default:
                    break;
            }

            break;
        default:
            # code...
            break;
    }
