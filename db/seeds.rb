# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: 'Star Wars' }, { name: 'Lord of the Rings' }])
#   Character.create(name: 'Luke', movie: movies.first)
Category.create([
    { name: 'オフィス清掃' },
    { name: '定期清掃（ＷＡＸ・カーペット等）' },
    { name: 'マンション・アパート等の清掃' },
    { name: 'エアコンクリーニング' },
    { name: '高所ガラス清掃' },
    { name: '医療関係' },
    { name: '老人介護施設' },
    { name: 'その他' }
])

Article.create([
    {
        title: '冬季休業（2017年～2018年）',
        body: '平素は格別のお引立てを賜り、厚く御礼申し上げます。誠に勝手ながら弊社では下記の期間を年末・年始休業とさせていただきます。

休業期間：2017年12月30（土）～2018年1月3月（水）

期間中のお問い合わせにつきましては1月4日（木）から対応させていただきます。お客様にはご不備をおかけしますが、何卒ご理解くださいます様お願い申し上げます。',
        published: true
    },
    {
        title: '通信ケーブル工事',
        body: 'この度、回線工事のため【電話・FAX・メール】を一時停止することになりました。

＜予定日＞

11月 8日(水)

＜予想時間帯＞

10:00～18:00

※上記の時間帯の中で約4時間の工事になります。

ご利用の皆様には大変ご迷惑をおかけしますが、何卒ご理解くださいます様お願いいたします。',
        published: true
    },
    {
        title: '10月のお休みについて 2017',
        body: '【休業日】7日、14日、21日、28日（土）1日、8日、15日、22日、29日（日）となります。

【臨時休業】25日（水）となります。

ご迷惑をお掛け致しますが、何卒ご理解の程、よろしくお願い申し上げます。

※ サービスは通常通りです。',
        published: true
    }
])
