var editor = new Quill('#quill-container', {
    modules: {
        toolbar: [
            [{header: [1, 2, false]}],
            ['bold', 'italic', 'underline', 'strike', 'code', 'link'],
            [{list: 'ordered'}, {list: 'bullet'}, 'blockquote', 'code-block']
        ]
    },
    scrollingContainer: '#scrolling-container',
    placeholder: 'Compose an epic...',
    theme: 'bubble'
});

var form = document.getElementById('post-form');
form.onsubmit = function() {
    $("#content-json").val(JSON.stringify(editor.getContents()));
    $("#content-html").val(editor.container.firstChild.innerHTML);
    $("#content-text").val(editor.getText());
};
