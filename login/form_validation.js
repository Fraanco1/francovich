$input = document.querySelectorAll('.input');

$input.forEach(function(element) {
    if (element.type != "submit") {
        element.className += ' error-anim';
        console.log(element);
    }
});