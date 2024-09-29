function playClip(clipSrc) {
    const audio = new Audio(clipSrc);
    audio.play();
}

document.addEventListener("DOMContentLoaded", function () {
    const videoPlayer = document.getElementById("videoPlayer");

    videoPlayer.addEventListener("click", function () {
        if (videoPlayer.paused) {
            videoPlayer.play();
        } else {
            videoPlayer.pause();
        }
    });
});
