function showMore(object) {
    object.querySelector(".details").style.background = '#fff';
    object.querySelector(".details").style.height = '65%';
    object.querySelector("h5").style.background = '#007cb6';
    object.querySelector(".img-a").style.color = '#fff';
    object.querySelector("#tail").style.display = 'block';
}

function showLess(object) {
    object.querySelector(".details").style.background = 'none';
    object.querySelector(".details").style.height = '';
    object.querySelector("h5").style.background = '#fff';
    object.querySelector(".img-a").style.color = '#007cb6';
    object.querySelector("#tail").style.display = '';
}