tinymce.PluginManager.add('example', function(editor, url) {

    // Add a button that opens a window
    editor.addButton('example', {
        text: 'ADD PDF FROM Google Drive Link',
        icon: false,
        onclick: function() {
            // Open window
            editor.windowManager.open({
                title: 'ADD PDF FROM Google Drive Link',
                body: [
                    { type: 'textbox', name: 'title', label: 'Title' }
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 141.42%; text-align: center;"><iframe class="embed-responsive-item" src=" ' + e.data.title + '"></iframe></div>');
                }
            });
        }
    });

    // Adds a menu item to the tools menu
    editor.addMenuItem('example', {
        text: 'ADD PDF FROM Google Drive Link',
        context: 'tools',
        onclick: function() {
            // Open window with a specific url
            editor.windowManager.open({
                title: 'ADD PDF FROM Google Drive Link',
                body: [
                    { type: 'textbox', name: 'title', label: 'Title' }
                ],
                onsubmit: function(e) {
                    // Insert content when the window form is submitted
                    editor.insertContent('<div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 141.42%; text-align: center;"><iframe class="embed-responsive-item" src=" ' + e.data.title + '"></iframe></div>');
                }
            });
        }
    });

    return {
        getMetadata: function() {
            return {
                name: "ADD PDF FROM Google Drive Link",
            };
        }
    };
});