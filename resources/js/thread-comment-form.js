// resources/js/comment-form.js
document.addEventListener('DOMContentLoaded', function () {
    const commentInput = document.getElementById('comment');
    const submitButton2 = document.getElementById('submitButton2');

    function updateCommentButtonState() {
        if (commentInput.value.trim() !== '') {
            submitButton2.classList.remove('bg-gray-400', 'cursor-not-allowed');
            submitButton2.classList.add('bg-purple-500', 'hover:bg-purple-600');
            submitButton2.disabled = false;
        } else {
            submitButton2.classList.remove('bg-purple-500', 'hover:bg-purple-600');
            submitButton2.classList.add('bg-gray-400', 'cursor-not-allowed');
            submitButton2.disabled = true;
        }
    }

    if (commentInput && submitButton2) {
        commentInput.addEventListener('input', updateCommentButtonState);
        updateCommentButtonState();
    }

    // コメントの自動削除機能を追加
    const comments = document.querySelectorAll('.comment-item');
    comments.forEach(comment => {
        const createdAt = new Date(comment.dataset.createdAt).getTime();
        const now = new Date().getTime();
        const timeLeft = Math.max(0, 30000 - (now - createdAt)); // 30秒 = 30000ミリ秒

        // カウントダウン表示の更新関数
        function updateCountdown() {
            const currentTime = new Date().getTime();
            const remainingTime = Math.max(0, 30000 - (currentTime - createdAt));
            const seconds = Math.ceil(remainingTime / 1000);
            
            const countdownElement = comment.querySelector('.comment-countdown');
            if (countdownElement) {
                if (seconds > 0) {
                    countdownElement.textContent = `コメント削除まで残り：${seconds}秒`;
                } else {
                    countdownElement.textContent = 'まもなく削除されます';
                }
            }
        }

        // 1秒ごとにカウントダウンを更新
        const countdownInterval = setInterval(updateCountdown, 1000);

        if (timeLeft > 0) {
            setTimeout(() => {
                clearInterval(countdownInterval);
                comment.style.transition = 'opacity 0.5s';
                comment.style.opacity = '0';
                setTimeout(() => {
                    comment.remove();
                }, 500);
            }, timeLeft);
        } else {
            clearInterval(countdownInterval);
            comment.remove();
        }

        // 初回実行
        updateCountdown();
    });
});