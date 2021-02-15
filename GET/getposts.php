<?php
function postPublic($owner) {
    $conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");
    $sql = "select id from $owner";
    $postlist = $conn->query($sql);
    if ($postlist != NULL) {
        $i = 0;
        while ($row = $postlist->fetch_assoc()) {
            $i++;
        }
        for ($x = $i; $x > 0; $x--) {
            $sql = "select * from $owner where id='$x'";
            $post = $conn->query($sql);
            $post = $post->fetch_assoc();
            $cont = '<div class="post">' . PHP_EOL;
            if ($post['postAuth'] != 'Anonymous' && $post['postAuth'] != "") {
                $cont .= '<div class="namediv">' . PHP_EOL;
                if (substr($post['postAuth'], 0, 1) == '@') {
                    $cont .= '<a class="namedivst namedivlink" href="https://twitter.com/' . substr($post['postAuth'], 1, 15) . '">' . $post['postAuth'] . '</a>' . PHP_EOL;
                }
                else {
                    $cont .= '<a class="namedivst">' . $post['postAuth'] . '</a>' . PHP_EOL;
                }
                $cont .= '</div>' . PHP_EOL;
            }
            $cont .= '<div class="quesdiv">' . PHP_EOL;
            $cont .= $post['question'] . PHP_EOL;
            $cont .= '</div>' . PHP_EOL;

            $cont .= '<div class="datediv">' . PHP_EOL;
            $cont .= $post['time'] . PHP_EOL;
            $cont .= '</div>' . PHP_EOL;
            if ($post['repliedBool'] == 1) {
                $cont .= '<div class="hostdiv">' . PHP_EOL;
                $cont .= '<a href="https://twitter.com/' . $owner . '" class="namedivst namedivlink">@' . $owner . '</a><br>' . PHP_EOL;
                $cont .= '</div>' . PHP_EOL;

                $cont .= '<div class="repldiv">' . PHP_EOL;
                $cont .= $post['answer'] . PHP_EOL;
                $cont .= '</div>' . PHP_EOL;

                $cont .= '<div class="repldatediv">' . PHP_EOL;
                $cont .= $post['answerTime'] . PHP_EOL;
                $cont .= '</div>' . PHP_EOL;
            }
            $cont .= '</div>';
            echo $cont;
        }
    }
    $conn->close();
}

function postPrivate($owner) {
    if ($_COOKIE['logged'] == $owner) {
        $conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");
        $sql = "select id from $owner";
        $postlist = $conn->query($sql);
        if ($postlist != NULL) {
            $i = 0;
            while ($row = $postlist->fetch_assoc()) {
                $i++;
            }
            for ($x = $i; $x > 0; $x--) {
                $sql = "select * from $owner where id='$x'";
                $post = $conn->query($sql);
                $post = $post->fetch_assoc();
                $cont = '<div class="post">' . PHP_EOL;
                if ($post['postAuth'] != 'Anonymous' && $post['postAuth'] != "") {
                    $cont .= '<div class="namediv">' . PHP_EOL;
                    if (substr($post['postAuth'], 0, 1) == '@') {
                        $cont .= '<a class="namedivst namedivlink" href="https://twitter.com/' . substr($post['postAuth'], 1, 15) . '">' . $post['postAuth'] . '</a>' . PHP_EOL;
                    }
                    else {
                        $cont .= '<a class="namedivst">' . $post['postAuth'] . '</a>' . PHP_EOL;
                    }
                    $cont .= '</div>' . PHP_EOL;
                }
                $cont .= '<div class="quesdiv">' . PHP_EOL;
                $cont .= $post['question'] . PHP_EOL;
                $cont .= '</div>' . PHP_EOL;
                $cont .= '<div class="datediv">' . PHP_EOL;
                $cont .= $post['time'] . PHP_EOL;
                $cont .= '</div>' . PHP_EOL;
                if ($post['repliedBool'] == 1) {
                    $cont .= '<div class="hostdiv">' . PHP_EOL;
                    $cont .= '<a href="https://twitter.com/' . $owner . '" class="namedivst namedivlink">@' . $owner . '</a><br>' . PHP_EOL;
                    $cont .= '</div>' . PHP_EOL;
                    $cont .= '<div class="repldiv">' . PHP_EOL;
                    $cont .= $post['answer'] . PHP_EOL;
                    $cont .= '</div>' . PHP_EOL;
                    $cont .= '<div class="repldatediv">' . PHP_EOL;
                    $cont .= $post['answerTime'] . PHP_EOL;
                    $cont .= '</div>' . PHP_EOL;
                }
                if ($post['repliedBool'] == 0) {
                    $cont .= '<div class="replinp">' . PHP_EOL;
                    $cont .= '<form action="../../POST/reply.php?ownval=' . $owner . '&postid=' . $x . '" enctype="multipart/form-data" method="post" name="post" onsubmit="return formcheck(0)" required>' . PHP_EOL;
                    $cont .= '<textarea class="inputs" name="input" placeholder="Leave a reply" rows="8"></textarea><br>' . PHP_EOL;
                    $cont .= '<button class="inputs" id="repsubmit" type="submit">Reply</button></form>' . PHP_EOL;
                    $cont .= '</div>' . PHP_EOL;
                }
                $cont .= '</div>';
                echo $cont;
            }
        }
        $conn->close();
    }
    else {
        header("Location: login.php");
    }
}
?>