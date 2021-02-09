function hasClass(elem, className) { // проверка на hasClass
  return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}

function spoiler(el) {
  var text = el.parentNode.querySelector(".spoilerText"); // находим .spoilerText в полученном элементе

  if (!hasClass(text, 'active')) {
    text.style.height = "230px";
    text.classList.add('active');

  } else {
    text.style.height = "0px";
    text.classList.remove('active');
  }

}
