// 市設定関数

function citySet(prefecture, city) {

    var str;

    //データベースから設定する場合
    if (prefecture != null) {
        str = prefecture;
    }
    //通常
    else {
        const one = document.shop.prefecture;

        const num = one.selectedIndex;

        str = one.options[num].value;

    }
    var select = document.getElementById("city");
    //既存のオプションを全て削除
    while (select.lastChild) {
        select.removeChild(select.lastChild);
    }
    var option = document.createElement("option");

    switch (str) {
        case "":
            var option = document.createElement("option");

            option.value = "";
            option.text = "市を選んでください";
            select.appendChild(option);

            break;
        case "北海道":
            var hokkaido = [
                '札幌市', '函館市', '小樽市', '室蘭市', '旭川市', '釧路市', '帯広市',
                '北見市', '夕張市', '岩見沢市', '網走市', '留萌市', '苫小牧市', '稚内市', '美唄市', '芦別市',
                '江別市', '赤平市', '紋別市', '士別市', '名寄市', '三笠市', '根室市', '千歳市', '滝川市',
                '砂川市', '歌志内市', '深川市', '富良野市', '登別市', '恵庭市', '亀田市', '伊達市', '広島市',
                '北広島市', '石狩市', '北斗市'
            ];
            for (let i = 0; i < hokkaido.length; i++) {
                var option = document.createElement("option");

                option.value = hokkaido[i];
                option.text = hokkaido[i];
                select.appendChild(option);
                if (city == hokkaido[i]) {
                    option.selected = true;
                }
            }
            break;
        case "青森県":
            var aomori = [
                '弘前市', '青森市', '八戸市', '黒石市', '五所川原市', '三本木市', '十和田市',
                '三沢市', '大湊田名部市', 'むつ市', 'つがる市', '平川市'
            ];
            for (let i = 0; i < aomori.length; i++) {
                var option = document.createElement("option");

                option.value = aomori[i];
                option.text = aomori[i];
                select.appendChild(option);
                if (city == aomori[i]) {
                    option.selected = true;
                }
            }
            break;
        case "岩手県":
            var iwate = [
                '盛岡市', '釜石市', '宮古市', '一関市', '大船渡市', '水沢市', '花巻市',
                '北上市', '久慈市', '遠野市', '陸前高田市', '江刺市', '二戸市', '八幡平市',
                '奥州市', '滝沢市'
            ];
            for (let i = 0; i < iwate.length; i++) {
                var option = document.createElement("option");

                option.value = iwate[i];
                option.text = iwate[i];
                select.appendChild(option);
                if (city == iwate[i]) {
                    option.selected = true;
                }
            }
            break;
        case "宮城県":
            var miyagi = [
                '仙台市', '石巻市', '塩竃市', '古川市', '気仙沼市', '白石市', '名取市',
                '角田市', '多賀城市', '泉市', '岩沼市', '登米市', '栗原市', '東松島市',
                '大崎市', '富谷市'
            ];
            for (let i = 0; i < miyagi.length; i++) {
                var option = document.createElement("option");

                option.value = miyagi[i];
                option.text = miyagi[i];
                select.appendChild(option);
                if (city == miyagi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "秋田県":
            var akita = [
                '秋田市', '能代市', '大館市', '横手市', '本荘市', '男鹿市', '湯沢市',
                '大曲市', '鹿角市', '由利本荘市', '潟上市', '大仙市', '北秋田市', '仙北市',
                'にかほ市'
            ];
            for (let i = 0; i < akita.length; i++) {
                var option = document.createElement("option");

                option.value = akita[i];
                option.text = akita[i];
                select.appendChild(option);
                if (city == akita[i]) {
                    option.selected = true;
                }
            }
            break;
        case "山形県":
            var yamagata = [
                '山形市', '米沢市', '鶴岡市', '酒田市', '新庄市', '寒河江市', '上山市',
                '村山市', '長井市', '天童市', '東根市', '尾花沢市', '南陽市'
            ];
            for (let i = 0; i < yamagata.length; i++) {
                var option = document.createElement("option");

                option.value = yamagata[i];
                option.text = yamagata[i];
                select.appendChild(option);
                if (city == yamagata[i]) {
                    option.selected = true;
                }
            }
            break;
        case "福島県":
            var hukushima = [
                '若松市', '会津若松市', '福島市', '郡山市', '平市', '白河市', '原町市',
                '須賀川市', '喜多方市', '常磐市', '磐城市', '相馬市', '内郷市', '勿来市',
                '二本松市', 'いわき市', '田村市', '南相馬市', '伊達市', '本宮市'
            ];
            for (let i = 0; i < hukushima.length; i++) {
                var option = document.createElement("option");

                option.value = hukushima[i];
                option.text = hukushima[i];
                select.appendChild(option);
                if (city == hukushima[i]) {
                    option.selected = true;
                }
            }
            break;
        case "茨城県":
            var ibaraki = [
                '水戸市', '日立市', '土浦市', '古河市', '石岡市', '下館市', '結城市',
                '龍ヶ崎市', '那珂湊市', '下妻市', '常陸太田市', '水海道市', '常総市', '勝田市',
                '高萩市', '茨城市', '北茨城市', '笠間市', '取手市', '岩井市',
                '牛久市', 'つくば市', 'ひたちなか市', '鹿嶋市', '潮来市', '守谷市',
                '常陸大宮市', '那珂市', '筑西市', '坂東市', '稲敷市', 'かすみがうら市',
                '神栖市', '行方市', '桜川市', '鉾田市', 'つくばみらい市', '小美玉市'
            ];
            for (let i = 0; i < ibaraki.length; i++) {
                var option = document.createElement("option");

                option.value = ibaraki[i];
                option.text = ibaraki[i];
                select.appendChild(option);
                if (city == ibaraki[i]) {
                    option.selected = true;
                }
            }
            break;
        case "栃木県":
            var totigi = [
                '宇都宮市', '足利市', '栃木市', '佐野市', '鹿沼市', '日光市', '今市市',
                '小山市', '真岡市', '大田原市', '矢板市', '黒磯市', '那須塩原市', 'さくら市',
                '那須烏山市', '下野市'
            ];
            for (let i = 0; i < totigi.length; i++) {
                var option = document.createElement("option");

                option.value = totigi[i];
                option.text = totigi[i];
                select.appendChild(option);
                if (city == totigi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "群馬県":
            var gunma = [
                '前橋市', '高崎市', '桐生市', '伊勢崎市', '太田市', '沼田市', '館林市',
                '渋川市', '藤岡市', '富岡市', '安中市', 'みどり市'
            ];
            for (let i = 0; i < gunma.length; i++) {
                var option = document.createElement("option");

                option.value = gunma[i];
                option.text = gunma[i];
                select.appendChild(option);
                if (city == gunma[i]) {
                    option.selected = true;
                }
            }
            break;
        case "埼玉県":
            var saitama = [
                '川越市', '熊谷市', '川口市', '浦和市', '大宮市', '行田市', '秩父市',
                '所沢市', '飯能市', '加須市', '本庄市', '東松山市', '岩槻市', '春日部市',
                '狭山市', '羽生市', '鴻巣市', '深谷市', '上尾市', '与野市', '草加市',
                '越谷市', '蕨市', '戸田市', '入間市', '鳩ヶ谷市', '朝霞市', '志木市',
                '和光市', '新座市', '桶川市', '	久喜市', '北本市', '八潮市', '富士見市',
                '上福岡市', '三郷市', '蓮田市', '坂戸市', '幸手市', '鶴ヶ島市', '日高市',
                '吉川市', 'さいたま市', 'ふじみ野市', '白岡市'
            ];
            for (let i = 0; i < saitama.length; i++) {
                var option = document.createElement("option");

                option.value = saitama[i];
                option.text = saitama[i];
                select.appendChild(option);
                if (city == saitama[i]) {
                    option.selected = true;
                }
            }
            break;
        case "千葉県":
            var chiba = [
                '千葉市', '銚子市', '市川市', '船橋市', '館山市', '木更津市', '松戸市',
                '野田市', '佐原市', '茂原市', '成田市', '佐倉市', '東金市', '八日市場市',
                '旭市', '習志野市', '東葛市', '柏市', '勝浦市', '市原市', '流山市',
                '八千代市', '我孫子市', '鴨川市', '鎌ヶ谷市', '君津市', '富津市', '浦安市',
                '四街道市', '袖ヶ浦市', '八街市', '	印西市', '白井市', '富里市', 'いすみ市',
                '匝瑳市', '南房総市', '香取市', '山武市', '大網白里市'
            ];
            for (let i = 0; i < chiba.length; i++) {
                var option = document.createElement("option");

                option.value = chiba[i];
                option.text = chiba[i];
                select.appendChild(option);
                if (city == chiba[i]) {
                    option.selected = true;
                }
            }
            break;
        case "東京都":
            var tokyo = [
                '千代田区', '中央区', '港区', '新宿区', '文京区', '台東区', '墨田区',
                '江東区', '品川区', '目黒区', '大田区', '世田谷区', '渋谷区', '中野区',
                '杉並区', '豊島区', '北区', '荒川区', '板橋区', '練馬区', '足立区',
                '葛飾区', '江戸川区', '八王子市', '立川市', '武蔵野市', '三鷹市', '青梅市',
                '府中市', '昭島市', '調布市', '	町田市', '小金井市', '小平市', '日野市',
                '東村山市', '国分寺市', '国立市', '田無市', '保谷市', '福生市', '狛江市',
                '大和市', '東大和市', '清瀬市', '久留米市', '東久留米市', '村山市', '武蔵村山市',
                '多摩市', '稲城市', '秋多市', '秋川市', '羽村市', 'あきる野市', '西東京市'
            ];
            for (let i = 0; i < tokyo.length; i++) {
                var option = document.createElement("option");

                option.value = tokyo[i];
                option.text = tokyo[i];
                select.appendChild(option);
                if (city == tokyo[i]) {
                    option.selected = true;
                }
            }
            break;
        case "神奈川県":
            var kanagawa = [
                '横浜市', '横須賀市', '川崎市', '平塚市', '鎌倉市', '藤沢市', '小田原市',
                '茅ヶ崎市', '逗子市', '相模原市', '三浦市', '秦野市', '厚木市', '大和市',
                '伊勢原市', '海老名市', '座間市', '南足柄市', '綾瀬市'
            ];
            for (let i = 0; i < kanagawa.length; i++) {
                var option = document.createElement("option");

                option.value = kanagawa[i];
                option.text = kanagawa[i];
                select.appendChild(option);
                if (city == kanagawa[i]) {
                    option.selected = true;
                }
            }
            break;
        case "新潟県":
            var niigata = [
                '新潟市', '長岡市', '高田市', '三条市', '柏崎市', '新発田市', '新津市',
                '小千谷市', '加茂市', '十日町市', '見附市', '村上市', '燕市', '直江津市',
                '栃尾市', '糸魚川市', '新井市', '妙高市', '五泉市', '両津市', '白根市', '豊栄市',
                '上越市', '佐渡市', '阿賀野市', '魚沼市', '南魚沼市', '胎内市'
            ];
            for (let i = 0; i < niigata.length; i++) {
                var option = document.createElement("option");

                option.value = niigata[i];
                option.text = niigata[i];
                select.appendChild(option);
                if (city == niigata[i]) {
                    option.selected = true;
                }
            }
            break;
        case "富山県":
            var toyama = [
                '富山市', '高岡市', '新湊市', '魚津市', '氷見市', '滑川市', '黒部市',
                '砺波市', '小矢部市', '南砺市', '射水市'
            ];
            for (let i = 0; i < toyama.length; i++) {
                var option = document.createElement("option");

                option.value = toyama[i];
                option.text = toyama[i];
                select.appendChild(option);
                if (city == toyama[i]) {
                    option.selected = true;
                }
            }
            break;
        case "石川県":
            var ishikawa = [
                '金沢市', '七尾市', '小松市', '輪島市', '珠洲市', '加賀市', '羽咋市',
                '松任市', 'かほく市', '白山市', '能美市', '野々市市'
            ];
            for (let i = 0; i < ishikawa.length; i++) {
                var option = document.createElement("option");

                option.value = ishikawa[i];
                option.text = ishikawa[i];
                select.appendChild(option);
                if (city == ishikawa[i]) {
                    option.selected = true;
                }
            }
            break;
        case "福井県":
            var hukui = [
                '福井市', '敦賀市', '武生市', '小浜市', '大野市', '勝山市', '鯖江市',
                'あわら市', '越前市', '坂井市'
            ];
            for (let i = 0; i < hukui.length; i++) {
                var option = document.createElement("option");

                option.value = hukui[i];
                option.text = hukui[i];
                select.appendChild(option);
                if (city == hukui[i]) {
                    option.selected = true;
                }
            }
            break;
        case "山梨県":
            var yamanashi = [
                '甲府市', '富士吉田市', '塩山市', '都留市', '山梨市', '大月市', '韮崎市',
                '南アルプス市', '甲斐市', '笛吹市', '北杜市', '上野原市', '甲州市', '中央市'
            ];
            for (let i = 0; i < yamanashi.length; i++) {
                var option = document.createElement("option");

                option.value = yamanashi[i];
                option.text = yamanashi[i];
                select.appendChild(option);
                if (city == yamanashi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "長野県":
            var nagano = [
                '長野市', '松本市', '上田市', '岡谷市', '飯田市', '諏訪市', '須坂市',
                '小諸市', '伊那市', '中野市', '駒ヶ根市', '大町市', '飯山市', '茅野市',
                '塩尻市', '篠ノ井市', '更埴市', '佐久市', '千曲市', '東御市', '安曇野市'
            ];
            for (let i = 0; i < nagano.length; i++) {
                var option = document.createElement("option");

                option.value = nagano[i];
                option.text = nagano[i];
                select.appendChild(option);
                if (city == nagano[i]) {
                    option.selected = true;
                }
            }
            break;
        case "岐阜県":
            var gihu = [
                '岐阜市', '大垣市', '高山市', '多治見市', '関市', '中津川市', '羽島市',
                '美濃市', '美濃加茂市', '瑞浪市', '恵那市', '土岐市', '各務原市', '可児市',
                '山県市', '瑞穂市', '飛騨市', '本巣市', '郡上市', '下呂市', '海津市'
            ];
            for (let i = 0; i < gihu.length; i++) {
                var option = document.createElement("option");

                option.value = gihu[i];
                option.text = gihu[i];
                select.appendChild(option);
                if (city == gihu[i]) {
                    option.selected = true;
                }
            }
            break;
        case "静岡県":
            var shizuoka = [
                '静岡市', '浜松市', '沼津市', '清水市', '熱海市', '三島市', '富士宮市',
                '伊東市', '島田市', '吉原市', '磐田市', '焼津市', '藤枝市', '掛川市',
                '富士市', '富士市', '御殿場市', '袋井市', '天竜市', '浜北市', '裾野市',
                '下田市', '湖西市', '伊豆市', '御前崎市', '菊川市', '伊豆の国市', '牧之原市'
            ];
            for (let i = 0; i < shizuoka.length; i++) {
                var option = document.createElement("option");

                option.value = shizuoka[i];
                option.text = shizuoka[i];
                select.appendChild(option);
                if (city == shizuoka[i]) {
                    option.selected = true;
                }
            }
            break;
        case "愛知県":
            var aichi = [
                '名古屋市', '豊橋市', '岡崎市', '一宮市', '瀬戸市', '半田市', '春日井市',
                '豊川市', '津島市', '碧南市', '刈谷市', '挙母市', '豊田市', '安城市',
                '西尾市', '常滑市', '犬山市', '蒲郡市', '守山市', '小牧市', '尾西市',
                '稲沢市', '新城市', '東海市', '大府市', '知多市', '知立市', '尾張旭市',
                '高浜市', '岩倉市', '豊明市', '日進市', '田原市', '愛西市', '清須市',
                '北名古屋市', '弥富市', 'みよし市', 'あま市', '長久手市'
            ];
            for (let i = 0; i < aichi.length; i++) {
                var option = document.createElement("option");

                option.value = aichi[i];
                option.text = aichi[i];
                select.appendChild(option);
                if (city == aichi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "三重県":
            var mie = [
                '津市', '四日市市', '宇治山田市', '伊勢市', '松阪市', '桑名市', '上野市',
                '鈴鹿市', '名張市', '尾鷲市', '亀山市', '鳥羽市', '熊野市', '久居市',
                'いなべ市', '志摩市', '伊賀市'
            ];
            for (let i = 0; i < mie.length; i++) {
                var option = document.createElement("option");

                option.value = mie[i];
                option.text = mie[i];
                select.appendChild(option);
                if (city == mie[i]) {
                    option.selected = true;
                }
            }
            break;
        case "滋賀県":
            var shiga = [
                '大津市', '彦根市', '長浜市', '近江八幡市', '八日市市', '草津市', '守山市',
                '栗東市', '甲賀市', '野洲市', '湖南市', '高島市', '東近江市', '米原市'
            ];
            for (let i = 0; i < shiga.length; i++) {
                var option = document.createElement("option");

                option.value = shiga[i];
                option.text = shiga[i];
                select.appendChild(option);
                if (city == shiga[i]) {
                    option.selected = true;
                }
            }
            break;
        case "京都府":
            var kyouto = [
                '京都市', '伏見市', '福知山市', '舞鶴市', '東舞鶴市', '綾部市', '宇治市',
                '宮津市', '亀岡市', '城陽市', '長岡市', '長岡京市', '向日市', '八幡市',
                '田辺市', '京田辺市', '京丹後市', '南丹市', '木津川市'
            ];
            for (let i = 0; i < kyouto.length; i++) {
                var option = document.createElement("option");

                option.value = kyouto[i];
                option.text = kyouto[i];
                select.appendChild(option);
                if (city == kyouto[i]) {
                    option.selected = true;
                }
            }
            break;
        case "大阪府":
            var osaka = [
                '大阪市', '堺市', '岸和田市', '豊中市', '布施市', '池田市', '吹田市',
                '泉大津市', '高槻市', '貝塚市', '守口市', '枚方市', '茨木市', '八尾市',
                '泉佐野市', '富田林市', '寝屋川市', '河内長野市', '枚岡市', '河内市', '松原市', '大東市', '和泉市', '箕面市', '柏原市',
                '南大阪市', '羽曳野市', '門真市', '三島市', '摂津市', '高石市', '美陵市',
                '藤井寺市', '東大阪市', '泉南市', '四條畷市', '交野市', '狭山市', '大阪狭山市', '阪南市'
            ];
            for (let i = 0; i < osaka.length; i++) {
                var option = document.createElement("option");

                option.value = osaka[i];
                option.text = osaka[i];
                select.appendChild(option);
                if (city == osaka[i]) {
                    option.selected = true;
                }
            }
            break;
        case "兵庫県":
            var hyougo = [
                '神戸市', '姫路市', '尼崎市', '明石市', '西宮市', '洲本市', '飾磨市',
                '芦屋市', '伊丹市', '相生市', '豊岡市', '加古川市', '龍野市', '赤穂市',
                '西脇市', '宝塚市', '三木市', '高砂市', '川西市', '小野市', '三田市', '加西市', '篠山市', '養父市', '丹波市',
                '南あわじ市', '朝来市', '淡路市', '宍粟市', 'たつの市', '加東市'
            ];
            for (let i = 0; i < hyougo.length; i++) {
                var option = document.createElement("option");

                option.value = hyougo[i];
                option.text = hyougo[i];
                select.appendChild(option);
                if (city == hyougo[i]) {
                    option.selected = true;
                }
            }
            break;
        case "奈良県":
            var nara = [
                '奈良市', '大和高田市', '大和郡山市', '天理市', '橿原市', '桜井市', '五條市',
                '御所市', '生駒市', '香芝市', '葛城市', '宇陀市'
            ];
            for (let i = 0; i < nara.length; i++) {
                var option = document.createElement("option");

                option.value = nara[i];
                option.text = nara[i];
                select.appendChild(option);
                if (city == nara[i]) {
                    option.selected = true;
                }
            }
            break;
        case "和歌山県":
            var wakayama = [
                '和歌山市', '新宮市', '海南市', '田辺市', '御坊市', '橋本市', '有田市',
                '紀の川市', '岩出市'
            ];
            for (let i = 0; i < wakayama.length; i++) {
                var option = document.createElement("option");

                option.value = wakayama[i];
                option.text = wakayama[i];
                select.appendChild(option);
                if (city == wakayama[i]) {
                    option.selected = true;
                }
            }
            break;
        case "鳥取県":
            var tottori = [
                '鳥取市', '米子市', '倉吉市', '境港市'
            ];
            for (let i = 0; i < tottori.length; i++) {
                var option = document.createElement("option");

                option.value = tottori[i];
                option.text = tottori[i];
                select.appendChild(option);
                if (city == tottori[i]) {
                    option.selected = true;
                }
            }
            break;
        case "島根県":
            var shimane = [
                '松江市', '浜田市', '出雲市', '益田市', '大田市', '安来市', '江津市',
                '平田市', '雲南市'
            ];
            for (let i = 0; i < shimane.length; i++) {
                var option = document.createElement("option");

                option.value = shimane[i];
                option.text = shimane[i];
                select.appendChild(option);
                if (city == shimane[i]) {
                    option.selected = true;
                }
            }
            break;
        case "岡山県":
            var okayama = [
                '岡山市', '倉敷市', '津山市', '玉野市', '児島市', '玉島市', '笠岡市',
                '西大寺市', '井原市', '総社市', '高梁市', '新見市', '備前市', '瀬戸内市',
                '赤磐市', '真庭市', '美作市', '浅口市'
            ];
            for (let i = 0; i < okayama.length; i++) {
                var option = document.createElement("option");

                option.value = okayama[i];
                option.text = okayama[i];
                select.appendChild(option);
                if (city == okayama[i]) {
                    option.selected = true;
                }
            }
            break;
        case "広島県":
            var hiroshima = [
                '広島市', '尾道市', '呉市', '福山市', '三原市', '因島市', '三次市',
                '松永市', '府中市', '庄原市', '大竹市', '竹原市', '東広島市', '廿日市市',
                '安芸高田市', '江田島市'
            ];
            for (let i = 0; i < hiroshima.length; i++) {
                var option = document.createElement("option");

                option.value = hiroshima[i];
                option.text = hiroshima[i];
                select.appendChild(option);
                if (city == hiroshima[i]) {
                    option.selected = true;
                }
            }
            break;
        case "山口県":
            var yamaguchi = [
                '赤間関市', '下関市', '宇部市', '山口市', '萩市', '徳山市', '防府市',
                '下松市', '岩国市', '小野田市', '光市', '美祢市', '長門市', '柳井市',
                '新南陽市', '周南市', '山陽小野田市'
            ];
            for (let i = 0; i < yamaguchi.length; i++) {
                var option = document.createElement("option");

                option.value = yamaguchi[i];
                option.text = yamaguchi[i];
                select.appendChild(option);
                if (city == yamaguchi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "徳島県":
            var tokushima = [
                '徳島市', '鳴南市', '鳴門市', '小松島市', '阿南市', '吉野川市', '美馬市',
                '阿波市', '三好市'
            ];
            for (let i = 0; i < tokushima.length; i++) {
                var option = document.createElement("option");

                option.value = tokushima[i];
                option.text = tokushima[i];
                select.appendChild(option);
                if (city == tokushima[i]) {
                    option.selected = true;
                }
            }
            break;
        case "香川県":
            var kagawa = [
                '高松市', '丸亀市', '坂出市', '善通寺市', '観音寺市', 'さぬき市', '東かがわ市',
                '三豊市'
            ];
            for (let i = 0; i < kagawa.length; i++) {
                var option = document.createElement("option");

                option.value = kagawa[i];
                option.text = kagawa[i];
                select.appendChild(option);
                if (city == kagawa[i]) {
                    option.selected = true;
                }
            }
            break;
        case "愛媛県":
            var ehime = [
                '松山市', '今治市', '宇和島市', '八幡浜市', '新居浜市', '西条市', '大洲市',
                '伊予三島市', '川之江市', '伊予市', '北条市', '東予市', '四国中央市', '西予市',
                '東温市'
            ];
            for (let i = 0; i < ehime.length; i++) {
                var option = document.createElement("option");

                option.value = ehime[i];
                option.text = ehime[i];
                select.appendChild(option);
                if (city == ehime[i]) {
                    option.selected = true;
                }
            }
            break;
        case "高知県":
            var kouchi = [
                '高知市', '宿毛市', '中村市', '安芸市', '土佐清水市', '須崎市', '土佐市',
                '室戸市', '南国市', '四万十市', '香南市', '香美市'
            ];
            for (let i = 0; i < kouchi.length; i++) {
                var option = document.createElement("option");

                option.value = kouchi[i];
                option.text = kouchi[i];
                select.appendChild(option);
                if (city == kouchi[i]) {
                    option.selected = true;
                }
            }
            break;
        case "福岡県":
            var hukuoka = [
                '福岡市', '久留米市', '大牟田市', '直方市', '飯塚市', '田川市', '柳川市',
                '筑後市', '八女市', '大川市', '行橋市', '豊前市', '中間市', '北九州市',
                '小郡市', '筑紫野市', '春日市', '大野城市', '太宰府市', '宗像市', '古賀市', '福津市', 'うきは市', '宮若市', '朝倉市',
                '嘉麻市', 'みやま市', '糸島市'
            ];
            for (let i = 0; i < hukuoka.length; i++) {
                var option = document.createElement("option");

                option.value = hukuoka[i];
                option.text = hukuoka[i];
                select.appendChild(option);
                if (city == hukuoka[i]) {
                    option.selected = true;
                }
            }
            break;
        case "佐賀県":
            var saga = [
                '佐賀市', '唐津市', '鹿島市', '伊万里市', '鳥栖市', '武雄市', '多久市',
                '小城市', '嬉野市', '神埼市'
            ];
            for (let i = 0; i < saga.length; i++) {
                var option = document.createElement("option");

                option.value = saga[i];
                option.text = saga[i];
                select.appendChild(option);
                if (city == saga[i]) {
                    option.selected = true;
                }
            }
            break;
        case "長崎県":
            var nagasaki = [
                '長崎市', '佐世保市', '島原市', '諫早市', '大村市', '平戸市', '松浦市',
                '対馬市', '壱岐市', '五島市', '西海市', '雲仙市', '南島原市'
            ];
            for (let i = 0; i < nagasaki.length; i++) {
                var option = document.createElement("option");

                option.value = nagasaki[i];
                option.text = nagasaki[i];
                select.appendChild(option);
                if (city == nagasaki[i]) {
                    option.selected = true;
                }
            }
            break;
        case "熊本県":
            var kumamoto = [
                '熊本市', '八代市', '人吉市', '荒尾市', '水俣市', '玉名市', '山鹿市',
                '菊池市', '宇土市', '上天草市', '宇城市', '阿蘇市', '合志市', '天草市'
            ];
            for (let i = 0; i < kumamoto.length; i++) {
                var option = document.createElement("option");

                option.value = kumamoto[i];
                option.text = kumamoto[i];
                select.appendChild(option);
                if (city == kumamoto[i]) {
                    option.selected = true;
                }
            }
            break;
        case "大分県":
            var oita = [
                '大分市', '別府市', '中津市', '日田市', '佐伯市', '臼杵市', '津久見市',
                '竹田市', '豊後高田市', '杵築市', '宇佐市', '豊後大野市', '由布市', '国東市'
            ];
            for (let i = 0; i < oita.length; i++) {
                var option = document.createElement("option");

                option.value = oita[i];
                option.text = oita[i];
                select.appendChild(option);
                if (city == oita[i]) {
                    option.selected = true;
                }
            }
            break;
        case "宮崎県":
            var miyazaki = [
                '宮崎市', '都城市', '延岡市', '日南市', '小林市', '日向市', '串間市',
                '西都市', 'えびの市'
            ];
            for (let i = 0; i < miyazaki.length; i++) {
                var option = document.createElement("option");

                option.value = miyazaki[i];
                option.text = miyazaki[i];
                select.appendChild(option);
                if (city == miyazaki[i]) {
                    option.selected = true;
                }
            }
            break;
        case "鹿児島県":
            var kagoshima = [
                '鹿児島市', '鹿屋市', '枕崎市', '阿久根市', '指宿市', '出水市', '西之表市',
                '垂水市', '薩摩川内市', '日置市', '曽於市', 'いちき串木野市', '霧島市', '南さつま市',
                '志布志市', '奄美市', '南九州市', '伊佐市', '姶良市'
            ];
            for (let i = 0; i < kagoshima.length; i++) {
                var option = document.createElement("option");

                option.value = kagoshima[i];
                option.text = kagoshima[i];
                select.appendChild(option);
                if (city == kagoshima[i]) {
                    option.selected = true;
                }
            }
            break;
        case "沖縄県":
            var okinawa = [
                '那覇市', '石垣市', '宜野湾市', '浦添市', '名護市', '糸満市', '沖縄市',
                '豊見城市', 'うるま市', '宮古島市', '南城市'
            ];
            for (let i = 0; i < okinawa.length; i++) {
                var option = document.createElement("option");

                option.value = okinawa[i];
                option.text = okinawa[i];
                select.appendChild(option);
                if (city == okinawa[i]) {
                    option.selected = true;
                }
            }
            break;

    }

}

function dateCheck() {
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;
    if (start == null) {
        document.getElementById("submit").disabled = true;
        alert("特別営業開始日時を選択してください");
    }
    else if (start != null && end == "") {
        document.getElementById("submit").disabled = true;
        alert("特別営業終了日時を選択してください");
    }
    else if (start != null && end != null && start > end) {
        document.getElementById("submit").disabled = true;
        alert("期間を適切に選択してください");
    } else {
        document.getElementById("submit").disabled = false;
    }
}

//共通化する///////////////////////////////////////////////

function closeCheck(closeflg) {
    if (closeflg == 1) {
        document.getElementById("special").innerHTML = "";
    }
}

function closeCheck2(closeflg) {
    if (closeflg == 1) {
        document.getElementById("special2").innerHTML = "";
    }
}

//トップページに遷移
function topScene() {
    // 1.自身のページを別のページ遷移する方法
    location.href = "top.php";
}


function closeDisappear() {
    const b = document.getElementById("close");

    if (b.checked) { //(c9.checked === true)と同じ
        document.getElementById("closeDisappear").style.display = "none";
        document.getElementById("closeDisappear2").innerHTML = "一時閉店期間";
    } else {
        document.getElementById("closeDisappear").style.display = "block";
        document.getElementById("closeDisappear2").innerHTML = "特別営業時間適用期間";
    }
}

function yesno() {
    document.getElementById("yesno").innerHTML = "特別営業時間適用期間";
}

//初期の入力チェック
function inputCheck() {
    var a = document.getElementById("word1").value;
    var b = document.getElementById("word2");
    if (a == "") {
        b.disabled = true;
    }
}

//入力時の入力チェック
function inputCheck2() {
    var a = document.getElementById("word1").value;
    var b = document.getElementById("word2");
    if (a != "") {
        b.disabled = false;
    } else if (a == "") {
        b.value = "";
        b.disabled = true;
    }
}

function oritatami() {
    obj = document.getElementById('open').style;
    obj.display = (obj.display == 'none') ? 'block' : 'none';
}
