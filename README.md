<p align="center"><a href="https://tkgeek.sakura.ne.jp/felizo/" target="_blank"><img src="https://tkgeek.sakura.ne.jp/felizo/public/felizo.jpg" width="400" alt="Felizo"></a></p>
<p align="center">
  <img src="https://img.shields.io/badge/HTML5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" alt="HTML">
  <img src="https://img.shields.io/badge/CSS3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white" alt="CSS">
  <img src="https://img.shields.io/badge/JavaScript-%23F7DF1E.svg?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-%23777BB4.svg?style=for-the-badge&logo=Laravel&logoColor=pink" alt="Laravel">
</p>

## About Felizo

Felizoは、自由な発言を促す「ワンタイムディスカッションサービス」です。

ネット上で自由に意見を交換できない「総監視社会」のプレッシャー、年齢・性別・属性の違いによる意見発信のしづらさ、個人情報漏洩やデジタルタトゥーへの懸念を解消し、全世代が安心して利用できるプラットフォームです。

「Felizo」の匿名性が高くポップで感情豊かなコミュニケーションは、年齢や性別に関係なく、誰でも自由に意見交換が可能になります。
また、ワンタイム消滅機能により、ネット上の誹謗中傷問題、デジタル匿名性の強化と個人情報保護を担保します。

「Felizo」はユーザーが心から自由に意見を交換し合う場を提供し、新時代の匿名ディスカッションコミュニティのスタンダードを目指します。


### ①課題名
ワンタイムディスカッションサービス「Felizo」

### ②課題内容（どんな作品か）
投稿が自動削除される、完全匿名性の掲示板サービス。
- ランダムに生成されるプロフィールアイコンとユーザー名で個人の特定を防ぎます。
- 書き込む内容の湯ガイドを検出し、健全な書き込みを誘導します。
- 一定時間経過後、投稿は自動で削除され、ネット上に残りません。
### ③アプリのデプロイURL
https://tkgeek.sakura.ne.jp/felizo/

### ④アプリのログイン用IDまたはPassword

### ⑤工夫した点・こだわった点
- コメント投稿はスレッド内で投稿できる（別ビューへ飛ばない）UI設計
- ポップなスタンプと、多様なプロフィールアイコン
- PerspectiveAPIによる投稿内容の有害度のチェック
- 投稿の自動削除

### ⑥難しかった点・次回トライしたいこと（又は機能）
- スコープ外の機能への挑戦（今回は開発期間スコープ範囲内での実装で完了）
- 初のチーム開発におけるすべてが学びと挑戦だった
- 環境構築の複雑さ、Laravelの詳細機能は難しかった
- 投稿に対するスタンプ機能の実装が難しかった

### ⑦フリー項目
- チームメンバー全員が初心者で、全員がゼロベースでした。そのため初期から、一般的な作業の仕方を確認しながら進めました。我々のチームはスタート時の環境最適化が良かったと思います。作業手順の明文化（projectのReadMEに記載）、リポジトリ作成と同時にdevをさくらサーバーに自動デプロイ化（GitHub ActionsでCI/CD）、議事録やメモの残し方の共有、など。
- 細かくタスクを分けCI/CDを回していたため、commit数、プルリク数、Actions Usage、issue数が多めです。