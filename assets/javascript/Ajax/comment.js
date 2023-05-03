const inputComment = $('.input_comment');
function comment(idUser, idPost) {
    let comment = inputComment.val();
    if(comment != '') {
        $.ajax({
            url: './viewUser/pages/comment.php',
            type: 'POST',
            dataType: 'html',
            data: {
                comment: comment,
                idPost: idPost,
                idUser: idUser,
                time: new Date($.now())
            }
            
        }).done(function(result) {
            $('.list_comment').html(result);
            
        });
    } 
    clearInputComment()
}

function clearInputComment() {
    inputComment.val("");
}

function deleteComment(idComment, idPost, idUser) {
    $.ajax({
        url: './viewUser/pages/comment.php',
        type: 'POST',
        dataType: 'html',
        data: {
            idComment,
            idPost,
            idUser
        }
    }).done(function(result) {
        $('.list_comment').html(result);
    });
}

function updateComment(idComment) {
    $.ajax({
        url: './viewUser/components/editComment.php',
        type: 'POST',
        dataType: 'html',
        data: {
            idComment
        }
    }).done(function(result) {
        $('.comment_box').html(result);
    });
}

inputComment.keydown(function(e){
    if(e.keyCode === 13) {
        const btnSubmit = $('.input_submit');
        btnSubmit.click();
    }
});