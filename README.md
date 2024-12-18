# チーム開発プロジェクト

Claude が手順書を作成してくれました。参考に clone してからブランチを切ってコーディングしていきましょう！

## 環境構築手順

### 1. 必要なソフトウェア

以下のソフトウェアが必要です：

-   Docker Desktop
-   Visual Studio Code
-   VS Code 拡張機能：Dev Containers（作者: Microsoft）

### 2. 初期セットアップ手順

#### Mac 環境の場合

1. Docker Desktop を起動する
2. リポジトリをクローン

```bash
git clone [リポジトリURL]
```

3. プロジェクトディレクトリに移動
4. .env.example をコピーして.env を作成

```bash
cp .env.example .env
```

※DB 接続情報を手動で以下のように書き換えお願いします！
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

5. VS Code でプロジェクトを開く

```bash
code .
```

6. 右下に表示される「Reopen in Container」をクリック
    - 表示されない場合：Command + Shift + P で「Dev Containers: Reopen in Container」を実行

#### Windows 環境の場合

1. Docker Desktop を起動する
2. XAMPP の Apache が起動している場合は停止する
3. リポジトリをクローン

```bash
git clone [リポジトリURL]
```

4. プロジェクトディレクトリに移動
5. VS Code でプロジェクトを開く

```bash
code .
```

6. 右下に表示される「Reopen in Container」をクリック
    - 表示されない場合：Ctrl + Shift + P で「Dev Containers: Reopen in Container」を実行

### 3. コンテナ起動後の設定

Dev Container が起動したら、以下のコマンドを実行してください：

```bash
# アプリケーションキーの生成
./vendor/bin/sail artisan key:generate

# データベースマイグレーション
./vendor/bin/sail artisan migrate
```

### 4. 動作確認

以下の URL にアクセスして、正常に表示されることを確認してください：

-   Laravel アプリケーション: http://localhost
-   phpMyAdmin: http://localhost:8080

## トラブルシューティング

### よくある問題と解決方法

1. ポートが既に使用されている場合

    - DockerDesktop でコンテナを一度停止し、再度起動してください
    - 他のアプリケーション（XAMPP 等）が同じポートを使用していないか確認してください

2. Dev Container が起動しない場合

    - Docker Desktop が起動しているか確認してください
    - VS Code の Dev Containers 拡張機能がインストールされているか確認してください

3. データベース接続エラーが発生する場合
    - .env ファイルのデータベース設定を確認してください
    - コンテナを再起動してみてください

### エラーが解決しない場合

GitHub で以下の情報と共に報告してください：

1. 発生しているエラーメッセージ
2. 実行した操作手順
3. 使用している環境

## コミット・プッシュ時の注意点

-   `.env`ファイルは絶対にコミットしないように注意！
-   `vendor`ディレクトリはコミットしないように注意！（gitignore 配下にデフォで入ってます）
-   新しいパッケージをインストールした場合は、反映のため`composer.json`と`composer.lock`をコミットしてください
-   （↑ この件についてはあとで深堀確認します！）

## チーム開発ルール

### ブランチ運用ルール

1. メインブランチ

    - `main`: プロダクションコード（直接プッシュ禁止）
    - `develop`: 開発用メインブランチ（各機能ブランチのマージ先）

2. 作業用ブランチ
    - 命名規則: `feature/機能名`
    - 例: `feature/login-page`, `feature/user-registration`

### 作業の進め方

1. 作業開始時

    ```bash
    # developブランチから最新をプル
    git checkout develop
    git pull origin develop

    # 作業用ブランチを作成
    git checkout -b feature/機能名
    ```

2. 作業中

    - 小さな単位で頻繁にコミット
    - 1 日 1 回以上はプッシュする

3. プルリクエスト（PR）
    - 機能が完成したら develop ブランチへ PR を作成
    - PR のタイトルは「[機能名] 実装内容の要約」の形式
    - レビュー後、承認されたらマージ

### コミュニケーションルール

1. 困ったことがあったらすぐに質問（1 時間以上悩まない）
2. 遠慮しすぎない！誰も責めない！
