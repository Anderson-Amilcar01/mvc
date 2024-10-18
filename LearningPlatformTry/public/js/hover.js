$('.moduleCard').hover(function () {
    // over
    $(this).addClass('hover');
    $(this).css('margin', '0px 20px');
    $(this).find('.moduleCardBlock').css('background-color', '#1063c2');
}, function () {
    // out
    $(this).removeClass('hover');
    $(this).css('margin', 'initial');
    $(this).find('.moduleCardBlock').css('background-color', '#1D81F3');
});

$('.moduleCard').click(function (e) {
    e.preventDefault();

    $('.moduleCard').not(this).fadeTo("slow", 0.47);

    var moduleId = $(this).data('module-id');
    setTimeout(function () {goToCurse(moduleId); }, 2000);
});

function goToCurse(moduleId) {
    window.location.href = 'http://localhost/LearningPlatformTry/index.php?action=openModule&module=' + moduleId;
}