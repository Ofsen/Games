function showMore(object) {
    object.querySelector(".details").style.background = 'rgba(255, 255, 255, 1)';
    object.querySelector(".details").style.transform = 'translateY(-100%)';
    object.querySelector("h5").style.background = '#007cb6';
    object.querySelector(".img-a").style.color = '#fff';
}

function showLess(object) {
    object.querySelector(".details").style.background = 'none';
    object.querySelector(".details").style.transform = 'translateY(-45%)';
    object.querySelector("h5").style.background = '#fff';
    object.querySelector(".img-a").style.color = '#007cb6';
}

function loginShow() {
    document.getElementById('login').style.display='block';
    document.getElementById('black').style.display='block';
}

function loginHide() {
    document.getElementById('login').style.display='none';
    document.getElementById('black').style.display='none';
}

function sideNavShow() {
    document.querySelector(".nav-m-l").style.transform = 'translateX(0%)';
    document.querySelector("#black").style.display = 'block';
}

function hide(object) {
    object.style.display = 'none';
    if(document.querySelector(".nav-m-l").style.transform == 'translateX(0%)') {
        document.querySelector(".nav-m-l").style.transform = 'translateX(-100%)';
    }
    if(document.querySelector('#login').style.display == 'block') {
        document.querySelector('#login').style.display = 'none';
    }
}
