function filterByStatus(ele) {
    $.ajax({
        url: './view/handleShow/showFilter.php',
        type: 'POST',
        dataType: 'html',
        data: {
            status: ele.value,
            typePage: $('title').text()
        }
    }).done(function (response) {
        $('table').html(response);
    });
}

function filterPostByNavigation(ele) {
    $.ajax({
        url: './view/handleShow/showFilterPostByNavigation.php',
        type: 'POST',
        dataType: 'html',
        data: {
            navId: ele.value
        }
    }).done(function(response) {
        $('table').html(response);
    })
}