/**
 * Created by master on 16-3-9.
 */
$(function() {
    $(".page .before").on("click", function () {
        $.post("mypage.php", { page: 2}, function() {
            console.log('Success!');
        });
    });
    //console.log('Success!');
});