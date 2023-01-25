</div>
    </div>
</body>
<script src="./view/js/main.js"></script>
<script src="./ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content_post');
</script>
<script>
    var allDel = document.querySelectorAll('.delete');
    [...allDel].forEach(function(item) {
        item.addEventListener('click', function(e) {
            if(confirm("Are you sure to delete?") == false) {
                e.preventDefault();
            }
        })
    })
</script>
</html>