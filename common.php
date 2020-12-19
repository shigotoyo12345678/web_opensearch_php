<?php

//県設定関数

function prefectureSet()
{
    $args = func_num_args(); // 引数の数を数える
    $num = func_get_args(); // 引数一覧を配列へ変換する
    //通常
    if ($args === 0) {
        echo "<select name='prefecture' onChange='citySet()' style='width:170px;' required>";
        echo "<option value=''>県を選択してください</option>";
        $kenmei = array(
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県',
            '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県',
            '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県',
            '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県',
            '大分県', '宮崎県', '鹿児島県', '沖縄県'
        );

        foreach ($kenmei as $kenmei) {
            print('<option value="' . $kenmei . '">' . $kenmei . '</option>');
        }

        echo "</select>";
    }
    //施設詳細をセットする場合
    else if ($args === 1) {
        echo "<select name='prefecture' onChange='citySet()' style='width:170px;' required>";
        echo "<option value=''>県を選択してください</option>";
        $kenmei = array(
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県',
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県',
            '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県',
            '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県',
            '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県',
            '大分県', '宮崎県', '鹿児島県', '沖縄県'
        );

        foreach ($kenmei as $kenmei) {
            if ($num[0] === $kenmei) {
                print('<option value="' . $kenmei . ' "selected>' . $kenmei . '</option>');
            } else {
                print('<option value="' . $kenmei . '">' . $kenmei . '</option>');
            }
        }
        echo "</select>";
    }
}

function hour()
{
    $args = func_num_args(); // 引数の数を数える
    $num = func_get_args(); // 引数一覧を配列へ変換する
    if ($args === 1) {
        echo "<select name='" . $num[0] . "'>";
        echo '<option value="00" selected>時間</option>';
        for ($i = 0; $i < 24; $i++) {
            echo '<option value=' . $i . ' >' . $i . '</option>';
        }
        echo '</select>';
    } else if ($args === 2) {
        echo "<select name='" . $num[0] . "'>";
        echo '<option value="00" >時間</option>';
        for ($i = 0; $i < 24; $i++) {

            if (str_pad($i, 2, 0, STR_PAD_LEFT) === $num[1]) {
                echo '<option value=' . str_pad($i, 2, 0, STR_PAD_LEFT) . ' selected>' . str_pad($i, 2, 0, STR_PAD_LEFT) . '</option>';
            } else {
                echo '<option value=' . str_pad($i, 2, 0, STR_PAD_LEFT) . '>' . str_pad($i, 2, 0, STR_PAD_LEFT) . '</option>';
            }
        }
        echo '</select>';
    }
}

function minute()
{
    $args = func_num_args(); // 引数の数を数える
    $num = func_get_args(); // 引数一覧を配列へ変換する
    if ($args === 1) {
        echo "<select name='" . $num[0] . "'>";
        echo '<option value="00" selected>分</option>';
        echo '<option value="00">00</option>';
        echo '<option value="30">30</option>';
        echo '</select>';
    } else if ($args === 2) {
        echo "<select name='" . $num[0] . "'>";
        echo '<option value="00">分</option>';
        switch ($num[1]) {
            case 00:
                echo '<option value="00" selected>00</option>';
                echo '<option value="30">30</option>';
                break;

            case 30:
                echo '<option value="00">00</option>';
                echo '<option value="30" selected>30</option>';
                break;
        }
        echo '</select>';
    }
}

function returnToday()
{
    $today = date("Y-m-d");

    return $today;
}
