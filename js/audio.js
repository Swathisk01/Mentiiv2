const audioPlayer = document.getElementById('audio-player');
const playButton = document.getElementById('play-button');
const pauseButton = document.getElementById('pause-button');
const volumeSlider = document.getElementById('volume-slider');
const albumArt = document.getElementById('album-art');

playButton.addEventListener('click', () => {
    audioPlayer.play();
});

pauseButton.addEventListener('click', () => {
    audioPlayer.pause();
});

volumeSlider.addEventListener('input', () => {
    audioPlayer.volume = volumeSlider.value;
});

audioPlayer.addEventListener('play', () => {
    albumArt.style.opacity = 1; // Show the album art when audio is playing
});

audioPlayer.addEventListener('pause', () => {
    albumArt.style.opacity = 0.5; // Reduce opacity when audio is paused
});
