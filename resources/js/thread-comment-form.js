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
        const timeLeft = Math.max(0, 60000 - (now - createdAt)); // 60秒 = 60000ミリ秒

        if (timeLeft > 0) {
            setTimeout(() => {
                comment.style.transition = 'opacity 0.5s';
                comment.style.opacity = '0';
                setTimeout(() => {
                    comment.remove();
                }, 500);
            }, timeLeft);
        } else {
            comment.remove();
        }
    });
});