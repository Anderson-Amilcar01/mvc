$(document).ready(function () {
    $('.platform').hover(function () {
        // over
        $(this).addClass('hover');
        // $(this).css('margin', '0px 20px');
        $(this).find('.platform').css('background-color', '#1E90FF');
    }, function () {
        // out
        $(this).removeClass('hover');
        $(this).css('margin', 'initial');
        $(this).find('.platform').css('background-color', '#0073e6');
    });

    $('.platform').click(function (e) {
        e.preventDefault();

        $('.platform').not(this).fadeTo("slow", 0.47);

        var levelId = $(this).data('level');
        setTimeout(function () { goToQuestions(levelId); }, 2000);
    });

    function goToQuestions(levelId) {
        // window.location.href = 'http://localhost/LearningPlatformTry/index.php?action=openLevel&level=' + levelId;
        window.location.href = 'http://localhost/LearningPlatformTry/questionbox/pagina.html';
    }
});
