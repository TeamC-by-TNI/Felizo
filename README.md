# 📝 チーム開発用 Git/GitHub 作業手順

このREADMEでは、Laravelプロジェクトでのチーム開発におけるGit/GitHubの基本的な作業手順を説明します。Windows・Mac環境に対応した内容です。

---

## 1. 開発ブランチから作業ブランチを作成する（作業初回のみ）

作業を始める前に、必ず最新の`develop`ブランチから作業ブランチを作成しましょう。

1. **`develop`ブランチに移動し、最新版を取得する：**

    ```bash
    git checkout develop
    git pull origin develop
    ```

2. **新しい作業ブランチを作成する：**

    ```bash
    git checkout -b feature/作業内容
    ```

    例：`feature/index`や`feature/header`

---

## 2. 作業を進める

作業ブランチでコードを書き進めます。

---

## 3. 定期的に`develop`ブランチの最新状態を取り込む

他のメンバーが`develop`に変更をマージした場合、自分の作業ブランチに定期的にその変更を反映しましょう。

1. **作業中の変更をコミットまたはスタッシュする：**

    - **変更をコミットする場合：**

        ```bash
        git add .
        git commit -m "作業内容を一時保存"
        ```

    - **変更をスタッシュする場合：**

        ```bash
        git stash
        ```

2. **`develop`ブランチに移動し、最新版をpullする：**

    ```bash
    git checkout develop
    git pull origin develop
    ```

3. **作業ブランチに戻り、`develop`の変更をマージする：**

    ```bash
    git checkout feature/作業内容
    git merge develop
    ```

4. **スタッシュした変更を戻す（スタッシュした場合のみ）：**

    ```bash
    git stash pop
    ```

---

## 4. 作業ブランチをGitHubにpushする

作業が完了したら、ブランチをGitHubにpushします。

    ```bash
    git push origin feature/作業内容
    ```

---

## 5. プルリクエストを作成する

GitHub上でfeature/作業内容ブランチからdevelopブランチへのプルリクエスト（PR）を作成します。

不安な場合は他のメンバーにコードレビューを依頼しましょう。遠慮なしで！

---

## 6. コードレビューとマージ
レビューで指摘された点を修正する場合：

    ```bash
    git add .
    git commit -m "レビュー内容を反映"
    git push origin feature/作業内容
    ```

問題がなければ、プルリクエストをマージします。

---

## 7. 作業ブランチの削除
マージが完了したら、作業ブランチを削除します。（最後の最後で大丈夫です！）

    ```bash
    # ローカルブランチを削除
    git branch -d feature/作業内容

    # リモートブランチを削除
    git push origin --delete feature/作業内容
    ```

---


## 補足：

 - コンフリクトが発生した場合
**マージ時にコンフリクトが発生したら、手動で修正してから再度コミットしましょう。**

- こまめなコミットを
**内容が分かるコメントを付けて、変更を加えたら必ずコミットを！**