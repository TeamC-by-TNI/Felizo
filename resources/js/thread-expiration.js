document.addEventListener('DOMContentLoaded', function() {
    const expiresAtElements = document.querySelectorAll('[data-expires-at]');
    if (expiresAtElements.length === 0) return;

    function updateExpirationTime() {
        let activeThreads = 0;
        expiresAtElements.forEach(element => {
            const expiresAt = new Date(element.dataset.expiresAt).getTime();
            const now = new Date().getTime();
            const timeLeft = expiresAt - now;

            const timeDisplay = element.closest('div').querySelector('.expiration-time');
            if (timeDisplay) {
                if (timeLeft <= 0) {
                    element.closest('.bg-white').remove();
                } else {
                    activeThreads++;
                    const minutes = Math.floor(timeLeft / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    timeDisplay.textContent = `スレッド削除まで残り: ${minutes}分${seconds}秒`;
                }
            }
        });

        // 全てのスレッドが削除された場合
        if (activeThreads === 0) {
            window.location.href = '/threads';
        }
    }

    setInterval(updateExpirationTime, 1000);
    updateExpirationTime();
}); 