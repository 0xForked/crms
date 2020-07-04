var editor = new Quill('#quill-container', {
    modules: {
        toolbar: {
            container: [
                [{header: [1, 2, 3, 4, 5, 6, false]}],
                ['bold', 'italic', 'underline', 'strike', { 'script': 'sub'}, { 'script': 'super' }, 'code', 'link'],
                [{ 'align': [] }],
                [{list: 'ordered'}, {list: 'bullet'}, 'blockquote', 'code-block', 'image'],
            ],
            handlers: {
                image: imageHandler
            }
        }
    },
    scrollingContainer: '#scrolling-container',
    placeholder: 'Compose an epic...',
    theme: 'bubble'
});

function imageHandler() {
    var range = editor.getSelection();
    var value = prompt('What is the image URL');
    if(value){
        editor.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

var form = document.getElementById('post-form');
form.onsubmit = function() {
    $("#content-json").val(JSON.stringify(editor.getContents()));
    $("#content-html").val(editor.container.firstChild.innerHTML);
    $("#content-text").val(editor.getText());
};
