const homeAudio = document.querySelector('#home-audio');
const homeAudioPrev = document.querySelector('#home-audio-prev');
const homeAudioPlay = document.querySelector('#home-audio-play');
const homeAudioNext = document.querySelector('#home-audio-next');
const homeAudioVolume = document.querySelector('#home-audio-volume');
const homeAudioProgress = document.querySelector('#home-audio-progress');

let allMusics1 = [];
function initAudio() {
    document
            .querySelector('#audio-items')
            .querySelectorAll('.item')
            .forEach((item) => {
                allMusics1.push(
                        item.attributes?.onclick?.textContent?.slice(
                                item.attributes.onclick.textContent?.indexOf('(') + 2,
                                -2
                                )
                        );
            });

}
function PlayThis(audio) {
    homeAudio.src = audio;

    homeAudio.play();
    homeAudioPlay.querySelector('.pause').classList.remove('d-none');
    homeAudioPlay.querySelector('.play').classList.add('d-none');
}
if (homeAudioPlay)
    homeAudioPlay.addEventListener('click', (e) => {
        if (homeAudio.src === '' || homeAudio.src.includes('.html')) {
            homeAudio.src = allMusics1[0];

        }
        if (homeAudio.paused) {
            homeAudio.play();
            homeAudioPlay.querySelector('.pause').classList.remove('d-none');
            homeAudioPlay.querySelector('.play').classList.add('d-none');
        } else {
            homeAudio.pause();
            homeAudioPlay.querySelector('.pause').classList.add('d-none');
            homeAudioPlay.querySelector('.play').classList.remove('d-none');
        }
    });
if (homeAudioVolume)
    homeAudioVolume.addEventListener('click', (e) => {
        if (homeAudio.muted) {
            homeAudio.muted = false;
            homeAudioVolume.querySelector('.off').classList.add('d-none');
            homeAudioVolume.querySelector('.on').classList.remove('d-none');
        } else {
            homeAudio.muted = true;
            homeAudioVolume.querySelector('.off').classList.remove('d-none');
            homeAudioVolume.querySelector('.on').classList.add('d-none');
        }
    });
if (homeAudio)
    homeAudio.addEventListener('timeupdate', (e) => {
        const width = (homeAudio.currentTime / homeAudio.duration) * 100;
        homeAudioProgress.style.width = width + '%';

        if (width > 99.9) {
            homeAudioPlay.querySelector('.pause').classList.add('d-none');
            homeAudioPlay.querySelector('.play').classList.remove('d-none');
        }
    });
if (homeAudioPrev)
    homeAudioPrev.addEventListener('click', (e) => {
        const thisMusicIndex = allMusics1.indexOf(homeAudio.src);
        // console.log(thisMusicIndex);
        if (allMusics1[thisMusicIndex - 1] == undefined) {
            homeAudio.src = allMusics1[thisMusicIndex];
        } else {
            homeAudio.src = allMusics1[thisMusicIndex - 1];
        }
        homeAudio.play();
        homeAudioPlay.querySelector('.pause').classList.remove('d-none');
        homeAudioPlay.querySelector('.play').classList.add('d-none');
    });
if (homeAudioNext)
    homeAudioNext.addEventListener('click', (e) => {
        const thisMusicIndex = allMusics1.indexOf(homeAudio.src);

        // console.log(thisMusicIndex);
        if (allMusics1[thisMusicIndex + 1] == undefined) {
            homeAudio.src = allMusics1[thisMusicIndex];
        } else {
            homeAudio.src = allMusics1[thisMusicIndex + 1];
        }

        homeAudio.play();
        homeAudioPlay.querySelector('.pause').classList.remove('d-none');
        homeAudioPlay.querySelector('.play').classList.add('d-none');
    });