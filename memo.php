<?php

function menu()
{
    //メニューを表示
    echo PHP_EOL . '----メモ----' . PHP_EOL . PHP_EOL;
    echo '何をしますか？' . PHP_EOL;
    echo '1:メモを書く' . PHP_EOL;
    echo '2:メモをさがす' . PHP_EOL;
    echo '3;メモ一覧を表示する' . PHP_EOL;
    echo '4;メモをワード検索する' . PHP_EOL;
    echo '9:アプリケーションを終了する' . PHP_EOL;
    echo '数字を入力してください';
}

function createMemo($link)
{
    //メモを記入
    $memos = [];
    echo PHP_EOL . 'タイトルを入力してください' . PHP_EOL;
    echo 'タイトル：';
    $memos['title'] = trim(fgets(STDIN));

    echo PHP_EOL . '日付をYYYY-MM-DDで入力してください' . PHP_EOL;
    echo '日付：';
    $memos['created_date'] = trim(fgets(STDIN));

    echo PHP_EOL . '作成者を入力してください' . PHP_EOL;
    echo '作成者：';
    $memos['author'] = trim(fgets(STDIN));

    echo PHP_EOL . 'メモの内容を入力してください' . PHP_EOL;
    echo '内容：';
    $memos['summary'] = trim(fgets(STDIN));

    //SQL文
    $sql = <<<EOT
INSERT INTO memos (
    title,
    created_date,
    author,
    summary
) VALUES (
    "{$memos['title']}",
    "{$memos['created_date']}",
    "{$memos['author']}",
    "{$memos['summary']}"
)
EOT;
    //MySQLに登録
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '登録が完了しました' . PHP_EOL;
    } else {
        echo 'Error: データの追加に失敗しました' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_error($link) . PHP_EOL;
    }
}

function search($link)
{
    //メモを日付から検索
    echo  PHP_EOL . '見たいメモの日付を入力してください' . PHP_EOL;
    echo 'YYYY-MM-DD：';
    $search_day = trim(fgets(STDIN));

    //SQL文
    $sql = "SELECT title, created_date, author, summary FROM memos where created_date = '" . $search_day . "'";

    //MySQLを検索
    $results = mysqli_query($link, $sql);
    if ($results) {
        $memo = mysqli_fetch_assoc($results);
        echo 'タイトル：' . $memo['title'] . PHP_EOL;
        echo '日付：' . $memo['created_date'] . PHP_EOL;
        echo '作者：' . $memo['author'] . PHP_EOL;
        echo 'メモ内容' . $memo['summary'] . PHP_EOL;
        echo '------------------------' . PHP_EOL;
    } else {
        echo '日付が違います';
    }
}

function export($link)
{
    //メモを並べて表示
    $sql = "SELECT title, created_date, author, summary FROM memos ";
    $results = mysqli_query($link, $sql);
    while ($memo = mysqli_fetch_assoc($results)) {
        echo PHP_EOL . 'タイトル：　' . $memo['title'] . PHP_EOL;
        echo '日付：　' . $memo['created_date'] . PHP_EOL;
        echo '作者：　' . $memo['author'] . PHP_EOL;
        echo 'メモ内容：　' . $memo['summary'] . PHP_EOL;
        echo  PHP_EOL;
        echo '------------' . PHP_EOL . PHP_EOL;
    }
    mysqli_free_result($results);
}

function search_word($link)
{
    //タイトル、作者、内容からワード検索
    echo  PHP_EOL . '検索ワードを入力してください' . PHP_EOL;
    echo '検索ワード：';
    $search_word = trim(fgets(STDIN));
    $sql = "SELECT title, created_date, author, summary FROM memos where concat(title,author,summary) LIKE '%" . $search_word . "%'";

    $results = mysqli_query($link, $sql);

    if ($results) {
        $memo = mysqli_fetch_assoc($results);
        echo 'タイトル：' . $memo['title'] . PHP_EOL;
        echo '日付：' . $memo['created_date'] . PHP_EOL;
        echo '作者：' . $memo['author'] . PHP_EOL;
        echo 'メモ内容' . $memo['summary'] . PHP_EOL;
        echo '------------------------' . PHP_EOL;
    } else {
        echo 'エラーです';
    }
}

function dbConnect()
{
    //データベースに接続
    $link = mysqli_connect('db', 'host', 'pass', 'user');
    if ($link) {
        echo 'データベースに接続できました' . PHP_EOL;
    } else {
        echo 'Error: データベースに接続できません' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
    }
    return $link;
}



$memos = [];
$link = dbConnect();
while (TRUE) {
    menu();
    $i = trim(fgets(STDIN));

    if ($i === '1') {
        createMemo($link);
    } elseif ($i === '2') {
        search($link);
    } elseif ($i === '3') {
        export($link);
    } elseif ($i === '4') {
        search_word($link);
    } elseif ($i === '9') {
        break;
    }
}
