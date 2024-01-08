<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['UserID']}
                OR outgoing_msg_id = {$row['UserID']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['active_status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['UserID']) ? $hid_me = "hide" : $hid_me = "";
        if ($row['img']){
            $img= '<img src="/cse-socity/website/img/'.$row['img'].'" alt="nothing found" width="20" height="20" class="d- mx-auto rounded-circle">';
        }else{
            $img= '<i class="fa fa-user-circle fa-2x m-0" aria-hidden="true"></i>';
        }

        $output .= '<a class="text-decoration-none" href="chat.php?UserID='. $row['UserID'] .'">
                    <div class="content">
                        '.$img.'
            
                        <div class="details">
                            <span>'.$row['name'] .'</span>
                            <p class="small">'. $you . $msg .'</p>
                        </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fa fa-circle"></i></div>
                </a>';
    }
