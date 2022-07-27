const searchButton = document.querySelector('.search-button');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

// delete search button
searchButton.style.display = 'none';

// create event when we type keyword
keyword.addEventListener('keyup', function () {
    // run ajax
    // xmlhttprequest
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         container.innerHTML = xhr.responseText;
    //     }
    // };

    // xhr.open('get', 'ajax/ajax_search.php?keyword=' + keyword.value);
    // xhr.send();

    // using fetch()
    fetch('ajax/ajax_search.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (container.innerHTML = response));
});

// previewImage for insert and edit
function previewImage() {
    const picture = document.querySelector('.picture');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(picture.files[0]);

    oFReader.onload = function (OFREvent) {
        imgPreview.src = OFREvent.target.result;
    };
}